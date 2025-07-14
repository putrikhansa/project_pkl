<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalPemeriksaanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LogAktivitasController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\RekamMedis;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [FrontController::class, 'index']);
Route::get('/welcome', [FrontController::class, 'index'])->name('welcome');

/*
|--------------------------------------------------------------------------
| Authentication & Home
|--------------------------------------------------------------------------
*/
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth'])->name('home');

/*
|--------------------------------------------------------------------------
| Public Utilities
|--------------------------------------------------------------------------
*/
// Route::get('/log-aktivitas', [LogAktivitasController::class, 'index'])->name('log.index');

/*
|--------------------------------------------------------------------------
| Dashboard Access
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/petugas', [AdminController::class, 'index'])->name('petugas.dashboard');

/*
|--------------------------------------------------------------------------
| Export & Laporan Routes
|--------------------------------------------------------------------------
*/
Route::get('/rekam-medis/export/pdf', function (\Illuminate\Http\Request $request) {
    $awal  = $request->tanggal_awal;
    $akhir = $request->tanggal_akhir;

    $rekamMedis = RekamMedis::with('siswa.kelas')
        ->whereBetween('tanggal', [$awal, $akhir])
        ->get();

    $pdf = Pdf::loadView('backend.rekam_medis.pdf', compact('rekamMedis', 'awal', 'akhir'));
    return $pdf->download('laporan-rekam-medis.pdf');
})->name('rekam_medis.export.pdf');

/*
|--------------------------------------------------------------------------
| Backend (Petugas/Admin) - With Role Middleware
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('backend')->group(function () {

    // Blok khusus admin
    Route::group(['middleware' => function ($request, $next) {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }
        return $next($request);
    }], function () {
        Route::resource('user', UserController::class)->names([
            'index'   => 'backend.user.index',
            'create'  => 'backend.user.create',
            'store'   => 'backend.user.store',
            'destroy' => 'backend.user.destroy',
        ]);

        Route::get('/log-aktivitas', [LogAktivitasController::class, 'index'])->name('backend.log.index');
    });

    // Route umum
    Route::resource('siswa', SiswaController::class)->except(['show']);
    Route::get('siswa/search', [SiswaController::class, 'search'])->name('siswa.search');

    Route::resource('kelas', KelasController::class)->except(['show', 'edit', 'update']);
    Route::resource('obat', ObatController::class)->except(['show']);
    Route::resource('jadwal_pemeriksaan', JadwalPemeriksaanController::class)->except(['show']);
    Route::resource('rekam_medis', RekamMedisController::class)->except(['show']);
    Route::get('rekam_medis/laporan', [RekamMedisController::class, 'laporan'])->name('backend.rekam_medis.laporan');
});

/*
|--------------------------------------------------------------------------
| Admin-Only Routes (Optional - AdminMiddleware)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::resource('users', UserController::class);
});

/*
|--------------------------------------------------------------------------
| Admin Prefixed Routes (Main Admin Area)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('backend')->group(function () {

    // Siswa
    Route::get('/siswa/search', [SiswaController::class, 'search'])->name('backend.siswa.search');
    Route::resource('siswa', SiswaController::class)->names('backend.siswa');

    // Obat
    Route::resource('obat', ObatController::class)->names('backend.obat');

    // Rekam Medis
    Route::get('/rekam-medis/laporan', [RekamMedisController::class, 'laporan'])->name('backend.rekam_medis.laporan');
    Route::resource('rekam_medis', RekamMedisController::class)->names('backend.rekam_medis');
    Route::get('/rekam-medis/export/excel', [RekamMedisController::class, 'exportExcel'])->name('backend.rekam_medis.export.excel');

    // Jadwal Pemeriksaan
    Route::resource('jadwal_pemeriksaan', JadwalPemeriksaanController::class)->names('backend.jadwal_pemeriksaan');
    Route::get('/laporan/jadwal-pemeriksaan', [JadwalPemeriksaanController::class, 'laporan'])->name('backend.jadwal_pemeriksaan.laporan');
    Route::get('/laporan/jadwal-pemeriksaan/export/pdf', [JadwalPemeriksaanController::class, 'exportPdf'])->name('backend.jadwal_pemeriksaan.export.pdf');

    // Kelas
    Route::resource('kelas', KelasController::class)->names('backend.kelas');
});
