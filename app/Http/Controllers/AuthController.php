<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\RateLimiter;

class AuthController extends Controller
{
    public function viewRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {

        // Periksa apakah email sudah terdaftar
        $emailExists = User::where('email', $request->email)->exists();
        if ($emailExists) {
            Alert::error('Register Gagal', 'Email sudah terdaftar, gunakan email yang lain');
            return back()->withInput();
        }

        $request->validate(
            [
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ],
            [
                'email.required' => 'Inputan email harus diisi',
                'email.string' => 'Email harus berupa teks',
                'email.email' => 'Format email tidak valid',
                'email.max' => 'Email tidak boleh lebih dari 255 karakter',
                'email.unique' => 'Email sudah terdaftar, gunakan email yang lain',

                'password.required' => 'Inputan password harus diisi',
                'password.string' => 'Password harus berupa teks',
                'password.min' => 'Password harus minimal 8 karakter',
                'password.confirmed' => 'Konfirmasi password tidak sesuai',
            ]
        );

        $user = User::create([
            'email' => $request->email,
            'role' => 'pelamar',
            'password' => bcrypt($request->password),
        ]);

        event(new Registered($user));

        $pelamar = new Pelamar();
        $pelamar->email = $user->email;
        $pelamar->save();

        Auth::login($user);

        return redirect('/email/verify');
    }

    public function viewLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            return $this->authenticated(Auth::user());
        }

        Alert::error('Login Gagal', 'Username atau Password yang anda masukkan salah!');
        return back()->withInput();
    }

    protected function authenticated($user)
    {
        if ($user->role === 'pelamar') {
            return redirect()->intended('/');
        }

        return redirect()->intended('/admin/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
