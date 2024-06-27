<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use App\Models\Pelamar;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProfilController extends Controller
{
    public function index()
    {
        $email = Auth::user()->email;

        $pelamar = Pelamar::where('email', $email)->firstOrFail();

        $unreadCount = $this->cekNotifikasi();

        return view(
            'profile.my-profile',
            [
                'user' => $pelamar,
                'unreadCount' => $unreadCount,

            ]
        );
    }

    public function create()
    {
        return view(
            'profile.create'
        );
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_depan' => 'required',
                'nama_belakang' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'tempat_tinggal' => 'required',
                'jenis_kelamin' => 'required',
                'status' => 'required',
                'foto' => 'required',
                'foto.*' => 'image|mimes:jpeg,png,jpg,svg,webp',
                'nomor_telepon' => 'required',
                'email' => 'required',
                'cv' => 'file|mimes:pdf',
            ],
            [
                'nama_depan.required' => 'Inputan nama depan harus diisi',
                'nama_belakang.required' => 'Inputan nama belakang harus diisi',
                'tempat_lahir.required' => 'Inputan tempat lahir harus diisi',
                'tanggal_lahir.required' => 'Inputan tanggal lahir harus diisi',
                'tempat_tinggal.required' => 'Inputan tempat tinggal harus diisi',
                'jenis_kelamin.required' => 'Inputan jenis kelamin harus diisi',
                'status.required' => 'Inputan status harus diisi',
                'foto.required' => 'Inputan foto harus diisi',
                'foto.image' => 'File foto harus berupa gambar dengan format jpeg, png, jpg, svg, atau webp',
                'foto.mimes' => 'File foto harus berupa gambar dengan format jpeg, png, jpg, svg, atau webp',
                'nomor_telepon.required' => 'Inputan nomor telepon harus diisi',
                'email.required' => 'Inputan email harus diisi',
                'cv.mimes' => 'File CV harus berupa file dengan format PDF',
            ]
        );

        $input = $request->all();

        // menggabungkan nama depan dan nama belakang
        $input['nama'] = $input['nama_depan'] . ' ' . $input['nama_belakang'];

        // Menghitung umur dari tanggal lahir
        $input['umur'] = Carbon::parse($input['tanggal_lahir'])->age;

        if ($request->hasFile("foto")) {
            $image = $request->file("foto");
            $destinationPath = "media/";
            $profileImage = date("YmdHis") . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input["foto"] = "$profileImage";
        }

        if ($request->hasFile('cv')) {
            $cvFile = $request->file('cv');
            $cvPath = 'media/documents_cv/';
            $cvFileName = date('YmdHis') . '_cv.' . $cvFile->getClientOriginalExtension();
            $cvFile->move($cvPath, $cvFileName);
            $input['cv'] = $cvFileName;
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
                    $transkipFile = $request->file("pendidikan.$index.transkip_nilai");
                    $transkipPath = 'media/documents_cv/';
                    $transkipFileName = date('YmdHis') . "_transkip_$index." . $transkipFile->getClientOriginalExtension();
                    $transkipFile->move($transkipPath, $transkipFileName);
                    $pendidikan['transkip_nilai'] = $transkipFileName;
                }
                if ($request->hasFile("pendidikan.$index.ijazah")) {
                    $ijazahFile = $request->file("pendidikan.$index.ijazah");
                    $ijazahPath = 'media/documents_cv/';
                    $ijazahFileName = date('YmdHis') . "_ijazah_$index." . $ijazahFile->getClientOriginalExtension();
                    $ijazahFile->move($ijazahPath, $ijazahFileName);
                    $pendidikan['ijazah'] = $ijazahFileName;
                }
                $pendidikan['pelamar_id'] = $pelamar->id;
                Pendidikan::create($pendidikan);
            }
        }

        Alert::success('Data Profile', 'Berhasil Ditambahkan!');
        return redirect('/');
    }

    public function lamaran()
    {
        $email = Auth::user()->email;

        $pelamar = Pelamar::where('email', $email)->firstOrFail();

        $unreadCount = $this->cekNotifikasi();

        // Ambil lamarans dengan relasi lowongan dan perusahaan
        $lamaran = Lamaran::with(['lowongan.perusahaan'])
            ->where('pelamar_id', $pelamar->id)
            ->get();

        return view(
            'profile.kelola-lamaran',
            [
                'lamaran' => $lamaran,
                'unreadCount' => $unreadCount,
            ]
        );
    }

    public function notifikasi()
    {
        $notifications = Auth::user()->notifications;
        $unreadCount = $this->cekNotifikasi();

        return view('profile.notifikasi', [
            'notifications' => $notifications,
            'unreadCount' => $unreadCount,
        ]);
    }

    private function cekNotifikasi()
    {
        $user = Auth::user();
        $unreadCount = $user->unreadNotifications->count();

        return $unreadCount;
    }
}
