<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Halaman Home guest (/)
    public function home()
    {
        return view('Guest.home');
    }

    // Halaman form Login (/auth)
    public function showLogin()
    {
        return view('Guest.auth');
    }

    // Proses Login: username & password sama => admin ke Dashboard Admin, lainnya ke Guest; salah => kembali dengan alert
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($request->username === $request->password) {
            // username "admin" => Dashboard Admin, username lain => halaman Guest
            if ($request->username === 'admin') {
                return redirect()->route('dashboard');
            }

            return redirect()->route('guest.dashboard');
        }

        return redirect('/auth')
            ->withInput($request->only('username'))
            ->with('error', 'Login gagal! Username dan password tidak sesuai.');
    }

    // Halaman form Register (/register)
    public function showRegister()
    {
        return view('Guest.register');
    }

    // Proses Register sederhana (validasi saja, tanpa database)
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email',
            'password' => 'required|min:4|confirmed',
        ]);

        return redirect('/auth')->with('success', 'Registrasi berhasil, silakan login.');
    }
}
