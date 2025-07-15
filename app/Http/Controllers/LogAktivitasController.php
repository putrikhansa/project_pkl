<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\LogAktivitas;

class LogAktivitasController extends Controller
{
    public function index()
    {
        
        // Ambil semua log aktivitas dengan relasi user

    // Ambil log aktivitas dan relasi user-nya
    $logs = LogAktivitas::with('user')->latest()->paginate(10);

    return view('backend.log.index', compact('logs'));


    }
}
