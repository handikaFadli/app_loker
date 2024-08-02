<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Lowongan::class);

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        $lowongan = Lowongan::latest()->get();

        return view(
            'admin.lowongan.index',
            [
                'title' => 'Lowongan Pekerjaan',
                'data' => $lowongan,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Lowongan::class);

        $perusahaan = Perusahaan::first();
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
        Gate::authorize('create', Lowongan::class);

        $request->validate(
            [
                'perusahaan_id' => 'required',
                'judul' => 'required|unique:lowongan,judul',
                'slug' => 'required|unique:lowongan,slug',
                'kategori' => 'required',
                'tipe' => 'required',
                'informasi' => 'required',
                'deskripsi' => 'required',
                'batas_akhir' => 'required',
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
                'informasi.required' => 'Inputan informasi lowongan harus diisi',
                'deskripsi.required' => 'Inputan deskripsi harus diisi',
                'batas_akhir.required' => 'Inputan batas akhir harus diisi',
                'status.required' => 'Inputan status harus diisi',
                'gambar.required' => 'Inputan poster harus diisi',
                'gambar.image' => 'File poster harus diisi dengan file jpeg, png, jpg, svg, webp',
            ]
        );

        $input = $request->all();

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');

            $path = $image->storeAs('public/lowongan', date('YmdHis') . '.' . $image->getClientOriginalExtension());

            $link = Storage::url($path);

            $input['gambar'] = $link;
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
        Gate::authorize('view', $lowongan);

        return view(
            'admin.lowongan.detail',
            [
                'title' => 'Lowongan Pekerjaan',
                'data' => $lowongan,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lowongan $lowongan)
    {
        Gate::authorize('update', $lowongan);

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
        Gate::authorize('update', $lowongan);

        $request->validate(
            [
                'perusahaan_id' => 'required',
                'judul' => 'required',
                'slug' => 'required',
                'informasi' => 'required',
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
                'informasi.required' => 'Inputan informasi lowongan harus diisi',
                'kategori.required' => 'Inputan kategori harus diisi',
                'tipe.required' => 'Inputan tipe harus diisi',
                'deskripsi.required' => 'Inputan deskripsi harus diisi',
                'status.required' => 'Inputan status harus diisi',
                'gambar.image' => 'File poster harus diisi dengan file jpeg, png, jpg, svg, webp',
            ]
        );

        $input = $request->all();

        if ($request->hasFile('gambar')) {
            if ($lowongan->gambar) {
                Storage::delete('public/profile/' . basename($lowongan->gambar));
            }
            $image = $request->file('gambar');

            $path = $image->storeAs('public/lowongan', date('YmdHis') . '.' . $image->getClientOriginalExtension());

            $link = Storage::url($path);

            $input['gambar'] = $link;
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
        Gate::authorize('delete', $lowongan);

        Storage::delete('public/profile/' . basename($lowongan->gambar));

        $lowongan->delete();

        Alert::success('Data Lowongan', 'Berhasil Dihapus!');
        return redirect('/admin/lowongan');
    }
}
