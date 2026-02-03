<?php
namespace App\Http\Controllers;

use App\Exports\RekamMedisExport;
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
        // Ambil semua data siswa beserta kelasnya supaya NIS dan Nama bisa tampil
        $siswas = \App\Models\Siswa::with('kelas')->orderBy('nama', 'asc')->get();

        // Ambil juga data kelas dan obat (biasanya dipakai di form yang sama)
        $kelas = \App\Models\Kelas::all();
        $obat  = \App\Models\Obat::where('stok', '>', 0)->get();

        // Kirim SEMUA variabel ini ke view
        return view('backend.rekam_medis.create', compact('siswas', 'kelas', 'obat'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'tanggal'  => 'required|date',
            'keluhan'  => 'required|string',
            'obat_id'  => 'nullable|exists:obats,id',
            'status'   => 'required|in:Pulang,Kembali Ke Kelas,Di UKS', // Tambahkan Di UKS di sini
        ]);

        $validated['user_id'] = auth()->id();
        // Memastikan format huruf kapital di awal kata
        $validated['status'] = ucwords(strtolower($request->status));

        $tindakan = "Pemeriksaan";

        if (! empty($validated['obat_id'])) {
            $obat = Obat::find($validated['obat_id']);
            if ($obat->stok < 1) {
                return back()->with('error', 'Stok obat habis.');
            }
            $obat->decrement('stok', 1);
            $tindakan .= " dan diberi 1 {$obat->nama_obat}";
        }

        $validated['tindakan'] = $tindakan;

        // Simpan ke Database
        $rekam  = RekamMedis::create($validated);

        // Load relasi siswa agar log tidak error
        $rekam->load('siswa');

        logAktivitas("Menambahkan rekam medis siswa {$rekam->siswa->nama} dengan status {$rekam->status}", 'rekam_medis');

        return redirect()->route('backend.rekam_medis.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $rekam_medis = RekamMedis::with('siswa.kelas', 'obat', 'user')->findOrFail($id);
        return view('backend.rekam_medis.show', compact('rekam_medis'));
    }
    public function edit($id)
    {
        $rekam_medis = RekamMedis::with('siswa.kelas')->findOrFail($id);
        $siswas      = \App\Models\Siswa::with('kelas')->orderBy('nama', 'asc')->get();
        $kelas       = \App\Models\Kelas::all();
        $obat        = \App\Models\Obat::all();

        // 1. TAMBAHKAN BARIS INI untuk mengambil data petugas/user
        $users = User::all();

        // 2. MASUKKAN 'users' ke dalam compact
        return view('backend.rekam_medis.edit', compact('rekam_medis', 'siswas', 'kelas', 'obat', 'users'));
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
        // Cari siswa berdasarkan kelas_id
        $siswa = \App\Models\Siswa::where('kelas_id', $kelas_id)
            ->orderBy('nama', 'asc')
            ->get();

        return response()->json($siswa); // Harus dikirim sebagai JSON
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
