<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\PostLowongan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $lowongan = Lowongan::with('perusahaan')->get();
        return view(
            'home',
            ['lowongan' => $lowongan]
        );
    }

    public function detail($slug)
    {
        $lowongan = Lowongan::with('perusahaan')->where('lowongan.slug', $slug)->first();

        return view(
            'detail',
            [
                'lowongan' => $lowongan
            ]
        );
    }
}
