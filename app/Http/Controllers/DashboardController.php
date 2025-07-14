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

        // Jika login sebagai admin, kirim data grafik juga
        if (auth()->user()->role === 'admin') {
            // Grafik kunjungan 6 bulan terakhir
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

            // Grafik pemakaian obat 6 bulan terakhir
            $obatTerpakai = RekamMedis::whereNotNull('obat_id')
                ->selectRaw('obat_id, COUNT(*) as total')
                ->where('tanggal', '>=', now()->subMonths(6))
                ->groupBy('obat_id')
                ->with('obat')
                ->get();

            $labelObat = $obatTerpakai->pluck('obat.nama_obat');
            $dataObat  = $obatTerpakai->pluck('total');

            return view('dashboard.admin', compact(
                'totalKunjungan',
                'jumlahSiswa',
                'jumlahObat',
                'labels',
                'data',
                'labelObat',
                'dataObat'
            ));
        }

        // Jika bukan admin (misal petugas), kirim data dasar saja
        return view('dashboard.admin', compact(
            'totalKunjungan',
            'jumlahSiswa',
            'jumlahObat'
        ));
    }
}
