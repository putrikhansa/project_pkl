<?php
namespace App\Http\Controllers;

use App\Models\EdukasiKesehatan;
use App\Models\KategoriEdukasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'judul'       => 'required|string|max:255',
            'isi'         => 'required',
            'kategori_id' => 'required|exists:kategori_edukasi,id',
            'foto'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi foto
            'status'      => 'required|in:draft,publish',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('edukasi', 'public');
        }

        EdukasiKesehatan::create([
            'judul'           => $request->judul,
            'isi'             => $request->isi,
            'foto'            => $fotoPath,
            'kategori_id'     => $request->kategori_id,
            'penulis_id'      => auth()->id(),
            'status'          => $request->status,
            'tanggal_publish' => $request->status == 'publish' ? now() : null,
        ]);

        return redirect()->route('backend.edukasi.index')
            ->with('success', 'Edukasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $edukasi  = EdukasiKesehatan::findOrFail($id);
        $kategori = KategoriEdukasi::all();

        return view('backend.edukasi.edit', compact('edukasi', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'       => 'required|string|max:255',
            'isi'         => 'required',
            'kategori_id' => 'required|exists:kategori_edukasi,id',
            'foto'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status'      => 'required|in:draft,publish',
        ]);

        $edukasi  = EdukasiKesehatan::findOrFail($id);
        $fotoPath = $edukasi->foto; // Ambil path lama sebagai default

        if ($request->hasFile('foto')) {
            // 1. Hapus foto lama dari disk jika ada file fisiknya
            if ($edukasi->foto && Storage::disk('public')->exists($edukasi->foto)) {
                Storage::disk('public')->delete($edukasi->foto);
            }
            // 2. Simpan foto baru
            $fotoPath = $request->file('foto')->store('edukasi', 'public');
        }

        $edukasi->update([
            'judul'           => $request->judul,
            'isi'             => $request->isi,
            'foto'            => $fotoPath,
            'kategori_id'     => $request->kategori_id,
            'status'          => $request->status,
            // Logika tanggal: jika baru di-publish sekarang, set jamnya sekarang
            'tanggal_publish' => ($edukasi->status == 'draft' && $request->status == 'publish')
                ? now()
                : $edukasi->tanggal_publish,
        ]);

        return redirect()->route('backend.edukasi.index')
            ->with('success', 'Berhasil update edukasi!');
    }

    public function destroy($id)
    {
        try {
            $edukasi = EdukasiKesehatan::findOrFail($id);

            // Hapus file foto dari storage sebelum hapus data di DB
            if ($edukasi->foto) {
                Storage::disk('public')->delete($edukasi->foto);
            }

            $edukasi->delete();

            return redirect()->route('backend.edukasi.index')
                ->with('success', 'Materi edukasi berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('backend.edukasi.index')
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    public function toggleStatus($id)
    {
        $edukasi   = EdukasiKesehatan::findOrFail($id);
        $newStatus = ($edukasi->status === 'publish') ? 'draft' : 'publish';

        $edukasi->update([
            'status'          => $newStatus,
            'tanggal_publish' => ($newStatus === 'publish' && ! $edukasi->tanggal_publish) ? now() : $edukasi->tanggal_publish,
        ]);

        return back()->with('success', 'Status edukasi berhasil diubah!');
    }
}
