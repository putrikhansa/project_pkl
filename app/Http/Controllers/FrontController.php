<?php
namespace App\Http\Controllers;

use App\Models\EdukasiKesehatan;
use App\Models\JadwalPemeriksaan;
use App\Models\Obat;
use App\Models\RekamMedis;
use App\Models\User;

class FrontController extends Controller
{
    public function index()
    {
        $users           = User::where('role', 'petugas')->get();
        $jumlahKunjungan = RekamMedis::count();
        $jumlahObat      = Obat::count();

        $jadwal = JadwalPemeriksaan::with(['kelas', 'user'])
            ->orderBy('tanggal', 'asc')
            ->get();

        $edukasi = EdukasiKesehatan::where('status', 'publish')
            ->whereDate('tanggal_publish', '<=', now())
            ->latest()
            ->get();

        return view('welcome', compact(
            'users',
            'jumlahKunjungan',
            'jumlahObat',
            'jadwal',
            'edukasi'
        ));
    }
}
