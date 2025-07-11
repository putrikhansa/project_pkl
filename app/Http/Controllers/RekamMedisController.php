<?php
namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Petugas;
use App\Models\RekamMedis;
use App\Models\Siswa;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rekam_medis = RekamMedis::with('siswa.kelas', 'obat', 'petugas')->latest()->get();
        return view('backend.rekam_medis.index', compact('rekam_medis'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa   = Siswa::all();
        $petugas = Petugas::all();
        $obat    = Obat::all();

        return view('backend.rekam_medis.create', compact('siswa', 'petugas', 'obat'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rekam_medis           = new RekamMedis();
        $rekam_medis->siswa_id = $request->siswa_id;
        $rekam_medis->tanggal  = $request->tanggal;
        $rekam_medis->keluhan  = $request->keluhan;
        $rekam_medis->tindakan = $request->tindakan;
        $rekam_medis->obat_id  = $request->obat_id;

        $rekam_medis->petugas_id = $request->petugas_id;
        $rekam_medis->status     = $request->status;

// Set default foto (harus ada file ini di storage/rekam_medis/default.jpg)

// if ($request->hasFile('foto')) {
//     $img  = $request->file('foto');
//     $name = rand(1000, 9999) . $img->getClientOriginalName();
//     $img->move('storage/rekam_medis', $name);
//     $rekam_medis->foto = $name;
// }

        $rekam_medis->save();
        return redirect()->route('rekam_medis.index')->with('success', 'data berhasil di tambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $rekam_medis = RekamMedis::with('siswa.kelas', 'obat', 'petugas')->findOrFail($id);
        return view('backend.rekam_medis.show', compact('rekam_medis'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rekam_medis = RekamMedis::findOrFail($id);
        $siswa       = Siswa::with('petugas')->get();
        $petugas    = Petugas::with('petugas')->get();
        $obat        = Obat::all();

        return view('backend.rekam_medis.edit', compact('rekam_medis', 'siswa', 'petugas', 'obat'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {

        // Didefinisikan dulu baru digunakan
        $rekam_medis = RekamMedis::findOrFail($id);

        // Update secara eksplisit (lebih aman daripada all())
        $rekam_medis->update([
            'siswa_id'   => $request->siswa_id,
            'tanggal'    => $request->tanggal,
            'keluhan'    => $request->keluhan,
            'tindakan'   => $request->tindakan,
            'obat_id'    => $request->obat_id,
            'petugas_id' => $request->petugas_id,
            'status'     => $request->status,
        ]);

        return redirect()->route('rekam_medis.index')->with('success', 'Rekam medis berhasil diperbarui');

        // $rekam_medis = RekamMedis::findOrFail($id);
        // $rekam_medis->update($request->all());

        // return redirect()->route('rekam_medis.index')->with('success', 'Rekam medis berhasil diperbarui');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rekam_medis = RekamMedis::findOrFail($id);
        $rekam_medis->delete();

        return redirect()->route('rekam_medis.index')->with('success', 'Rekam medis berhasil dihapus');

    }

    public function laporan(Request $request)
    {
        $query = RekamMedis::with('siswa.kelas');

        if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
            $query->whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir]);
        }

        $rekamMedis = $query->latest()->get();

        return view('backend.rekam_medis.laporan', compact('rekamMedis'));
    }

}
