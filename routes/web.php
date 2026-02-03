<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EdukasiKesehatanController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalPemeriksaanController;
use App\Http\Controllers\KategoriEdukasiController;
use App\Http\Controllers\KelasController; // Tambahan: Pastikan file ini ada
use App\Http\Controllers\LogAktivitasController;
use App\Http\Controllers\ObatController; // Tambahan: Pastikan file ini ada
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use App\Models\RekamMedis;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| FRONTEND (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::get('/', [FrontController::class, 'index'])->name('frontend');

/*
|--------------------------------------------------------------------------
| AUTH & HOME
|--------------------------------------------------------------------------
*/
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

/*
|--------------------------------------------------------------------------
| DASHBOARD (REDIRECTOR)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/petugas', [AdminController::class, 'index'])->name('petugas.dashboard');
});

/*
|--------------------------------------------------------------------------
| BACKEND (AUTH REQUIRED)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')
    ->prefix('backend')
    ->name('backend.')
    ->group(function () {

        // 1. KATEGORI EDUKASI
        Route::resource('kategori_edukasi', KategoriEdukasiController::class)
            ->only(['index', 'create', 'store', 'destroy']);

        // 2. EDUKASI KESEHATAN
        Route::resource('edukasi', EdukasiKesehatanController::class);
        Route::patch('/backend/edukasi/{id}/toggle-status', [EdukasiKesehatanController::class, 'toggleStatus'])->name('edukasi.toggle');

        // 3. ADMIN ONLY - Menggunakan alias 'admin' (Daftarkan dulu di bootstrap/app.php)
        Route::middleware('admin')->group(function () {
            Route::resource('user', UserController::class)->except(['show', 'edit', 'update']);
            Route::get('log-aktivitas', [LogAktivitasController::class, 'index'])->name('log.index');
        });

        // 4. MANAJEMEN DATA (UMUM)
        Route::get('siswa/search', [SiswaController::class, 'search'])->name('siswa.search');
        Route::resource('siswa', SiswaController::class);
        Route::resource('kelas', KelasController::class);
        Route::resource('obat', ObatController::class);
        Route::resource('rekam_medis', RekamMedisController::class);
        Route::resource('jadwal_pemeriksaan', JadwalPemeriksaanController::class);

        // 5. LAPORAN & EXPORT
        Route::get('rekam-medis-laporan', [RekamMedisController::class, 'laporan'])->name('rekam_medis.laporan');
        Route::get('rekam-medis-excel', [RekamMedisController::class, 'exportExcel'])->name('rekam_medis.export.excel');
        Route::get('jadwal-pemeriksaan-laporan', [JadwalPemeriksaanController::class, 'laporan'])->name('jadwal_pemeriksaan.laporan');
        Route::get('jadwal-pemeriksaan-pdf', [JadwalPemeriksaanController::class, 'exportPdf'])->name('jadwal_pemeriksaan.export.pdf');
    });

/*
|--------------------------------------------------------------------------
| GLOBAL PDF & AJAX
|--------------------------------------------------------------------------
*/
Route::get('/export-rekam-medis-pdf', function (\Illuminate\Http\Request $request) {
    $rekamMedis = RekamMedis::with('siswa.kelas')
        ->whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir])
        ->get();

    $pdf = Pdf::loadView('backend.rekam_medis.pdf', [
        'rekamMedis' => $rekamMedis,
        'awal'       => $request->tanggal_awal,
        'akhir'      => $request->tanggal_akhir,
    ]);

    return $pdf->download('laporan-rekam-medis.pdf');
})->name('rekam_medis.export.pdf');

Route::get('/get-siswa-by-kelas/{kelas_id}', [RekamMedisController::class, 'getSiswaByKelas']);
