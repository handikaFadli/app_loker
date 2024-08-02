<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', [HomeController::class, 'index']);
Route::get('/tentang', [HomeController::class, 'tentang']);
Route::get('/kontak', [HomeController::class, 'kontak']);
Route::get('/lowongan', [HomeController::class, 'lowongan']);
Route::get('/lowongan/detail/{slug}', [HomeController::class, 'detail']);
Route::post('/contact-submit', [HomeController::class, 'submit'])->name('contact.submit');

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
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('apply',  [LamaranController::class, 'apply'])->name('apply');
    Route::get('/form/tahap-dua',  [LamaranController::class, 'formTahapDua']);
    Route::get('/download-formulir', [LamaranController::class, 'downloadFormulir']);
    Route::post('upload-formulir',  [LamaranController::class, 'uploadFormulir'])->name('upload-formulir');

    Route::get('/profile/create', [ProfilController::class, 'create']);
    Route::post('profile/create', [PelamarController::class, 'store'])->name('profile-create');
    Route::get('/profile/edit', [ProfilController::class, 'edit']);
    Route::post('profile/update', [PelamarController::class, 'profileUpdate'])->name('profile-update');
    Route::get('/profile/myprofile', [ProfilController::class, 'index']);

    Route::get('/profile/lamaran', [ProfilController::class, 'lamaran']);
    Route::get('/profile/notifikasi', [ProfilController::class, 'notifikasi']);
    Route::get('/profile/ubah-password', [ProfilController::class, 'viewUpdatePassword']);
    Route::post('profile/ubah-password', [ProfilController::class, 'updatePassword'])->name('password-update');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index']);

    Route::resource('/admin/lowongan', LowonganController::class);

    Route::resource('/admin/perusahaan', PerusahaanController::class);

    Route::get('/admin/pelamar', [PelamarController::class, 'index'])->name('pelamar.index');
    Route::get('/admin/pelamar/edit/{id}', [PelamarController::class, 'edit'])->name('pelamar.edit');
    Route::get('/admin/pelamar/detail/{id}', [PelamarController::class, 'show'])->name('pelamar.show');
    Route::delete('/admin/pelamar/{id}', [PelamarController::class, 'destroy'])->name('pelamar.destroy');
    Route::put('/admin/pelamar/update/{id}', [PelamarController::class, 'update'])->name('pelamar.update');

    Route::resource('/admin/kelola-user', UserController::class);

    Route::get('/admin/kontak', [KontakController::class, 'index'])->name('kontak.index');
    Route::get('/admin/kontak/edit/{id}', [KontakController::class, 'edit'])->name('kontak.edit');
    Route::put('/admin/kontak/update/{id}', [KontakController::class, 'update'])->name('kontak.update');

    Route::get('/admin/tentang', [TentangController::class, 'index'])->name('tentang.index');
    Route::get('/admin/tentang/edit/{id}', [TentangController::class, 'edit'])->name('tentang.edit');
    Route::put('/admin/tentang/update/{id}', [TentangController::class, 'update'])->name('tentang.update');

    Route::get('/admin/lamaran/riwayat', [LamaranController::class, 'index']);
    Route::get('/admin/lamaran/detail/{id}', [LamaranController::class, 'show']);
    Route::post('updateStatusLamaran/{id}', [LamaranController::class, 'updateStatusLamaran'])->name('updateStatusLamaran');
    Route::post('tolakLamaran/{id}', [LamaranController::class, 'tolakLamaran'])->name('tolakLamaran');
    Route::post('admin/lamaran/{id}', [LamaranController::class, 'update'])->name('lamaran.update');
    Route::delete('admin/lamaran/{id}', [LamaranController::class, 'destroy'])->name('lamaran.destroy');
    Route::get('/cancelLamaran/{id}', [LamaranController::class, 'cancelLamaran'])->name('cancelLamaran');
    Route::get('/admin/lamaran/tahap-awal', [LamaranController::class, 'tahapAwal']);
    Route::get('/admin/lamaran/tahap-dua', [LamaranController::class, 'tahapDua']);
    Route::get('/admin/lamaran/tahap-akhir', [LamaranController::class, 'tahapAkhir']);
    Route::get('/admin/lamaran/detail/download-formulir/{id}', [LamaranController::class, 'downloadFormulirPelamar'])->name('downloadFormulirPelamar');
    Route::get('/lamaran/print', [LamaranController::class, 'print'])->name('lamaran.print');
    Route::get('/preview/{jenis}/{id}', [LamaranController::class, 'preview'])->name('preview');
});
