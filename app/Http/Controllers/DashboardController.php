<?php
use App\Models\RekamMedis;
use App\Models\JadwalPemeriksaan;
use App\Models\Siswa;
use App\Models\Obat;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahRekamMedis = RekamMedis::whereMonth('tanggal', now()->month)->count();
        $jumlahSiswa      = Siswa::count();
        $jumlahObat       = Obat::sum('stok');
        $jumlahJadwal     = JadwalPemeriksaan::whereDate('tanggal', '>=', now())->count();

        $jadwalHariIni    = JadwalPemeriksaan::whereDate('tanggal', now())->get();
        $jadwalMendatang  = JadwalPemeriksaan::whereDate('tanggal', '>', now())->limit(5)->get();

        $bulan           = [];
        $jumlahKunjungan = [];
        for ($i = 1; $i <= 12; $i++) {
            $bulan[] = date('F', mktime(0, 0, 0, $i, 1));
            $jumlahKunjungan[] = RekamMedis::whereMonth('tanggal', $i)->count();
        }

        $rekamMedisTerbaru = RekamMedis::with('siswa')->latest()->take(5)->get();

        return view('dashboard', compact(
            'jumlahRekamMedis', 'jumlahSiswa', 'jumlahObat', 'jumlahJadwal',
            'jadwalHariIni', 'jadwalMendatang', 'bulan', 'jumlahKunjungan',
            'rekamMedisTerbaru'
        ));
    }
}
