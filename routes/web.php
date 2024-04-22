<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\PostLowonganController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, "index"]);

Route::get('/admin/dashboard', function () {
    return view('admin.home-admin');
});

Route::resource('/admin/lowongan', LowonganController::class);
Route::resource('/admin/post-lowongan', PostLowonganController::class);
Route::resource('/admin/perusahaan', PerusahaanController::class);
