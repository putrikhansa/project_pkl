<?php
namespace App\Http\Controllers;

use App\Models\EdukasiKesehatan;
use App\Models\KategoriEdukasi;
use Illuminate\Http\Request;

class EdukasiKesehatanController extends Controller
{

    public function index()
    {
        $edukasi = EdukasiKesehatan::with(['kategori', 'penulis'])
            ->latest()
            ->get();

        return view('backend.edukasi.index', compact('edukasi'));
    }

    public function create()
    {
        $kategori = KategoriEdukasi::all();
        return view('backend.edukasi.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'       => 'required',
            'isi'         => 'required',
            'kategori_id' => 'required',
        ]);

        EdukasiKesehatan::create([
            'judul'           => $request->judul,
            'isi'             => $request->isi,
            'kategori_id'     => $request->kategori_id,
            'penulis_id'      => auth()->id(),
            'status'          => $request->status,
            'tanggal_publish' => now(),
        ]);

        return redirect()->route('backend.edukasi.index')
            ->with('success', 'Edukasi berhasil ditambahkan');
    }
    // Tambahkan di dalam class EdukasiKesehatanController

    public function edit($id)
    {
        $edukasi  = EdukasiKesehatan::findOrFail($id);
        $kategori = KategoriEdukasi::all(); // Jika butuh list kategori untuk dropdown

        return view('backend.edukasi.edit', compact('edukasi', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        // ... validasi tetap sama ...

        $edukasi = EdukasiKesehatan::findOrFail($id);

        // Pastikan status yang dikirim ke DB adalah 'publish' atau 'draft'
        $status = ($request->status == 'published') ? 'publish' : $request->status;

        $edukasi->update([
            'judul'       => $request->judul,
            'isi'         => $request->isi,
            'kategori_id' => $request->kategori_id,
            'status'      => $status,
        ]);

        return redirect()->route('backend.edukasi.index')->with('success', 'Berhasil update!');
    }
    /**
     * Menghapus data edukasi dari database.
     */
    public function destroy($id)
    {
        try {
            $edukasi = EdukasiKesehatan::findOrFail($id);
            $edukasi->delete();

            // Redirect balik dengan pesan sukses
            return redirect()->route('backend.edukasi.index')
                ->with('success', 'Materi edukasi berhasil dihapus!');
        } catch (\Exception $e) {
            // Jika gagal (misal data masih terikat dengan data lain)
            return redirect()->route('backend.edukasi.index')
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
    public function toggleStatus($id)
    {
        $edukasi         = EdukasiKesehatan::findOrFail($id);
        $edukasi->status = $edukasi->status === 'publish' ? 'draft' : 'publish';
        $edukasi->save();

        return back()->with('success', 'Status edukasi berhasil diubah!');
    }

}
