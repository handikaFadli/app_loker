<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\Keterampilan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PelamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Pelamar::class);

        $title_alert = 'Hapus Data Pelamar';
        $text_alert = "Apakah anda yakin menghapus data ini?";
        confirmDelete($title_alert, $text_alert);

        return view(
            'admin.pelamar.index',
            [
                'title' => 'Pelamar',
                'data' => Pelamar::all(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Pelamar::class);

        // cek apakah sudah mengisi data diri
        $pelamar = Pelamar::where('email', Auth::user()->email)->first();

        if (!is_null($pelamar->nama) && !is_null($pelamar->tempat_lahir) && !is_null($pelamar->tanggal_lahir)) {
            return redirect('/profile/myprofile');
        }

        $request->validate(
            [
                'nama' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'tempat_tinggal' => 'required',
                'jenis_kelamin' => 'required',
                'status' => 'required',
                'foto' => 'required',
                'foto.*' => 'image|mimes:jpeg,png,jpg,svg,webp',
                'nomor_telepon' => 'required|numeric',
                'email' => 'required',
                'cv' => 'required',
                'cv' => 'file|mimes:pdf',
            ],
            [
                'nama.required' => 'Inputan nama harus diisi',
                'tempat_lahir.required' => 'Inputan tempat lahir harus diisi',
                'tanggal_lahir.required' => 'Inputan tanggal lahir harus diisi',
                'tempat_tinggal.required' => 'Inputan tempat tinggal harus diisi',
                'jenis_kelamin.required' => 'Inputan jenis kelamin harus diisi',
                'status.required' => 'Inputan status harus diisi',
                'foto.required' => 'Inputan foto harus diisi',
                'foto.image' => 'File foto harus berupa gambar dengan format jpeg, png, jpg, svg, atau webp',
                'foto.mimes' => 'File foto harus berupa gambar dengan format jpeg, png, jpg, svg, atau webp',
                'nomor_telepon.required' => 'Inputan nomor telepon harus diisi',
                'nomor_telepon.numeric' => 'Inputan nomor harus berupa number',
                'email.required' => 'Inputan email harus diisi',
                'cv.required' => 'Inputan cv harus diisi',
                'cv.mimes' => 'File CV harus berupa file dengan format PDF',
            ]
        );

        $input = $request->all();

        if ($request->hasFile("foto")) {
            $image = $request->file('foto');
            $path = $image->storeAs('public/profile', date('YmdHis') . '.' . $image->getClientOriginalExtension());
            $link = Storage::url($path);
            $input['foto'] = $link;
        }

        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $path = $cv->storeAs('public/cv', date('YmdHis') . '_cv.' . $cv->getClientOriginalExtension());
            $link = Storage::url($path);
            $input['cv'] = $link;
        }

        // Menyimpan data pelamar
        $pelamar = Pelamar::where('email', $input['email'])->first();

        if ($pelamar) {
            $pelamar->update($input);
        } else {
            Pelamar::create($input);
        }

        // Menyimpan data pendidikan
        if (isset($input['pendidikan'])) {
            foreach ($input['pendidikan'] as $index => $pendidikan) {
                if ($request->hasFile("pendidikan.$index.transkip_nilai")) {
                    $transkip = $request->file("pendidikan.$index.transkip_nilai");
                    $path = $transkip->storeAs('public/transkip_nilai', date('YmdHis') . "_transkip_$index." . $transkip->getClientOriginalExtension());
                    $link = Storage::url($path);
                    $input['transkip_nilai'] = $link;
                }
                if ($request->hasFile("pendidikan.$index.ijazah")) {
                    $ijazah = $request->file("pendidikan.$index.ijazah");
                    $path = $ijazah->storeAs('public/ijazah', date('YmdHis') . "_ijazah_$index." . $ijazah->getClientOriginalExtension());
                    $link = Storage::url($path);
                    $input['ijazah'] = $link;
                }
                $pendidikan['pelamar_id'] = $pelamar->id;
                Pendidikan::create($pendidikan);
            }
        }

        // Menyimpan data pekerjaan
        if (isset($input['pekerjaan'])) {
            foreach ($input['pekerjaan'] as $index => $pekerjaan) {
                if ($request->hasFile("pekerjaan.$index.surat_keterangan")) {
                    $surat_keterangan = $request->file("pekerjaan.$index.surat_keterangan");
                    $path = $surat_keterangan->storeAs('public/surat_keterangan', date('YmdHis') . "_surat_keterangan_$index." . $surat_keterangan->getClientOriginalExtension());
                    $link = Storage::url($path);
                    $input['surat_keterangan'] = $link;
                }
                $pekerjaan['pelamar_id'] = $pelamar->id;
                Pekerjaan::create($pekerjaan);
            }
        }

        // Menyimpan data keterampilan
        if (isset($input['keterampilan'])) {
            foreach ($input['keterampilan'] as $index => $keterampilan) {
                if ($request->hasFile("keterampilan.$index.sertifikat")) {
                    $sertifikat = $request->file("keterampilan.$index.sertifikat");
                    $path = $sertifikat->storeAs('public/sertifikat', date('YmdHis') . "_sertifikat_$index." . $sertifikat->getClientOriginalExtension());
                    $link = Storage::url($path);
                    $input['sertifikat'] = $link;
                }
                $keterampilan['pelamar_id'] = $pelamar->id;
                Keterampilan::create($keterampilan);
            }
        }

        Alert::success('Data Profile', 'Berhasil Ditambahkan!');
        return redirect('/profile/myprofile');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pelamar = Pelamar::with(['pendidikan', 'pekerjaan', 'keterampilan'])->findOrFail($id);

        Gate::authorize('view', $pelamar);

        return view(
            'admin.pelamar.detail',
            [
                'title' => 'Pelamar',
                'data' => $pelamar,
            ]
        );
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pelamar = Pelamar::with(['pendidikan', 'pekerjaan', 'keterampilan'])->findOrFail($id);

        Gate::authorize('update', $pelamar);

        return view(
            'admin.pelamar.edit',
            [
                'title' => 'Pelamar',
                'pelamar' => $pelamar,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function profileUpdate(Request $request)
    {
        $pelamar = Pelamar::where('email', $request->email)->first();

        Gate::authorize('updateProfile', $pelamar);

        if (!$pelamar) {
            return abort(403, 'Unauthorized action.');
        }

        $request->validate(
            [
                'nama' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'tempat_tinggal' => 'required',
                'jenis_kelamin' => 'required',
                'status' => 'required',
                'foto.*' => 'image|mimes:jpeg,png,jpg,svg,webp',
                'nomor_telepon' => 'required|numeric',
                'email' => 'required',
                'cv' => 'file|mimes:pdf',
            ],
            [
                'nama.required' => 'Inputan nama harus diisi',
                'tempat_lahir.required' => 'Inputan tempat lahir harus diisi',
                'tanggal_lahir.required' => 'Inputan tanggal lahir harus diisi',
                'tempat_tinggal.required' => 'Inputan tempat tinggal harus diisi',
                'jenis_kelamin.required' => 'Inputan jenis kelamin harus diisi',
                'status.required' => 'Inputan status harus diisi',
                'foto.image' => 'File foto harus berupa gambar dengan format jpeg, png, jpg, svg, atau webp',
                'foto.mimes' => 'File foto harus berupa gambar dengan format jpeg, png, jpg, svg, atau webp',
                'nomor_telepon.required' => 'Inputan nomor telepon harus diisi',
                'nomor_telepon.numeric' => 'Inputan nomor harus berupa number',
                'email.required' => 'Inputan email harus diisi',
                'cv.mimes' => 'File CV harus berupa file dengan format PDF',
            ]
        );

        $input = $request->all();

        if ($request->hasFile('foto')) {
            if ($pelamar->foto) {
                Storage::delete('public/profile/' . basename($pelamar->foto));
            }

            $image = $request->file('foto');
            $path = $image->storeAs('public/profile', date('YmdHis') . '.' . $image->getClientOriginalExtension());
            $link = Storage::url($path);
            $input['foto'] = $link;
        }

        if ($request->hasFile('cv')) {
            if ($pelamar->cv) {
                Storage::delete('public/cv/' . basename($pelamar->cv));
            }

            $cv = $request->file('cv');
            $path = $cv->storeAs('public/cv', date('YmdHis') . '_cv.' . $cv->getClientOriginalExtension());
            $link = Storage::url($path);
            $input['cv'] = $link;
        }

        $pelamar->update($input);

        // Menyimpan data pendidikan
        if (isset($input['pendidikan'])) {
            $pendidikanIds = [];
            foreach ($input['pendidikan'] as $index => $pendidikanData) {
                if (isset($pendidikanData['id'])) {
                    $pendidikan = Pendidikan::find($pendidikanData['id']);
                } else {
                    $pendidikan = new Pendidikan;
                    $pendidikan->pelamar_id = $pelamar->id;
                }

                $pendidikan->fill($pendidikanData);

                if ($request->hasFile("pendidikan.$index.transkip_nilai")) {
                    if ($pendidikan->transkip_nilai) {
                        Storage::delete('public/transkip_nilai/' . basename($pendidikan->transkip_nilai));
                    }

                    $transkip = $request->file("pendidikan.$index.transkip_nilai");
                    $path = $transkip->storeAs('public/transkip_nilai', date('YmdHis') . "_transkip_$index." . $transkip->getClientOriginalExtension());
                    $link = Storage::url($path);
                    $pendidikan->transkip_nilai = $link;
                }

                if ($request->hasFile("pendidikan.$index.ijazah")) {
                    if ($pendidikan->ijazah) {
                        Storage::delete('public/ijazah/' . basename($pendidikan->ijazah));
                    }

                    $ijazah = $request->file("pendidikan.$index.ijazah");
                    $path = $ijazah->storeAs('public/ijazah', date('YmdHis') . "_ijazah_$index." . $ijazah->getClientOriginalExtension());
                    $link = Storage::url($path);
                    $pendidikan->ijazah = $link;
                }

                $pendidikan->save();
                $pendidikanIds[] = $pendidikan->id;
            }

            Pendidikan::where('pelamar_id', $pelamar->id)->whereNotIn('id', $pendidikanIds)->delete();
        }

        // Menyimpan data pekerjaan
        if (isset($input['pekerjaan'])) {
            $pekerjaanIds = [];
            foreach ($input['pekerjaan'] as $index => $pekerjaanData) {
                if (isset($pekerjaanData['id'])) {
                    $pekerjaan = Pekerjaan::find($pekerjaanData['id']);
                } else {
                    $pekerjaan = new Pekerjaan;
                    $pekerjaan->pelamar_id = $pelamar->id;
                }

                $pekerjaan->fill($pekerjaanData);

                if ($request->hasFile("pekerjaan.$index.surat_keterangan")) {
                    if ($pekerjaan->surat_keterangan) {
                        Storage::delete('public/surat_keterangan/' . basename($pekerjaan->surat_keterangan));
                    }

                    $surat_keterangan = $request->file("pekerjaan.$index.surat_keterangan");
                    $path = $surat_keterangan->storeAs('public/surat_keterangan', date('YmdHis') . "_surat_keterangan_$index." . $surat_keterangan->getClientOriginalExtension());
                    $link = Storage::url($path);
                    $pekerjaan->surat_keterangan = $link;
                }

                $pekerjaan->save();
                $pekerjaanIds[] = $pekerjaan->id;
            }

            Pekerjaan::where('pelamar_id', $pelamar->id)->whereNotIn('id', $pekerjaanIds)->delete();
        }

        // Menyimpan data keterampilan
        if (isset($input['keterampilan'])) {
            $keterampilanIds = [];
            foreach ($input['keterampilan'] as $index => $keterampilanData) {
                if (isset($keterampilanData['id'])) {
                    $keterampilan = Keterampilan::find($keterampilanData['id']);
                } else {
                    $keterampilan = new Keterampilan;
                    $keterampilan->pelamar_id = $pelamar->id;
                }

                $keterampilan->fill($keterampilanData);

                if ($request->hasFile("keterampilan.$index.sertifikat")) {
                    if ($keterampilan->sertifikat) {
                        Storage::delete('public/sertifikat/' . basename($keterampilan->sertifikat));
                    }

                    $sertifikat = $request->file("keterampilan.$index.sertifikat");
                    $path = $sertifikat->storeAs('public/sertifikat', date('YmdHis') . "_sertifikat_$index." . $sertifikat->getClientOriginalExtension());
                    $link = Storage::url($path);
                    $keterampilan->sertifikat = $link;
                }

                $keterampilan->save();
                $keterampilanIds[] = $keterampilan->id;
            }

            Keterampilan::where('pelamar_id', $pelamar->id)->whereNotIn('id', $keterampilanIds)->delete();
        }

        Alert::success('Data Profile', 'Berhasil Diubah!');
        return redirect('/profile/myprofile');
    }


    public function update(Request $request, $id)
    {
        $pelamar = Pelamar::where('id', $id)->first();

        Gate::authorize('update', $pelamar);

        $request->validate(
            [
                'nama' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'tempat_tinggal' => 'required',
                'jenis_kelamin' => 'required',
                'status' => 'required',
                'foto.*' => 'image|mimes:jpeg,png,jpg,svg,webp',
                'nomor_telepon' => 'required|numeric',
                'cv' => 'file|mimes:pdf',
            ],
            [
                'nama.required' => 'Inputan nama harus diisi',
                'tempat_lahir.required' => 'Inputan tempat lahir harus diisi',
                'tanggal_lahir.required' => 'Inputan tanggal lahir harus diisi',
                'tempat_tinggal.required' => 'Inputan tempat tinggal harus diisi',
                'jenis_kelamin.required' => 'Inputan jenis kelamin harus diisi',
                'status.required' => 'Inputan status harus diisi',
                'foto.image' => 'File foto harus berupa gambar dengan format jpeg, png, jpg, svg, atau webp',
                'foto.mimes' => 'File foto harus berupa gambar dengan format jpeg, png, jpg, svg, atau webp',
                'nomor_telepon.required' => 'Inputan nomor telepon harus diisi',
                'nomor_telepon.numeric' => 'Inputan nomor harus berupa number',
                'cv.mimes' => 'File CV harus berupa file dengan format PDF',
            ]
        );

        $input = $request->all();

        if ($request->hasFile('foto')) {
            if ($pelamar->foto) {
                Storage::delete('public/profile/' . basename($pelamar->foto));
            }

            $image = $request->file('foto');
            $path = $image->storeAs('public/profile', date('YmdHis') . '.' . $image->getClientOriginalExtension());
            $link = Storage::url($path);
            $input['foto'] = $link;
        }

        if ($request->hasFile('cv')) {
            if ($pelamar->cv) {
                Storage::delete('public/cv/' . basename($pelamar->cv));
            }

            $cv = $request->file('cv');
            $path = $cv->storeAs('public/cv', date('YmdHis') . '_cv.' . $cv->getClientOriginalExtension());
            $link = Storage::url($path);
            $input['cv'] = $link;
        }

        $pelamar->update($input);

        // Menyimpan data pendidikan
        if (isset($input['pendidikan'])) {
            $pendidikanIds = [];
            foreach ($input['pendidikan'] as $index => $pendidikanData) {
                if (isset($pendidikanData['id'])) {
                    $pendidikan = Pendidikan::find($pendidikanData['id']);
                } else {
                    $pendidikan = new Pendidikan;
                    $pendidikan->pelamar_id = $pelamar->id;
                }

                $pendidikan->fill($pendidikanData);

                if ($request->hasFile("pendidikan.$index.transkip_nilai")) {
                    if ($pendidikan->transkip_nilai) {
                        Storage::delete('public/transkip_nilai/' . basename($pendidikan->transkip_nilai));
                    }

                    $transkip = $request->file("pendidikan.$index.transkip_nilai");
                    $path = $transkip->storeAs('public/transkip_nilai', date('YmdHis') . "_transkip_$index." . $transkip->getClientOriginalExtension());
                    $link = Storage::url($path);
                    $pendidikan->transkip_nilai = $link;
                }

                if ($request->hasFile("pendidikan.$index.ijazah")) {
                    if ($pendidikan->ijazah) {
                        Storage::delete('public/ijazah/' . basename($pendidikan->ijazah));
                    }

                    $ijazah = $request->file("pendidikan.$index.ijazah");
                    $path = $ijazah->storeAs('public/ijazah', date('YmdHis') . "_ijazah_$index." . $ijazah->getClientOriginalExtension());
                    $link = Storage::url($path);
                    $pendidikan->ijazah = $link;
                }

                $pendidikan->save();
                $pendidikanIds[] = $pendidikan->id;
            }

            Pendidikan::where('pelamar_id', $pelamar->id)->whereNotIn('id', $pendidikanIds)->delete();
        }

        // Menyimpan data pekerjaan
        if (isset($input['pekerjaan'])) {
            $pekerjaanIds = [];
            foreach ($input['pekerjaan'] as $index => $pekerjaanData) {
                if (isset($pekerjaanData['id'])) {
                    $pekerjaan = Pekerjaan::find($pekerjaanData['id']);
                } else {
                    $pekerjaan = new Pekerjaan;
                    $pekerjaan->pelamar_id = $pelamar->id;
                }

                $pekerjaan->fill($pekerjaanData);

                if ($request->hasFile("pekerjaan.$index.surat_keterangan")) {
                    if ($pekerjaan->surat_keterangan) {
                        Storage::delete('public/surat_keterangan/' . basename($pekerjaan->surat_keterangan));
                    }

                    $surat_keterangan = $request->file("pekerjaan.$index.surat_keterangan");
                    $path = $surat_keterangan->storeAs('public/surat_keterangan', date('YmdHis') . "_surat_keterangan_$index." . $surat_keterangan->getClientOriginalExtension());
                    $link = Storage::url($path);
                    $pekerjaan->surat_keterangan = $link;
                }

                $pekerjaan->save();
                $pekerjaanIds[] = $pekerjaan->id;
            }

            Pekerjaan::where('pelamar_id', $pelamar->id)->whereNotIn('id', $pekerjaanIds)->delete();
        }

        // Menyimpan data keterampilan
        if (isset($input['keterampilan'])) {
            $keterampilanIds = [];
            foreach ($input['keterampilan'] as $index => $keterampilanData) {
                if (isset($keterampilanData['id'])) {
                    $keterampilan = Keterampilan::find($keterampilanData['id']);
                } else {
                    $keterampilan = new Keterampilan;
                    $keterampilan->pelamar_id = $pelamar->id;
                }

                $keterampilan->fill($keterampilanData);

                if ($request->hasFile("keterampilan.$index.sertifikat")) {
                    if ($keterampilan->sertifikat) {
                        Storage::delete('public/sertifikat/' . basename($keterampilan->sertifikat));
                    }

                    $sertifikat = $request->file("keterampilan.$index.sertifikat");
                    $path = $sertifikat->storeAs('public/sertifikat', date('YmdHis') . "_sertifikat_$index." . $sertifikat->getClientOriginalExtension());
                    $link = Storage::url($path);
                    $keterampilan->sertifikat = $link;
                }

                $keterampilan->save();
                $keterampilanIds[] = $keterampilan->id;
            }

            Keterampilan::where('pelamar_id', $pelamar->id)->whereNotIn('id', $keterampilanIds)->delete();
        }

        Alert::success('Data Pelamar', 'Berhasil Diubah!');
        return redirect('/admin/pelamar');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pelamar = Pelamar::findOrFail($id);

        Gate::authorize('delete', $pelamar);

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

        Alert::success('Data Pelamar', 'Berhasil Dihapus!');
        return redirect('/admin/pelamar');
    }
}
