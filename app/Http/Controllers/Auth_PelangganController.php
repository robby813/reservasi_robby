<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Auth_PelangganController extends Controller
{
    // Tampilkan form login
    public function index()
    {
        return view('auth_pelanggan.login', [
            'title' => 'Login Pelanggan',
        ]);
    }

    // Proses login
    public function login_proses(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember') ? true : false;

        if (Auth::attempt($credentials, $remember)) {
           $user = Auth::user();

           if ($user->aktif == 0) {
               Auth::logout();
               return redirect()->route('pelanggan.login')->with('error', 'Akun Anda belum aktif.');
           }

           if ($user->level == 'admin' || $user->level == 'bendahara' || $user->level == 'pemilik') {
               Auth::logout();
               return redirect()->route('login')->with('error', 'Login  tidak berhasil.');
           }

           if (is_null(Auth::user()->email_verified_at)) {
                Auth::logout();
                return redirect()->route('verifikasi.notice')->with('error', 'Akun Anda belum terverifikasi.');
            }

            if ($user->level == 'pelanggan') {
                return redirect()->route('home.index')->with('pesan', 'Login berhasil' .
                $user->pelanggan->nama_lengkap);
            }

        } else {
            return redirect()->route('pelanggan.login')->with('error', 'Email atau password salah.');
        }
    }
    // Logout


    public function logout(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user(); // Pastikan ini memanggil method, bukan properti

            if ($user instanceof \Illuminate\Foundation\Auth\User || $user instanceof \Illuminate\Database\Eloquent\Model) {
                $user->setRememberToken(null);
                $user->save();
            }
        }

        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout berhasil.');
    }


}
