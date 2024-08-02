<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lamaran;
use App\Models\Pelamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfilController extends Controller
{
    public function index()
    {
        Gate::authorize('view', User::class);

        $email = Auth::user()->email;

        $pelamar = Pelamar::where('email', $email)
            ->with(['pendidikan', 'pekerjaan', 'keterampilan'])
            ->firstOrFail();

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
        Gate::authorize('view', User::class);

        $pelamar = Pelamar::where('email', Auth::user()->email)->first();

        if (!is_null($pelamar->nama) && !is_null($pelamar->tempat_lahir) && !is_null($pelamar->tanggal_lahir)) {
            return redirect('/profile/myprofile');
        } else {
            return view(
                'profile.create'
            );
        }
    }

    public function edit()
    {
        Gate::authorize('view', User::class);

        $pelamar = Pelamar::where('email', auth()->user()->email)
            ->with(['pendidikan', 'pekerjaan', 'keterampilan'])
            ->first();

        if (!$pelamar) {
            return redirect()->back();
        }

        return view('profile.edit', [
            'pelamar' => $pelamar,
        ]);
    }

    public function lamaran()
    {
        Gate::authorize('view', User::class);

        $email = Auth::user()->email;

        $pelamar = Pelamar::where('email', $email)->firstOrFail();

        $unreadCount = $this->cekNotifikasi();

        // Ambil lamarans dengan relasi lowongan dan perusahaan
        $lamaran = Lamaran::with(['lowongan.perusahaan'])
            ->where('pelamar_id', $pelamar->id)
            ->latest()->get();

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
        Gate::authorize('view', User::class);

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

    public function viewUpdatePassword()
    {
        Gate::authorize('view', User::class);

        $unreadCount = $this->cekNotifikasi();

        return view('profile.ubah-password', [
            'unreadCount' => $unreadCount,
        ]);
    }

    public function updatePassword(Request $request)
    {
        Gate::authorize('view', User::class);

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        $user = User::find(Auth::user()->id);

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Old password does not match.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        Alert::success('Password', 'Berhasil Diubah!');
        return redirect('/profile/myprofile');
    }
}
