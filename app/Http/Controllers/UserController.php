<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pelamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('admin')) {
            abort(404, 'NOT FOUND');
        }

        $title_alert = 'Hapus Data User';
        $text_alert = "Apakah anda yakin menghapus data ini?";
        confirmDelete($title_alert, $text_alert);

        return view(
            'admin.user.index',
            [
                'title' => 'User',
                'data' => User::all(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('admin')) {
            abort(404, 'NOT FOUND');
        }

        return view(
            'admin.user.create',
            [
                'title' => 'User',
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Gate::allows('admin')) {
            abort(404, 'NOT FOUND');
        }

        $request->validate(
            [
                'email' => 'required|email|unique:users,email',
                'role' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'Inputan email harus diisi',
                'email.email' => 'Inputan email harus berupa email yang valid',
                'email.unique' => 'Email sudah terdaftar',
                'role.required' => 'Inputan role harus diisi',
                'password.required' => 'Inputan password harus diisi',
            ]
        );

        $user = new User();
        $user->email = $request->email;
        $user->role = $request->role;
        if ($request->role == "pelamar") {
            $user->email_verified_at = now();

            $pelamar = new Pelamar();
            $pelamar->email = $request->email;
            $pelamar->save();
        }
        $user->password = bcrypt($request->password);
        $user->save();

        Alert::success('Data User', 'Berhasil Ditambahkan!');
        return redirect('admin/kelola-user');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        if (!Gate::allows('admin')) {
            abort(404, 'NOT FOUND');
        }

        $user = User::where('id', $id)->first();

        return view(
            'admin.user.edit',
            [
                'title' => 'User',
                'user' => $user,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (!Gate::allows('admin')) {
            abort(404, 'NOT FOUND');
        }

        $user = User::findOrFail($id);

        $request->validate([
            'email' => 'required|email',
            'role' => 'required',
        ]);

        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        Alert::success('Data User', 'Berhasil Diubah!');
        return redirect('admin/kelola-user');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (!Gate::allows('admin')) {
            abort(404, 'NOT FOUND');
        }

        $user = User::findOrFail($id);

        if ($user->role == "pelamar") {
            $pelamar = Pelamar::where('email', $user->email)->first();

            if (isset($pelamar)) {

                // Hapus riwayat pendidikan
                foreach ($pelamar->pendidikan as $pendidikan) {
                    // Hapus file transkip_nilai jika ada
                    if ($pendidikan->transkip_nilai) {
                        Storage::delete('public/transkip_nilai/' . basename($pendidikan->transkip_nilai));
                    }
                    // Hapus file ijazah jika ada
                    if ($pendidikan->ijazah) {
                        Storage::delete('public/ijazah/' . basename($pendidikan->ijazah));
                    }
                    $pendidikan->delete();
                }

                // Hapus riwayat pekerjaan
                foreach ($pelamar->pekerjaan as $pekerjaan) {
                    // Hapus file surat_keterangan jika ada
                    if ($pekerjaan->surat_keterangan) {
                        Storage::delete('public/surat_keterangan/' . basename($pekerjaan->surat_keterangan));
                    }
                    $pekerjaan->delete();
                }

                // Hapus keterampilan
                foreach ($pelamar->keterampilan as $keterampilan) {
                    // Hapus file sertifikat jika ada
                    if ($keterampilan->sertifikat) {
                        Storage::delete('public/sertifikat/' . basename($keterampilan->sertifikat));
                    }
                    $keterampilan->delete();
                }

                // Hapus foto pelamar jika ada
                if ($pelamar->foto) {
                    Storage::delete('public/profile/' . basename($pelamar->foto));
                }

                // Hapus CV pelamar jika ada
                if ($pelamar->cv) {
                    Storage::delete('public/cv/' . basename($pelamar->cv));
                }

                // Hapus data pelamar
                $pelamar->delete();
            }
        }

        $user->delete();

        Alert::success('Data User', 'Berhasil Dihapus!');
        return redirect('admin/kelola-user');
    }
}
