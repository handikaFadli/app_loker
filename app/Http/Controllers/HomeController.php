<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\PostLowongan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        return view(
            'home',
            []
        );
    }
}
