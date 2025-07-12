<?php
namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::latest()->get();
        return view('backend.kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view('backend.kelas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required',
        ]);

        $kelas             = new Kelas();
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->save();

        logAktivitas("Menambahkan kelas bernama {$kelas->nama_kelas}", 'kelas');

        return redirect()->route('kelas.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $kelas   = Kelas::with('jadwal_pemeriksaan')->findOrFail($id);
        $petugas = Petugas::all();

        return view('backend.kelas.show', compact('kelas', 'petugas'));
    }

    public function edit(string $id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('backend.kelas.edit', compact('kelas'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kelas' => 'required',
        ]);

        $kelas             = Kelas::findOrFail($id);
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->save();

        logAktivitas("Mengubah kelas menjadi {$kelas->nama_kelas}", 'kelas');

        return redirect()->route('kelas.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(string $id)
    {
        $kelas = Kelas::findOrFail($id);
        $nama  = $kelas->nama_kelas;

        $kelas->delete();

        logAktivitas("Menghapus kelas bernama {$nama}", 'kelas');

        return redirect()->route('kelas.index')->with('success', 'Data berhasil dihapus');
    }
}
