<?php
namespace App\Http\Controllers;

use App\Exports\RekamMedisExport;
use App\Models\Kelas;
use App\Models\Obat;
use App\Models\RekamMedis;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RekamMedisController extends Controller
{
    public function index()
    {
        $rekam_medis = RekamMedis::with('siswa.kelas', 'obat', 'user')->latest()->get();
        return view('backend.rekam_medis.index', compact('rekam_medis'));
    }

    public function create()
    {
        $kelas = Kelas::all(); 
        $obat  = Obat::all();  

        return view('backend.rekam_medis.create', compact('kelas', 'obat'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'tanggal'  => 'required|date',
            'keluhan'  => 'required|string',
            'obat_id'  => 'nullable|exists:obats,id',
            // 'user_id'  => 'required|exists:users,id',
            'status'   => 'required|string',
        ]);

        $validated['user_id'] = auth()->id();

        $tindakan = 'Pemeriksaan';

        // Kurangi stok jika obat dipilih
        if (! empty($validated['obat_id'])) {
            $obat = Obat::find($validated['obat_id']);

            if ($obat->stok < 1) {
                return back()->with('error', 'Stok obat habis.');
            }

            $obat->decrement('stok', 1);
            $tindakan .= " dan diberi 1 {$obat->nama_obat}";
        }

        $validated['tindakan'] = $tindakan;

        $rekam = RekamMedis::create($validated);

        logAktivitas("Menambahkan rekam medis siswa {$rekam->siswa->nama} pada tanggal {$rekam->tanggal}", 'rekam_medis');

        return redirect()->route('backend.rekam_medis.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $rekam_medis = RekamMedis::with('siswa.kelas', 'obat', 'user')->findOrFail($id);
        return view('backend.rekam_medis.show', compact('rekam_medis'));
    }

    public function edit(string $id)
    {
        $rekam_medis = RekamMedis::findOrFail($id);
        $siswa       = Siswa::with('user')->get();
        $users       = User::all();
        $obat        = Obat::all();
        $kelas       = Kelas::all(); 

        return view('backend.rekam_medis.edit', compact('rekam_medis', 'siswa', 'users', 'obat', 'kelas'));
    }

    public function update(Request $request, string $id)
    {
        $rekam_medis = RekamMedis::findOrFail($id);

        $data = $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'tanggal'  => 'required|date',
            'keluhan'  => 'required|string',
            'tindakan' => 'required|string',
            'obat_id'  => 'nullable|exists:obats,id',
            'user_id'  => 'required|exists:users,id',
            'status'   => 'required|string',
        ]);

        $rekam_medis->update($data);

        logAktivitas("Mengedit rekam medis siswa {$rekam_medis->siswa->nama} pada tanggal {$rekam_medis->tanggal}", 'rekam_medis');

        return redirect()->route('backend.rekam_medis.index')->with('success', 'Rekam medis berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $rekam_medis = RekamMedis::findOrFail($id);
        $nama        = $rekam_medis->siswa->nama;
        $tanggal     = $rekam_medis->tanggal;

        $rekam_medis->delete();

        logAktivitas("Menghapus rekam medis siswa {$nama} tanggal {$tanggal}", 'rekam_medis');

        return redirect()->route('backend.rekam_medis.index')->with('success', 'Rekam medis berhasil dihapus');
    }

    public function getSiswaByKelas($kelas_id)
    {
        $siswas = Siswa::where('kelas_id', $kelas_id)->get(['id', 'nama']);
        return response()->json($siswas);
    }

    public function laporan(Request $request)
    {
        $query = RekamMedis::with('siswa.kelas');

        if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
            $query->whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir]);
        }

        $rekamMedis = $query->latest()->get();

        return view('backend.rekam_medis.laporan', compact('rekamMedis'));
    }

    public function exportExcel(Request $request)
    {
        $tanggal_awal  = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        return Excel::download(new RekamMedisExport($tanggal_awal, $tanggal_akhir), 'laporan-rekam-medis.xlsx');
    }
}
