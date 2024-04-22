<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title_alert = 'Hapus Data Perusahaan';
        $text_alert = "Apakah anda yakin menghapus data ini?";
        confirmDelete($title_alert, $text_alert);

        return view(
            'admin.perusahaan.index',
            [
                'title' => 'Perusahaan',
                'data' => Perusahaan::all(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'admin.perusahaan.create',
            [
                'title' => 'Perusahaan',
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
                'nama' => 'required',
                'lokasi' => 'required',
                'deskripsi' => 'required',
            ],
            [
                'nama.required' => 'Inputan nama perusahaan harus diisi',
                'lokasi.required' => 'Inputan lokasi harus diisi',
                'deskripsi.required' => 'Inputan deskripsi harus diisi',
            ]
        );

        Perusahaan::create($request->all());

        Alert::success('Data Perusahaan', 'Berhasil Ditambahkan!');
        return redirect('/admin/perusahaan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Perusahaan $perusahaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perusahaan $perusahaan)
    {
        return view(
            'admin.perusahaan.edit',
            [
                'title' => 'Perusahaan',
                'perusahaan' => $perusahaan
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perusahaan $perusahaan)
    {
        $request->validate(
            [
                'nama' => 'required',
                'lokasi' => 'required',
                'deskripsi' => 'required',
            ],
            [
                'nama.required' => 'Inputan nama perusahaan harus diisi',
                'lokasi.required' => 'Inputan lokasi harus diisi',
                'deskripsi.required' => 'Inputan deskripsi harus diisi',
            ]
        );

        $perusahaan->update($request->all());

        Alert::success('Data Perusahaan', 'Berhasil Diubah!');
        return redirect('/admin/perusahaan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perusahaan $perusahaan)
    {
        $perusahaan->delete();
        Alert::success('Data Perusahaan', 'Berhasil Dihapus!');
        return redirect('/admin/perusahaan');
    }
}
