<?php
namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\LogAktivitas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $kelasList = Kelas::all();

        $siswas = auth()->user()->role === 'petugas'
        ? Siswa::with('kelas')->where('user_id', auth()->id())->get()
        : Siswa::with('kelas')->get();

        return view('backend.siswa.index', compact('siswas', 'kelasList'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('backend.siswa.create', compact('kelas'));

    }

    public function store(Request $request)
    {
        // Validasi dan simpan siswa
        $siswa = Siswa::create([
            'nama'          => $request->nama,
            'kelas_id'      => $request->kelas_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'user_id'       => auth()->id(),
        ]);

        // Logging aktivitas
        LogAktivitas::create([
            'user_id' => auth()->id(),
            'aksi'    => "Menambahkan siswa bernama {$siswa->nama}",
            'tabel'   => 'siswa',
        ]);

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $siswa = Siswa::with('kelas')->findOrFail($id);
        return view('backend.siswa.show', compact('siswa'));

    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();

        return view('backend.siswa.edit', compact('siswa', 'kelas'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'          => 'required|string',
            'kelas_id'      => 'required|exists:kelas,id',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
        ]);

        $siswa = Siswa::findOrFail($id); // <-- Tambahkan ini

        $siswa->update([
            'nama'          => $request->nama,
            'kelas_id'      => $request->kelas_id,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);
        logAktivitas("Mengedit data siswa bernama {$siswa->nama}", 'siswa', $siswa->id);

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diperbarui');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

                                         // Hapus semua rekam medis yang terkait
        $siswa->rekam_medis()->delete(); // Pastikan relasinya ada

        $siswa->delete();
        logAktivitas("Menghapus siswa bernama {$siswa->nama}", 'siswa', $siswa->id);

        return redirect()->route('siswa.index')->with('success', 'Siswa dan data terkait berhasil dihapus');
    }
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $kelas   = $request->kelas;

        $query = Siswa::with('kelas');

        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('nama', 'like', "%$keyword%")
                    ->orWhereHas('kelas', function ($q2) use ($keyword) {
                        $q2->where('nama_kelas', 'like', "%$keyword%");
                    });
            });
        }

        if ($kelas) {
            $query->whereHas('kelas', function ($q) use ($kelas) {
                $q->where('nama', $kelas);
            });
        }

        $siswas = $query->get();
        $view   = view('backend.siswa.search', compact('siswas'))->render();

        return response()->json(['data' => $view]);
    }

}

if (! function_exists('logAktivitas')) {
    function logAktivitas($aksi, $tabel = null, $data_id = null)
    {
        if (auth()->check()) {
            LogAktivitas::create([
                'user_id' => auth()->id(), // Ganti petugas_id jadi user_id
                'aksi'    => $aksi,
                'tabel'   => $tabel,
                'data_id' => $data_id,
            ]);
        }
    }
}
