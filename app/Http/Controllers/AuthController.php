<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function show_login(){
        return view('auth.login');
    }

    public function processLogin(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Alamat email tidak boleh dikosongkan.',
            'email.email' => 'Format penulisan email tidak valid.',
            'password.required' => 'Kata sandi wajib diisi.'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); return redirect()->intended('/penduduk')->with('sukses', 'Selamat Datang Kembali di Aplikasi Simpel-K!');
        }

        return back()->withErrors([
            'login_error' => 'Kombinasi alamat email atau kata sandi Anda salah.',
        ])->onlyInput('email');
    }

    public function showRegister() {
        return view('auth.register');
    }

    public function storeRegister(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ], [
            'email.unique' => 'Alamat email ini telah terdaftar di dalam sistem.',
            'password.confirmed' => 'Konfirmasi kata sandi baru Anda tidak cocok.'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'warga'
        ]);

        return redirect()->route('login')->with('sukses', 'Proses pendaftaran berhasil! Silakan masuk.');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('sukses', 'Anda telah berhasil keluar dari sistem.');
    }

}


