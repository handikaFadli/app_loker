<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;

class TentangController extends Controller
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
            'admin.tentang.index',
            [
                'title' => 'Tentang',
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
            'admin.tentang.edit',
            [
                'title' => 'Tentang',
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

        $input = $request->all();

        $input['misi'] = json_encode($request->input('misi', []));
        $input['tujuan'] = json_encode($request->input('tujuan', []));

        $perusahaan->update($input);

        Alert::success('Data tentang', 'Berhasil Diubah!');
        return redirect('/admin/tentang');
    }
}
