<?php
namespace App\Http\Controllers;

use App\Models\KategoriEdukasi; // Pastikan Model ini sudah ada
use Illuminate\Http\Request;

class KategoriEdukasiController extends Controller
{
    public function index()
    {
        $kategori = KategoriEdukasi::all();
        return view('backend.kategori_edukasi.index', compact('kategori'));
    }

    public function create()
    {
        return view('backend.kategori_edukasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        KategoriEdukasi::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('backend.kategori_edukasi.index');
    }

    public function destroy($id)
    {
        KategoriEdukasi::findOrFail($id)->delete();
        return redirect()->route('backend.kategori_edukasi.index');
    }
}
