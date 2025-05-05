<?php

namespace App\Http\Controllers;

use App\Models\KategoriBerita;
use Illuminate\Http\Request;

class KategoriBeritaController extends Controller
{
    public function index()
    {
        $kategoriBerita = KategoriBerita::all();
        return view('kategori_berita.index', compact('kategoriBerita'));
    }

    public function create()
    {
        return view('kategori_berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_berita' => 'required|string|max:255',
        ]);

        KategoriBerita::create($request->all());

        return redirect()->route('kategori_berita.index')->with('success', 'Kategori Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kategoriBerita = KategoriBerita::findOrFail($id);
        return view('kategori_berita.edit', compact('kategoriBerita'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_berita' => 'required|string|max:255',
        ]);

        $kategoriBerita = KategoriBerita::findOrFail($id);
        $kategoriBerita->update($request->all());

        return redirect()->route('kategori_berita.index')->with('success', 'Kategori Berita berhasil diupdate.');
    }

    public function destroy($id)
    {
        $kategoriBerita = KategoriBerita::findOrFail($id);
        $kategoriBerita->delete();

        return redirect()->route('kategori_berita.index')->with('success', 'Kategori Berita berhasil dihapus.');
    }
}
