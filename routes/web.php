<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\PerusahaanController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', [HomeController::class, 'index']);
Route::get('/detail/{slug}', [HomeController::class, 'detail']);

Route::get('/register', [AuthController::class, 'viewRegister']);
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/profile/create');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('loginProses');


Route::middleware('auth', 'verified')->group(function () {
    Route::get('/apply/{id}',  [LamaranController::class, 'apply'])->name('apply');

    Route::get('/profile/create', [ProfilController::class, 'create']);
    Route::post('profile/create', [ProfilController::class, 'store'])->name('profile-create');
    Route::get('/profile/myprofile', [ProfilController::class, 'index']);

    Route::get('/profile/lamaran', [ProfilController::class, 'lamaran']);
    Route::get('/profile/notifikasi', [ProfilController::class, 'notifikasi']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin/dashboard', function () {
    return view('admin.home-admin');
});

Route::resource('/admin/lowongan', LowonganController::class);
Route::resource('/admin/perusahaan', PerusahaanController::class);
Route::resource('/admin/pelamar', PelamarController::class);

Route::get('/admin/lamaran/riwayat', [LamaranController::class, 'index']);
Route::get('/admin/lamaran/detail/{id}', [LamaranController::class, 'show']);
Route::post('updateStatusLamaran/{id}', [LamaranController::class, 'updateStatusLamaran'])->name('updateStatusLamaran');
Route::post('tolakLamaran/{id}', [LamaranController::class, 'tolakLamaran'])->name('tolakLamaran');
Route::get('/cancelLamaran/{id}', [LamaranController::class, 'cancelLamaran'])->name('cancelLamaran');
Route::get('/admin/lamaran/tahap-awal', [LamaranController::class, 'tahapAwal']);
Route::get('/admin/lamaran/tahap-dua', [LamaranController::class, 'tahapDua']);
Route::get('/admin/lamaran/tahap-akhir', [LamaranController::class, 'tahapAkhir']);
