<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\PostLowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class PostLowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PostLowongan::join('lowongan', 'post_lowongan.lowongan_id', '=', 'lowongan.id')
            ->select('post_lowongan.*', 'lowongan.posisi', 'lowongan.perusahaan')
            ->get();

        $lowongan = Lowongan::where("status", "1")->get();
        $lowongan = $lowongan->count();

        $title_alert = 'Hapus Data Postingan';
        $text_alert = "Apakah anda yakin menghapus data ini?";
        confirmDelete($title_alert, $text_alert);

        return view(
            'admin.postingan.index',
            [
                'title' => 'Postingan Loker',
                'data' => $data,
                'lowongan' => $lowongan,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lowongan = Lowongan::where("status", "1")->get();

        return view(
            'admin.postingan.create',
            [
                'title' => 'Postingan Loker',
                'lowongan' => $lowongan,
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
                'lowongan_id' => 'required',
                'judul' => 'required',
                'post_slug' => 'required',
                'batas_waktu' => 'required',
                'deskripsi' => 'required',
                'gambar' => 'required',
                'status' => 'required',
                'gambar.*' => 'image|mimes:jpeg,png,jpg,svg,webp',
            ],
            [
                'lowongan_id.required' => 'Inputan lowongan harus diisi',
                'judul.required' => 'Inputan judul harus diisi',
                'post_slug.required' => 'Inputan post slug harus diisi',
                'batas_waktu.required' => 'Inputan batas waktu harus diisi',
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

        PostLowongan::create($input);

        // update status lowongan
        $lowongan = Lowongan::where("id", $request->lowongan_id)->first();

        if ($lowongan) {
            $lowongan->status = "2";
            $lowongan->save();
        }


        Alert::success('Data Postingan', 'Berhasil Ditambahkan!');
        return redirect('/admin/post-lowongan');
    }

    /**
     * Display the specified resource.
     */
    public function show(PostLowongan $postLowongan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostLowongan $postLowongan)
    {
        $lowongan = Lowongan::where("status", $postLowongan->lowongan_id)->first();

        return view(
            'admin.postingan.edit',
            [
                'title' => 'Postingan Loker',
                'post' => $postLowongan,
                'lowongan' => $lowongan,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PostLowongan $postLowongan)
    {
        $request->validate(
            [
                'lowongan_id' => 'required',
                'judul' => 'required',
                'post_slug' => 'required',
                'batas_waktu' => 'required',
                'deskripsi' => 'required',
                'status' => 'required',
                'gambar.*' => 'image|mimes:jpeg,png,jpg,svg,webp',
            ],
            [
                'lowongan_id.required' => 'Inputan lowongan harus diisi',
                'judul.required' => 'Inputan judul harus diisi',
                'post_slug.required' => 'Inputan post slug harus diisi',
                'batas_waktu.required' => 'Inputan batas waktu harus diisi',
                'deskripsi.required' => 'Inputan deskripsi harus diisi',
                'status.required' => 'Inputan status harus diisi',
                'gambar.image' => 'File gambar harus diisi dengan file jpeg, png, jpg, svg, webp',
            ]
        );

        $input = $request->all();

        if ($request->hasFile("gambar")) {
            File::delete('media/' . $postLowongan->gambar);

            $image = $request->file("gambar");
            $destinationPath = "media/";
            $profileImage = date("YmdHis") . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input["gambar"] = "$profileImage";
        } else {
            unset($input["gambar"]);
        }

        $postLowongan->update($input);

        Alert::success('Data Postingan', 'Berhasil Diubah!');
        return redirect('/admin/post-lowongan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostLowongan $postLowongan)
    {
        $lowongan = Lowongan::where("id", $postLowongan->lowongan_id)->first();
        if ($lowongan) {
            $lowongan->status = "1";
            $lowongan->save();
        }

        File::delete('media/' . $postLowongan->gambar);

        $postLowongan->delete();

        Alert::success('Data Postingan', 'Berhasil Dihapus!');
        return redirect('/admin/post-lowongan');
    }
}
