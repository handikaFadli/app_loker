<?php

use App\Http\Controllers\LowonganController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home-admin');
});

Route::resource('/lowongan', LowonganController::class);
