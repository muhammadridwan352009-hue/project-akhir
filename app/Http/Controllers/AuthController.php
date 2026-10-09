<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Form Login Siswa
    public function showLoginSiswa()
    {
        return view('auth.login-siswa');
    }

    // Form Login Petugas
    public function showLoginPetugas()
    {
        return view('auth.login-petugas');
    }

    // Proses Authentication Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'petugas') {
                return redirect()->intended('/petugas/dashboard');
            }

            return redirect()->intended('/siswa/beranda');
        }

        return back()->withErrors([
            'email' => 'Email atau kata sandi yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    // Proses Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}