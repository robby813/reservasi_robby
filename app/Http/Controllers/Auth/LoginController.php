<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }


    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials, $request->filled('remember'))) {
        // Cek apakah user ini admin (misal berdasarkan email atau field lain)
        if (Auth::user()->email === 'admin@tarvela.com') {
            return redirect('/admin');
        }

        // Kalau bukan admin, arahkan ke FE
        return redirect('/home');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ])->withInput();
}


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}



