<?php
namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\RekamMedis;
use App\Models\Siswa;
use DB;
class AdminController extends Controller
{

    public function index()
    {
        // Total kunjungan
        $totalKunjungan = RekamMedis::count();

// Jumlah siswa
        $jumlahSiswa = Siswa::count();

// Jumlah obat
        $jumlahObat = Obat::count();

// Data grafik kunjungan 6 bulan terakhir
        $kunjunganPerBulan = RekamMedis::select(
            DB::raw("DATE_FORMAT(tanggal, '%M %Y') as bulan"),
            DB::raw("COUNT(*) as jumlah")
        )
            ->where('tanggal', '>=', now()->subMonths(6))
            ->groupBy('bulan')
            ->orderByRaw("MIN(tanggal)")
            ->get();

// Siapkan data grafik
        $labels = $kunjunganPerBulan->pluck('bulan');
        $data   = $kunjunganPerBulan->pluck('jumlah');

// Kirim ke view
        return view('dashboard.admin', compact(
            'totalKunjungan',
            'jumlahSiswa',
            'jumlahObat',
            'labels',
            'data'
        ));
    }

}
