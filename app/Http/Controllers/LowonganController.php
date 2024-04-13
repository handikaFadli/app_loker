<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'lowongan.index',
            [
                'title' => 'Lowongan Pekerjaan',
                'data' => Lowongan::all(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'lowongan.create',
            [
                'title' => 'Lowongan Pekerjaan',
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'perusahaan' => 'required',
                'posisi' => 'required',
                'persyaratan' => 'required',
            ],
            [
                'perusahaan.required' => 'Inputan perusahaan harus diisi',
                'posisi.required' => 'Inputan posisi harus diisi',
                'persyaratan.required' => 'Inputan persyaratan harus diisi',
            ]
        );

        Lowongan::create($request->all());

        // Alert::success('Data Prestasi', 'Berhasil Ditambahkan!');
        return redirect('/lowongan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lowongan $lowongan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lowongan $lowongan)
    {
        return view(
            'lowongan.edit',
            [
                'title' => 'Lowongan Pekerjaan',
                'lowongan' => $lowongan
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lowongan $lowongan)
    {
        $request->validate(
            [
                'perusahaan' => 'required',
                'posisi' => 'required',
                'persyaratan' => 'required',
            ],
            [
                'perusahaan.required' => 'Inputan perusahaan harus diisi',
                'posisi.required' => 'Inputan posisi harus diisi',
                'persyaratan.required' => 'Inputan persyaratan harus diisi',
            ]
        );

        $lowongan->update($request->all());

        // Alert::success('Data Prestasi', 'Berhasil Ditambahkan!');
        return redirect('/lowongan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lowongan $lowongan)
    {
        //
    }
}
