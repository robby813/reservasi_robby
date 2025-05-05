<?php

// app/Http/Controllers/BeritaController.php
namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $data = Berita::with('kategori')->get();
        return view('berita.index', compact('data'));
    }

    public function create()
    {
        $kategori = KategoriBerita::all();
        return view('berita.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'berita' => 'required',
            'tgl_post' => 'required|date',
            'id_kategori_berita' => 'required|exists:kategori_berita,id',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->foto->store('images', 'public');
        }

        Berita::create($data);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = Berita::findOrFail($id);
        $kategori = KategoriBerita::all();
        return view('berita.edit', compact('data', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'berita' => 'required',
            'tgl_post' => 'required|date',
            'id_kategori_berita' => 'required|exists:kategori_berita,id',
            'foto' => 'nullable|image|max:2048',
        ]);

        $berita = Berita::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->foto->store('images', 'public');
        }

        $berita->update($data);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Berita::destroy($id);
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}
