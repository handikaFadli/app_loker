<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;

class KontakController extends Controller
{
    public function index()
    {
        if (!Gate::allows('admin')) {
            abort(404, 'NOT FOUND');
        }

        $perusahaan = Perusahaan::first();
        $perusahaan->misi = json_decode($perusahaan->misi, true) ?? [];
        $perusahaan->tujuan = json_decode($perusahaan->tujuan, true) ?? [];

        return view(
            'admin.kontak.index',
            [
                'title' => 'Kontak',
                'data' => $perusahaan,
            ]
        );
    }

    public function edit($id)
    {
        if (!Gate::allows('admin')) {
            abort(404, 'NOT FOUND');
        }

        $perusahaan = Perusahaan::where('id', $id)->first();

        $perusahaan->misi = json_decode($perusahaan->misi, true) ?? [];
        $perusahaan->tujuan = json_decode($perusahaan->tujuan, true) ?? [];

        return view(
            'admin.kontak.edit',
            [
                'title' => 'Kontak',
                'perusahaan' => $perusahaan
            ]
        );
    }

    public function update(Request $request, $id)
    {
        if (!Gate::allows('admin')) {
            abort(404, 'NOT FOUND');
        }

        $perusahaan = Perusahaan::where('id', $id)->first();

        $request->validate(
            [
                'telepon' => 'required',
                'email' => 'required',
                'linkedin' => 'required',
                'instagram' => 'required',
                'website' => 'required',
            ],
            [
                'telepon.required' => 'Inputan telepon perusahaan harus diisi',
                'telepon.required' => 'Inputan telepon harus diisi',
                'linkedin.required' => 'Inputan linkedin harus diisi',
                'instagram.required' => 'Inputan instagram harus diisi',
                'website.required' => 'Inputan website harus diisi',
            ]
        );

        $input = $request->all();

        $perusahaan->update($input);

        Alert::success('Data kontak', 'Berhasil Diubah!');
        return redirect('/admin/kontak');
    }
}
