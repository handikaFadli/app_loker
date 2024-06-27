<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

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
            'admin.lowongan.index',
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
        $perusahaan = Perusahaan::all();
        return view(
            'admin.lowongan.create',
            [
                'title' => 'Lowongan Pekerjaan',
                'perusahaan' => $perusahaan
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
                'perusahaan_id' => 'required',
                'judul' => 'required|unique:lowongan,judul',
                'slug' => 'required|unique:lowongan,slug',
                'kategori' => 'required',
                'tipe' => 'required',
                'deskripsi' => 'required',
                'status' => 'required',
                'gambar' => 'required',
                'gambar.*' => 'image|mimes:jpeg,png,jpg,svg,webp',
            ],
            [
                'perusahaan_id.required' => 'Inputan perusahaan harus diisi',
                'judul.required' => 'Inputan judul harus diisi',
                'judul.unique' => 'Judul sudah terdaftar, mohon pilih judul yang lain',
                'slug.required' => 'Inputan slug harus diisi',
                'slug.unique' => 'Slug sudah terdaftar, mohon pilih slug yang lain',
                'kategori.required' => 'Inputan kategori harus diisi',
                'tipe.required' => 'Inputan tipe harus diisi',
                'deskripsi.required' => 'Inputan deskripsi harus diisi',
                'status.required' => 'Inputan status harus diisi',
                'gambar.required' => 'Inputan gambar harus diisi',
                'gambar.image' => 'File gambar harus diisi dengan file jpeg, png, jpg, svg, webp',
            ]
        );

        $input = $request->all();

        if ($request->hasFile("gambar")) {
            $image = $request->file("gambar");
            $destinationPath = "media/";
            $profileImage = date("YmdHis") . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input["gambar"] = "$profileImage";
        }

        Lowongan::create($input);

        Alert::success('Data Lowongan', 'Berhasil Ditambahkan!');
        return redirect('/admin/lowongan');
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
        $perusahaan = Perusahaan::where('id', $lowongan->perusahaan_id)->first();

        return view(
            'admin.lowongan.edit',
            [
                'title' => 'Lowongan Pekerjaan',
                'lowongan' => $lowongan,
                'perusahaan' => $perusahaan
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
                'perusahaan_id' => 'required',
                'judul' => 'required',
                'slug' => 'required',
                'kategori' => 'required',
                'tipe' => 'required',
                'deskripsi' => 'required',
                'status' => 'required',
                'gambar.*' => 'image|mimes:jpeg,png,jpg,svg,webp',
            ],
            [
                'perusahaan_id.required' => 'Inputan perusahaan harus diisi',
                'judul.required' => 'Inputan judul harus diisi',
                'slug.required' => 'Inputan slug harus diisi',
                'kategori.required' => 'Inputan kategori harus diisi',
                'tipe.required' => 'Inputan tipe harus diisi',
                'deskripsi.required' => 'Inputan deskripsi harus diisi',
                'status.required' => 'Inputan status harus diisi',
                'gambar.image' => 'File gambar harus diisi dengan file jpeg, png, jpg, svg, webp',
            ]
        );

        $input = $request->all();

        if ($request->hasFile("gambar")) {
            File::delete('media/' . $lowongan->gambar);

            $image = $request->file("gambar");
            $destinationPath = "media/";
            $profileImage = date("YmdHis") . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input["gambar"] = "$profileImage";
        } else {
            unset($input["gambar"]);
        }

        $lowongan->update($input);

        Alert::success('Data Lowongan', 'Berhasil Diubah!');
        return redirect('/admin/lowongan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lowongan $lowongan)
    {
        File::delete('media/' . $lowongan->gambar);

        $lowongan->delete();

        Alert::success('Data Lowongan', 'Berhasil Dihapus!');
        return redirect('/admin/lowongan');
    }
}
