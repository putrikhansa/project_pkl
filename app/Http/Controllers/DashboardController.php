<?php
namespace App\Http\Controllers;

use App\Models\JadwalPemeriksaan;
use App\Models\Obat;
use App\Models\RekamMedis;
use App\Models\Siswa;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // CARD UTAMA
        $totalKunjungan = RekamMedis::count();
        $jumlahSiswa    = Siswa::count();
        $jumlahObat     = Obat::count();
        $jumlahJadwal   = JadwalPemeriksaan::count();

        // DEFAULT (buat petugas)
        $dataDashboard = compact(
            'totalKunjungan',
            'jumlahSiswa',
            'jumlahObat',
            'jumlahJadwal'
        );

        // KHUSUS ADMIN → TAMBAH GRAFIK
        if (auth()->user()->role === 'admin') {

            // 🔹 Grafik kunjungan 6 bulan terakhir
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

            // 🔹 Grafik pemakaian obat
            $obatTerpakai = RekamMedis::whereNotNull('obat_id')
                ->selectRaw('obat_id, COUNT(*) as total')
                ->where('tanggal', '>=', now()->subMonths(6))
                ->groupBy('obat_id')
                ->with('obat')
                ->get();

            $labelObat = $obatTerpakai->pluck('obat.nama_obat');
            $dataObat  = $obatTerpakai->pluck('total');

            $dataDashboard = array_merge($dataDashboard, compact(
                'labels',
                'data',
                'labelObat',
                'dataObat'
            ));
        }

        return view('dashboard.admin', $dataDashboard);
    }
}
