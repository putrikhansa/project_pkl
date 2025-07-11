<?php
namespace App\Exports;

use App\Models\RekamMedis;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RekamMedisExport implements FromView
{
    protected $tanggal_awal;
    protected $tanggal_akhir;

    public function __construct($tanggal_awal, $tanggal_akhir)
    {
        $this->tanggal_awal  = $tanggal_awal;
        $this->tanggal_akhir = $tanggal_akhir;
    }

    public function view(): View
    {
        $rekamMedis = RekamMedis::with('siswa.kelas')
            ->whereBetween('tanggal', [$this->tanggal_awal, $this->tanggal_akhir])
            ->get();

        return view('backend.rekam_medis.excel', [
            'rekamMedis' => $rekamMedis,
        ]);
    }
}
