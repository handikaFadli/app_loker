<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function tentang()
    {
        $lowongan = Lowongan::with('perusahaan')->get();
        return view(
            'tentang',
            ['lowongan' => $lowongan]
        );
    }

    public function lowongan()
    {
        $lowongan = Lowongan::with('perusahaan')->get();
        return view(
            'lowongan',
            ['lowongan' => $lowongan]
        );
    }

    public function kontak()
    {
        $lowongan = Lowongan::with('perusahaan')->get();
        return view(
            'kontak',
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

    public function submit(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:20',
            'pesan' => 'required|string|max:2000',
        ]);

        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->to('info@cic.ac.id')
                ->subject('Pesan Kontak')
                ->from($data['email']);
        });

        return back();
    }
}
