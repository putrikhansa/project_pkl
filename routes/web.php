<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalPemeriksaanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\LogAktivitasController;

use App\Http\Middleware\Role;
use App\Models\RekamMedis;

// dipakai langsung

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;

Route::get('/log-aktivitas', [LogAktivitasController::class, 'index'])->name('log.index');


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::get('/laporan/jadwal-pemeriksaan', [JadwalPemeriksaanController::class, 'laporan'])
    ->name('jadwal_pemeriksaan.laporan');

Route::get('/laporan/jadwal-pemeriksaan/export/pdf', [JadwalPemeriksaanController::class, 'exportPdf'])
    ->name('jadwal_pemeriksaan.export.pdf');

Route::get('/rekam-medis/export/pdf', function (\Illuminate\Http\Request $request) {
    $awal  = $request->tanggal_awal;
    $akhir = $request->tanggal_akhir;

    $rekamMedis = RekamMedis::with('siswa.kelas')
        ->whereBetween('tanggal', [$awal, $akhir])
        ->get();

    $pdf = Pdf::loadView('backend.rekam_medis.pdf', compact('rekamMedis', 'awal', 'akhir'));

    return $pdf->download('laporan-rekam-medis.pdf');
})->name('rekam_medis.export.pdf');

Route::view('/welcome', 'welcome')->name('welcome');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])
    ->middleware(['auth'])
    ->name('home');

//  Admin Dashboard
Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/petugas', [AdminController::class, 'index'])->name('petugas.dashboard');

Route::middleware(['auth', Role::class])->prefix('backend')->group(function () {
    Route::resource('user', UserController::class)->names([
        'index'   => 'backend.user.index',
        'create'  => 'backend.user.create',
        'store'   => 'backend.user.store',
        'destroy' => 'backend.user.destroy',
    ]);
});

//  Route khusus admin
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::resource('users', UserController::class);
});

//  Route umum (login saja)
Route::middleware(['auth'])->group(function () {
    Route::get('/siswa/search', [SiswaController::class, 'search'])->name('siswa.search');
    Route::resource('siswa', SiswaController::class);

    Route::get('/rekam-medis/laporan', [RekamMedisController::class, 'laporan'])->name('rekam_medis.laporan');

    Route::resource('siswa', SiswaController::class);
    Route::resource('obat', ObatController::class);
    Route::resource('rekam_medis', RekamMedisController::class);
    Route::resource('jadwal_pemeriksaan', JadwalPemeriksaanController::class);
    Route::resource('kelas', KelasController::class);

});
