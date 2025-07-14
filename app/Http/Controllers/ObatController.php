<?php
namespace App\Http\Controllers;

use App\Models\LogAktivitas;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obat = Obat::latest()->get();
        return view('backend.obat.index', compact('obat'));
    }

    public function create()
    {
        return view('backend.obat.create');
    }

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

        $obat = Obat::create($request->all());

        logAktivitas("Menambahkan obat bernama {$obat->nama_obat}", 'obat');

        return redirect()->route('backend.obat.index')->with('success', 'Obat berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $obat = Obat::findOrFail($id);
        return view('backend.obat.show', compact('obat'));
    }

    public function edit(string $id)
    {
        $obat = Obat::findOrFail($id);
        return view('backend.obat.edit', compact('obat'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_obat'          => 'required',
            'kategori'           => 'required',
            'stok'               => 'required|numeric',
            'tanggal_kadaluarsa' => 'required|date',
            'unit'               => 'required',
            'deskripsi'          => 'required|string',
        ]);

        $obat = Obat::findOrFail($id);

        $obat->update([
            'nama_obat'          => $request->nama_obat,
            'kategori'           => $request->kategori,
            'stok'               => $request->stok,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
            'unit'               => $request->unit,
            'deskripsi'          => $request->deskripsi,
        ]);

        logAktivitas("Mengedit data obat bernama {$obat->nama_obat}", 'obat');

        return redirect()->route('backend.obat.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(string $id)
    {
        $obat = Obat::findOrFail($id);
        $nama = $obat->nama_obat;

        $obat->delete();

        logAktivitas("Menghapus obat bernama {$nama}", 'obat');

        return redirect()->route('backend.obat.index')->with('success', 'Data berhasil dihapus');
    }
}
