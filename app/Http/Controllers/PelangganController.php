<?php

// app/Http/Controllers/PelangganController.php
namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::with('user')->latest()->get();
        return view('pelanggan.index', compact('pelanggan'));
    }

    public function create()
    {
        $users = User::all();
        return view('pelanggan.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|max:255',
            'no_hp' => 'required|max:15',
            'alamat' => 'required',
            'id_user' => 'required|exists:users,id',
        ]);

        Pelanggan::create($request->all());
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan!');
    }

    public function edit(Pelanggan $pelanggan)
    {
        $users = User::all();
        return view('pelanggan.edit', compact('pelanggan', 'users'));
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $request->validate([
            'nama_lengkap' => 'required|max:255',
            'no_hp' => 'required|max:15',
            'alamat' => 'required',
            'id_user' => 'required|exists:users,id',
        ]);

        $pelanggan->update($request->all());
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diupdate!');
    }

    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus!');
    }
}
