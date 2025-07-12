<?php
namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\RekamMedis;
use App\Models\Siswa;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKunjungan = RekamMedis::count();
        $jumlahSiswa    = Siswa::count();
        $jumlahObat     = Obat::count();

        $kunjunganPerBulan = RekamMedis::selectRaw('MONTH(tanggal) as bulan, COUNT(*) as total')
            ->where('tanggal', '>=', now()->subMonths(6))
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        $labels = [];
        $data   = [];

        foreach ($kunjunganPerBulan as $row) {
            $labels[] = Carbon::create()->month($row->bulan)->locale('id')->isoFormat('MMMM');
            $data[]   = $row->total;
        }

        // PENTING: pastikan path view-nya ini
        return view('dashboard.admin', compact('totalKunjungan', 'jumlahSiswa', 'jumlahObat', 'labels', 'data'));
    }
}
