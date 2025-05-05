<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::with('user')->get();
        return view('karyawan.index', compact('karyawan'));
    }

    public function create()
    {
        $users = User::all();
        return view('karyawan.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_karyawan' => 'required|max:50',
            'alamat' => 'required',
            'no_hp' => 'required|max:15',
            'jabatan' => 'required|in:administrasi,bendahara,pemilik',
            'id_user' => 'required|exists:users,id',
        ]);

        Karyawan::create($request->all());
        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $users = User::all();
        return view('karyawan.edit', compact('karyawan', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_karyawan' => 'required|max:50',
            'alamat' => 'required',
            'no_hp' => 'required|max:15',
            'jabatan' => 'required|in:administrasi,bendahara,pemilik',
            'id_user' => 'required|exists:users,id',
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update($request->all());
        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();
        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil dihapus.');
    }
}
