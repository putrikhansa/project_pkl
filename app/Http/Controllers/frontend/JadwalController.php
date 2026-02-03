<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class JadwalFrontendController extends Controller
{
    public function index()
    {
        // Siswa cuma boleh liat yang belum lewat
        $jadwal = Jadwal::where('tanggal', '>=', now()->toDateString())
            ->orderBy('tanggal', 'asc')
            ->get();

        return view('frontend.index', compact('jadwal'));
    }

}
