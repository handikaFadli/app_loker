<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Perusahaan::class);

        $title_alert = 'Hapus Data Perusahaan';
        $text_alert = "Apakah anda yakin menghapus data ini?";
        confirmDelete($title_alert, $text_alert);

        $perusahaan = Perusahaan::first();
        $perusahaan->misi = json_decode($perusahaan->misi, true) ?? [];
        $perusahaan->tujuan = json_decode($perusahaan->tujuan, true) ?? [];

        return view(
            'admin.perusahaan.index',
            [
                'title' => 'Perusahaan',
                'data' => $perusahaan,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('viewAny', Perusahaan::class);

        $data = Perusahaan::all();

        if (!isset($data)) {
            return view(
                'admin.perusahaan.create',
                [
                    'title' => 'Perusahaan',
                ]
            );
        } else {
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Perusahaan::class);

        $data = Perusahaan::all();

        if (isset($data)) {
            return back();
        }

        $request->validate(
            [
                'nama' => 'required',
                'lokasi' => 'required',
                'logo' => 'required',
                'logo.*' => 'image|mimes:jpeg,png,jpg,svg,webp',
            ],
            [
                'nama.required' => 'Inputan nama perusahaan harus diisi',
                'lokasi.required' => 'Inputan lokasi harus diisi',
                'logo.required' => 'Inputan logo harus diisi',
                'logo.image' => 'File logo harus diisi dengan file jpeg, png, jpg, svg, webp',
            ]
        );

        $input = $request->all();

        $input['misi'] = json_encode($request->input('misi', []));
        $input['tujuan'] = json_encode($request->input('tujuan', []));

        if ($request->hasFile("logo")) {
            $image = $request->file('logo');
            $path = $image->storeAs('public/perusahaan', date('YmdHis') . '.' . $image->getClientOriginalExtension());
            $link = Storage::url($path);
            $input['logo'] = $link;
        }

        Perusahaan::create($input);

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
        Gate::authorize('update', $perusahaan);

        $perusahaan->misi = json_decode($perusahaan->misi, true) ?? [];
        $perusahaan->tujuan = json_decode($perusahaan->tujuan, true) ?? [];

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
        Gate::authorize('update', $perusahaan);

        $request->validate(
            [
                'nama' => 'required',
                'lokasi' => 'required',
                'logo.*' => 'image|mimes:jpeg,png,jpg,svg,webp',
            ],
            [
                'nama.required' => 'Inputan nama perusahaan harus diisi',
                'lokasi.required' => 'Inputan lokasi harus diisi',
                'logo.image' => 'File logo harus diisi dengan file jpeg, png, jpg, svg, webp',
            ]
        );

        $input = $request->all();

        $input['misi'] = json_encode($request->input('misi', []));
        $input['tujuan'] = json_encode($request->input('tujuan', []));

        if ($request->hasFile("logo")) {
            if ($perusahaan->logo) {
                Storage::delete('public/perusahaan/' . basename($perusahaan->logo));
            }

            $image = $request->file('logo');
            $path = $image->storeAs('public/perusahaan', date('YmdHis') . '.' . $image->getClientOriginalExtension());
            $link = Storage::url($path);
            $input['logo'] = $link;
        }

        $perusahaan->update($input);

        Alert::success('Data Perusahaan', 'Berhasil Diubah!');
        return redirect('/admin/perusahaan');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Perusahaan $perusahaan)
    // {
    //     Storage::delete('public/perusahaan/' . basename($perusahaan->logo));

    //     $perusahaan->delete();

    //     Alert::success('Data Perusahaan', 'Berhasil Dihapus!');
    //     return redirect('/admin/perusahaan');
    // }
}
