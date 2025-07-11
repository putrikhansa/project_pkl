<?php
namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\JadwalPemeriksaan;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;

class JadwalPemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal_pemeriksaan = JadwalPemeriksaan::with(['kelas', 'user'])->latest()->get();
        return view('backend.jadwal_pemeriksaan.index', compact('jadwal_pemeriksaan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas   = Kelas::all();
        $users = User::all();
        return view('backend.jadwal_pemeriksaan.create', compact('kelas', 'user'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal'    => 'required|date',
            'kelas_id'   => 'required|exists:kelas,id',
            'user_id' => 'required|exists:user,id',
            'keterangan' => 'nullable|string',
        ]);

        JadwalPemeriksaan::create([
            'tanggal'    => $request->tanggal,
            'kelas_id'   => $request->kelas_id,
            'user_id' => $request->user_id,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('jadwal_pemeriksaan.index')->with('success', 'Jadwal berhasil disimpan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jadwal_pemeriksaan = JadwalPemeriksaan::with(['kelas', 'user.user'])->findOrFail($id);
        return view('backend.jadwal_pemeriksaan.show', compact('jadwal_pemeriksaan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jadwal_pemeriksaan = JadwalPemeriksaan::findOrFail($id);
        $kelas              = Kelas::all();
        $users            = user::with('user')->get();

        return view('backend.jadwal_pemeriksaan.edit', compact('jadwal_pemeriksaan', 'kelas', 'user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tanggal'    => 'required|date',
            'kelas_id'   => 'required|exists:kelas,id',
            'user_id' => 'required|exists:user,id',
            'keterangan' => 'nullable|string',
        ]);

        $jadwal = JadwalPemeriksaan::findOrFail($id);
        $jadwal->update([
            'tanggal'    => $request->tanggal,
            'kelas_id'   => $request->kelas_id,
            'user_id' => $request->user_id,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('jadwal_pemeriksaan.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwal = JadwalPemeriksaan::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal_pemeriksaan.index')->with('success', 'Jadwal berhasil dihapus.');

    }
    public function laporan(Request $request)
    {
        $awal  = $request->input('tanggal_awal');
        $akhir = $request->input('tanggal_akhir');

        $jadwal = null;

        if ($awal && $akhir) {
            $jadwal = \App\Models\JadwalPemeriksaan::with('kelas')
                ->whereBetween('tanggal', [$awal, $akhir])
                ->get();
        }

        return view('backend.jadwal_pemeriksaan.laporan', compact('jadwal', 'awal', 'akhir'));
    }
    public function exportPdf(Request $request)
    {
        $awal  = $request->input('tanggal_awal');
        $akhir = $request->input('tanggal_akhir');

        $jadwal = JadwalPemeriksaan::with(['kelas', 'user.user'])
            ->whereBetween('tanggal', [$awal, $akhir])
            ->get();

        $pdf = Pdf::loadView('backend.jadwal_pemeriksaan.pdf', compact('jadwal', 'awal', 'akhir'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('laporan-jadwal-pemeriksaan.pdf');
    }

}
