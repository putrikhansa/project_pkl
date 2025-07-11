<?php
namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = Petugas::with('user')->latest()->get();
        return view('backend.petugas.index', compact('petugas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $petugas = Petugas::all();
        return view('backend.petugas.create', compact('petugas'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'no_hp'    => 'required|string',
            'password' => 'required|min:6',
        ]);

        // 1. Buat akun user baru
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'no_hp'    => $request->no_hp,
            'password' => Hash::make($request->password),
            'role'     => 'petugas', // pastikan ada field 'role' di tabel users
        ]);

        // Simpan ke database

        return redirect()->route('petugas.index')->with('success', 'Data petugas berhasil ditambahkan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $petugas = Petugas::with('user')->findOrFail($id);
        return view('backend.petugas.show', compact('petugas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $petugas = Petugas::findOrFail($id);
        $users   = User::all(); // ambil semua user

        return view('backend.petugas.edit', compact('petugas', 'users'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama'    => 'required',
            'user_id' => 'required',
            'no_hp'   => 'required',

        ]);
        $petugas          = petugas::findOrFail($id);
        $petugas->nama    = $request->nama;
        $petugas->user_id = $request->user_id;
        $petugas->no_hp   = $request->no_hp;

// if ($request->hasFile('foto')) {
//     $petugas->deleteImage();
//     $img  = $request->file('foto');
//     $name = rand(1000, 9999) . $img->getClientOriginalName();
//     $img->move('storage/petugas', $name);
//     $petugas->foto = $name;
// }

        $petugas->save();
        return redirect()->route('petugas.index')->with('success', 'data berhasil di rubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $petugas = Petugas::findOrFail($id);
        $petugas->delete();
        return redirect()->route('petugas.index')->with('success', 'Data Berhasil Dihapus');

    }
}
