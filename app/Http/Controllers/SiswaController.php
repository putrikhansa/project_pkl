<?php
namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::latest()->get();
        $kelas = Kelas::all();

        return view('backend.siswa.index', compact('siswas', 'kelas'));

    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('backend.siswa.create', compact('kelas'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'          => 'required|string',
            'kelas_id'      => 'required|exists:kelas,id',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
        ]);

        Siswa::create([
            'nama'          => $request->nama, // <-- Pastikan ini bukan Auth::id()
            'kelas_id'      => $request->kelas_id,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan');

    }
    public function show(string $id)
    {
        $siswa = Siswa::with('kelas')->findOrFail($id);
        return view('backend.siswa.show', compact('siswa'));

    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();

        return view('backend.siswa.edit', compact('siswa', 'kelas'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'          => 'required|string',
            'kelas_id'      => 'required|exists:kelas,id',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
        ]);

        $siswa = Siswa::findOrFail($id); // <-- Tambahkan ini

        $siswa->update([
            'nama'          => $request->nama,
            'kelas_id'      => $request->kelas_id,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diperbarui');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

                                         // Hapus semua rekam medis yang terkait
        $siswa->rekam_medis()->delete(); // Pastikan relasinya ada

        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Siswa dan data terkait berhasil dihapus');
    }
}
