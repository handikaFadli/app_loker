<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Lowongan;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title_alert = 'Hapus Data Lowongan';
        $text_alert = "Apakah anda yakin menghapus data ini?";
        confirmDelete($title_alert, $text_alert);

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
                'lokasi' => 'required',
                'tipe' => 'required',
            ],
            [
                'perusahaan.required' => 'Inputan perusahaan harus diisi',
                'posisi.required' => 'Inputan posisi harus diisi',
                'lokasi.required' => 'Inputan lokasi harus diisi',
                'tipe.required' => 'Inputan tipe harus diisi',
            ]
        );

        Lowongan::create($request->all());

        Alert::success('Data Lowongan', 'Berhasil Ditambahkan!');
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
                'lokasi' => 'required',
                'tipe' => 'required',
            ],
            [
                'perusahaan.required' => 'Inputan perusahaan harus diisi',
                'posisi.required' => 'Inputan posisi harus diisi',
                'lokasi.required' => 'Inputan lokasi harus diisi',
                'tipe.required' => 'Inputan tipe harus diisi',
            ]
        );

        $lowongan->update($request->all());

        Alert::success('Data Lowongan', 'Berhasil Diubah!');
        return redirect('/lowongan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lowongan $lowongan)
    {
        $lowongan->delete();
        Alert::success('Data Lowongan', 'Berhasil Dihapus!');
        return redirect('/lowongan');
    }
}
