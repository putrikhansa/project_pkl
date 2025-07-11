<?php
namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::latest()->get();
        return view('backend.kelas.index', compact('kelas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.kelas.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kelas             = new Kelas();
        $kelas->nama_kelas = $request->nama_kelas;

// Set default foto (harus ada file ini di storage/kelas/default.jpg)

// if ($request->hasFile('foto')) {
//     $img  = $request->file('foto');
//     $name = rand(1000, 9999) . $img->getClientOriginalName();
//     $img->move('storage/kelas', $name);
//     $kelas->foto = $name;
// }

        $kelas->save();
        return redirect()->route('kelas.index')->with('success', 'data berhasil di tambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kelas   = Kelas::with('jadwal_pemeriksaan')->findOrFail($id);
        $petugas = Petugas::all(); // untuk select petugas

        return view('backend.kelas.show', compact('kelas', 'petugas'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelas = kelas::findOrFail($id);
        return view('backend.kelas.edit', compact('kelas'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama_kelas' => 'required',

        ]);
        $kelas             = kelas::findOrFail($id);
        $kelas->nama_kelas = $request->nama_kelas;

// if ($request->hasFile('foto')) {
//     $kelas->deleteImage();
//     $img  = $request->file('foto');
//     $name = rand(1000, 9999) . $img->getClientOriginalName();
//     $img->move('storage/kelas', $name);
//     $kelas->foto = $name;
// }

        $kelas->save();
        return redirect()->route('kelas.index')->with('success', 'data berhasil di rubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
        return redirect()->route('kelas.index')->with('success', 'Data Berhasil Dihapus');

    }
}
