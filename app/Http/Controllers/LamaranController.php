<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lamaran;
use App\Models\Pelamar;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Notifications\LamaranNotification;
use Illuminate\Support\Facades\Notification;

class LamaranController extends Controller
{
    public function index()
    {
        $lamaran = Lamaran::with(['lowongan.perusahaan'])->whereNotIn('status_lamaran', ['tahap awal', 'tahap dua', 'tahap akhir'])->get();

        return view(
            'admin.lamaran.index',
            [
                'title' => 'Lamaran Pekerjaan',
                'data' => $lamaran,
            ]
        );
    }

    public function show(Lamaran $lamaran)
    {
        return view(
            'admin.lamaran.detail',
            [
                'title' => 'Lamaran Pekerjaan',
                'data' => $lamaran,
            ]
        );
    }

    public function updateStatusLamaran(Request $request, $id)
    {
        $lamaran = Lamaran::findOrFail($id);
        $pelamar = Pelamar::findOrFail($lamaran->pelamar_id);
        $user = User::where('email', $pelamar->email)->first();
        $lowongan = Lowongan::where('id', $lamaran->lowongan_id)->first();

        $header = $lowongan->judul;
        $deskripsi = $request->deskripsi;
        $link = $request->link;

        if ($request->status_lamaran == 'tahap awal') {
            $this->sendNotification($lamaran, $user, $header, $deskripsi, $link, 'tahap dua');

            Alert::success('Status Lamaran', 'Berhasil Diupdate!');
            return redirect()->back();
        } elseif ($request->status_lamaran == 'tahap dua') {
            $this->sendNotification($lamaran, $user, $header, $deskripsi, $link, 'tahap akhir');

            Alert::success('Status Lamaran', 'Berhasil Diupdate!');
            return redirect()->back();
        } elseif ($request->status_lamaran == 'tahap akhir') {
            $this->sendNotification($lamaran, $user, $header, $deskripsi, $link, 'diterima');

            Alert::success('Status Lamaran', 'Berhasil Diupdate!');
            return redirect()->back();
        }

        Alert::error('Proses gagal', 'Silahkan periksa kembali!');
        return redirect()->back();
    }

    public function tolakLamaran(Request $request, $id)
    {
        $lamaran = Lamaran::findOrFail($id);
        $pelamar = Pelamar::findOrFail($lamaran->pelamar_id);
        $user = User::where('email', $pelamar->email)->first();
        $lowongan = Lowongan::where('id', $lamaran->lowongan_id)->first();

        $header = $lowongan->judul;
        $deskripsi = $request->deskripsi;
        $link = '';

        $this->sendNotification($lamaran, $user, $header, $deskripsi, $link, 'ditolak');

        Alert::success('Status Lamaran', 'Berhasil Diupdate!');
        return redirect()->back();
    }

    public function cancelLamaran($id)
    {
        $lamaran = Lamaran::findOrFail($id);
        $users = User::whereNotIn('role', ['pelamar'])->get();
        $lowongan = Lowongan::where('id', $lamaran->lowongan_id)->first();

        $header = 'Lamaran Cancel';
        $description = 'Pelamar membatalkan lamaran pada lowongan ' . $lowongan->judul;
        $link = '/lamaran/riwayat';

        // Update status lamaran
        $lamaran->status_lamaran = 'dibatalkan';
        $lamaran->save();

        Notification::send($users, new LamaranNotification($header, $description, $link));
        return redirect()->back();
    }

    public function apply($id)
    {
        // Memeriksa apakah pengguna sudah login
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Ambil pelamar berdasarkan email pengguna yang sedang login
        $pelamar = Pelamar::where('email', Auth::user()->email)->first();

        // Cek apakah pelamar sudah mengisi data diri atau belum
        if (is_null($pelamar->nama) || is_null($pelamar->tempat_lahir) || is_null($pelamar->tanggal_lahir)) {
            Alert::error('Apply gagal', 'Silahkan lengkapi data diri anda!');
            return redirect('/profile/create');
        }

        // Cek apakah pelamar sudah melamar pada lowongan yang sama
        $existingLamaran = Lamaran::where('pelamar_id', $pelamar->id)
            ->where('lowongan_id', $id)
            ->first();

        if ($existingLamaran) {
            Alert::error('Apply gagal', 'Anda sudah melamar pada lowongan ini sebelumnya!');
            return redirect()->back();
        }

        $lamaran = new Lamaran();
        $lamaran->pelamar_id = $pelamar->id;
        $lamaran->lowongan_id = $id;
        $lamaran->save();

        // kirim notifikasi ke admin
        $users = User::whereNotIn('role', ['pelamar'])->get();
        $lowongan = Lowongan::where('id', $id)->first();

        $header = 'Lamaran Baru';
        $description = 'Terdapat lamaran baru pada lowongan ' . $lowongan->judul;
        $link = '/lamaran';
        Notification::send($users, new LamaranNotification($header, $description, $link));

        Alert::success('Lowongan', 'Berhasil Apply!');
        return redirect('/profile/myprofile');
    }

    private function sendNotification($lamaran, $user, $header, $description, $link, $newStatus)
    {
        // Update status lamaran
        $lamaran->status_lamaran = $newStatus;
        $lamaran->save();

        // Kirim notifikasi ke user
        $user->notify(new LamaranNotification($header, $description, $link));
    }

    public function tahapAwal()
    {
        $data = Lamaran::with(['lowongan.perusahaan'])->where('status_lamaran', 'tahap awal')->get();

        return view(
            'admin.lamaran.tahap-awal',
            [
                'title' => 'Lamaran Pekerjaan',
                'data' => $data,
            ]
        );
    }

    public function tahapDua()
    {
        $data = Lamaran::with(['lowongan.perusahaan'])->where('status_lamaran', 'tahap dua')->get();

        return view(
            'admin.lamaran.tahap-dua',
            [
                'title' => 'Lamaran Pekerjaan',
                'data' => $data,
            ]
        );
    }

    public function tahapAkhir()
    {
        $data = Lamaran::with(['lowongan.perusahaan'])->where('status_lamaran', 'tahap akhir')->get();

        return view(
            'admin.lamaran.tahap-akhir',
            [
                'title' => 'Lamaran Pekerjaan',
                'data' => $data,
            ]
        );
    }
}
