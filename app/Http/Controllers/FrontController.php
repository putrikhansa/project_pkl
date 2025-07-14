<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Obat;
use App\Models\RekamMedis;

class FrontController extends Controller
{
    public function index()
    {
        $users           = User::where('role', 'petugas')->get();
        $jumlahKunjungan = RekamMedis::count();
        $jumlahObat      = Obat::count();

        return view('welcome', compact('users', 'jumlahKunjungan', 'jumlahObat'));

    }
}
