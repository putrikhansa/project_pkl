<?php
namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $kelasList = Kelas::all();

        $siswas = auth()->user()->role === 'petugas'
            ? Siswa::with(['kelas', 'user'])->where('user_id', auth()->id())->get()
            : Siswa::with(['kelas', 'user'])->get();

        return view('backend.siswa.index', compact('siswas', 'kelasList'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('backend.siswa.create', compact('kelas'));
    }

    // =======================
    // STORE (FIX TOTAL)
    // =======================
    public function store(Request $request)
    {
        $request->validate([
            'nis'           => 'required|unique:siswas,nis',
            'nama'          => 'required',
            'kelas_id'      => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $siswa = Siswa::create([
            'nis'           => $request->nis,
            'nama'          => $request->nama,
            'kelas_id'      => $request->kelas_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'user_id'       => auth()->id(),
        ]);

        logAktivitas("Menambahkan siswa bernama {$siswa->nama}", 'siswa');

        return redirect()
            ->route('backend.siswa.index')
            ->with('success', 'Siswa berhasil ditambahkan');
    }

    public function show($id)
    {
        $siswa = Siswa::with(['kelas', 'user'])->findOrFail($id);
        return view('backend.siswa.show', compact('siswa'));
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();

        return view('backend.siswa.edit', compact('siswa', 'kelas'));
    }

    // =======================
    // UPDATE (FIX BENAR)
    // =======================
    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nis'           => 'required|unique:siswas,nis,' . $siswa->id,
            'nama'          => 'required',
            'kelas_id'      => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $siswa->update([
            'nis'           => $request->nis,
            'nama'          => $request->nama,
            'kelas_id'      => $request->kelas_id,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        logAktivitas("Mengedit data siswa bernama {$siswa->nama}", 'siswa');

        return redirect()
            ->route('backend.siswa.index')
            ->with('success', 'Siswa berhasil diperbarui');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        if (method_exists($siswa, 'rekam_medis')) {
            $siswa->rekam_medis()->delete();
        }

        $siswa->delete();

        logAktivitas("Menghapus siswa bernama {$siswa->nama}", 'siswa');

        return redirect()
            ->route('backend.siswa.index')
            ->with('success', 'Siswa berhasil dihapus');
    }

    // =======================
    // SEARCH (BONUS RAPi)
    // =======================
    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $query = Siswa::with('kelas');

        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('nama', 'like', "%$keyword%")
                    ->orWhere('nis', 'like', "%$keyword%")
                    ->orWhereHas('kelas', function ($q2) use ($keyword) {
                        $q2->where('nama_kelas', 'like', "%$keyword%");
                    });
            });
        }

        $siswas = $query->get();
        $view   = view('backend.siswa.search', compact('siswas'))->render();

        return response()->json(['data' => $view]);
    }
}

// Helper logAktivitas tanpa data_id
// if (! function_exists('logAktivitas')) {
//     function logAktivitas($aksi, $tabel = null)
//     {
//         if (auth()->check()) {
//             LogAktivitas::create([
//                 'user_id' => auth()->id(),
//                 'aksi'    => $aksi,
//                 'tabel'   => $tabel,
//             ]);
//         }
//     }
// }
