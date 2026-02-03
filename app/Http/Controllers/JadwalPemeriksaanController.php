<?php
namespace App\Http\Controllers;

use App\Models\JadwalPemeriksaan;
use App\Models\Kelas;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class JadwalPemeriksaanController extends Controller
{
    public function index()
    {
        // Gunakan with('kelas') agar di view $data->kelas->nama_kelas tidak error/n+1 query
        // Urutkan berdasarkan tanggal terbaru agar data lebih rapi
        $jadwal_pemeriksaan = JadwalPemeriksaan::with(['kelas', 'user'])
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('backend.jadwal_pemeriksaan.index', compact('jadwal_pemeriksaan'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        // Biasanya petugas diambil dari user dengan role tertentu, tapi ini ambil semua dulu
        $users = User::all();
        return view('backend.jadwal_pemeriksaan.create', compact('kelas', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal'    => 'required|date',
            'kelas_id'   => 'required|exists:kelas,id',
            'user_id'    => 'required|exists:users,id',
            'keterangan' => 'nullable|string',
        ]);

        $jadwal = JadwalPemeriksaan::create($request->all());

        // Pastikan helper logAktivitas() sudah terdefinisi di helper global kamu
        if (function_exists('logAktivitas')) {
            logAktivitas("Menambahkan jadwal pemeriksaan untuk kelas ID {$jadwal->kelas_id} pada {$jadwal->tanggal}", 'jadwal_pemeriksaan');
        }

        return redirect()->route('backend.jadwal_pemeriksaan.index')->with('success', 'Jadwal berhasil disimpan.');
    }

    public function show(string $id)
    {
        $jadwal_pemeriksaan = JadwalPemeriksaan::with(['kelas', 'user'])->findOrFail($id);
        return view('backend.jadwal_pemeriksaan.show', compact('jadwal_pemeriksaan'));
    }

    public function edit(string $id)
    {
        $jadwal_pemeriksaan = JadwalPemeriksaan::findOrFail($id);
        $kelas              = Kelas::all();
        $users              = User::all();

        return view('backend.jadwal_pemeriksaan.edit', compact('jadwal_pemeriksaan', 'kelas', 'users'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'tanggal'    => 'required|date',
            'kelas_id'   => 'required|exists:kelas,id',
            'user_id'    => 'required|exists:users,id',
            'keterangan' => 'nullable|string',
        ]);

        $jadwal = JadwalPemeriksaan::findOrFail($id);
        $jadwal->update($request->all());

        if (function_exists('logAktivitas')) {
            logAktivitas("Mengedit jadwal pemeriksaan ID {$jadwal->id}", 'jadwal_pemeriksaan');
        }

        return redirect()->route('backend.jadwal_pemeriksaan.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $jadwal = JadwalPemeriksaan::findOrFail($id);
        $jadwal->delete();

        if (function_exists('logAktivitas')) {
            logAktivitas("Menghapus jadwal pemeriksaan", 'jadwal_pemeriksaan');
        }

        return redirect()->route('backend.jadwal_pemeriksaan.index')->with('success', 'Jadwal berhasil dihapus.');
    }

    public function laporan(Request $request)
    {
        $awal  = $request->tanggal_awal;
        $akhir = $request->tanggal_akhir;

        // Inisialisasi koleksi kosong
        $jadwal = collect([]);

        if ($awal && $akhir) {
            $jadwal = JadwalPemeriksaan::with(['kelas', 'user'])
                ->whereBetween('tanggal', [$awal, $akhir])
                ->orderBy('tanggal', 'asc')
                ->get();
        }

        return view('backend.jadwal_pemeriksaan.laporan', compact('jadwal', 'awal', 'akhir'));
    }

    public function exportPdf(Request $request)
    {
        $awal  = $request->input('tanggal_awal');
        $akhir = $request->input('tanggal_akhir');

        // Tambahkan validasi jika tanggal kosong sebelum export
        if (! $awal || ! $akhir) {
            return back()->with('error', 'Pilih rentang tanggal terlebih dahulu.');
        }

        $jadwal = JadwalPemeriksaan::with(['kelas', 'user'])
            ->whereBetween('tanggal', [$awal, $akhir])
            ->get();

        $pdf = Pdf::loadView('backend.jadwal_pemeriksaan.pdf', compact('jadwal', 'awal', 'akhir'))
            ->setPaper('a4', 'portrait');

        return $pdf->download("laporan-jadwal-$awal-ke-$akhir.pdf");
    }
}
