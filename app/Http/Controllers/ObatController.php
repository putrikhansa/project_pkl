<?php
namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obat = Obat::latest()->get();
        return view('backend.obat.index', compact('obat'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.obat.create');

    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'nama_obat'          => 'required',
            'kategori'           => 'required',
            'stok'               => 'required|numeric',
            'tanggal_kadaluarsa' => 'required|date',
            'unit'               => 'required',
            'deskripsi'          => 'required|string',
        ]);

        Obat::create($request->all());

        return redirect()->route('obat.index')->with('success', 'Obat berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $obat = Obat::findOrFail($id);
        return view('backend.obat.show', compact('obat'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $obat = Obat::findOrFail($id);
        return view('backend.obat.edit', compact('obat'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama_obat'          => 'required',
            'kategori'           => 'required',
            'stok'               => 'required',
            'tanggal_kadaluarsa' => 'required',
            'unit'               => 'required',
            'deskripsi'          => 'required',

        ]);
        $obat                     = obat::findOrFail($id);
        $obat->nama_obat          = $request->nama_obat;
        $obat->kategori           = $request->kategori;
        $obat->stok               = $request->stok;
        $obat->tanggal_kadaluarsa = $request->tanggal_kadaluarsa;
        $obat->unit               = $request->unit;
        $obat->deskripsi          = $request->deskripsi;

        // if ($request->hasFile('foto')) {
        //     $obat->deleteImage();
        //     $img  = $request->file('foto');
        //     $name = rand(1000, 9999) . $img->getClientOriginalName();
        //     $img->move('storage/obat', $name);
        //     $obat->foto = $name;
        // }

        $obat->save();
        return redirect()->route('obat.index')->with('success', 'data berhasil di rubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();
        return redirect()->route('obat.index')->with('success', 'Data Berhasil Dihapus');

    }
}
