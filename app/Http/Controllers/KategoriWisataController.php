<?php

// app/Http/Controllers/KategoriWisataController.php
namespace App\Http\Controllers;

use App\Models\KategoriWisata;
use Illuminate\Http\Request;

class KategoriWisataController extends Controller
{
    public function index()
    {
        $kategoriWisata = KategoriWisata::all();
        return view('kategori_wisata.index', compact('kategoriWisata'));
    }

    public function create()
    {
        return view('kategori_wisata.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_wisata' => 'required|string|max:255',
        ]);

        KategoriWisata::create([
            'kategori_wisata' => $request->input('kategori_wisata'),
        ]);

        return redirect()->route('kategori_wisata.index')->with('success', 'Kategori Wisata berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kategoriWisata = KategoriWisata::findOrFail($id);
        return view('kategori_wisata.edit', compact('kategoriWisata'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_wisata' => 'required|string|max:255',
        ]);

        $kategoriWisata = KategoriWisata::findOrFail($id);
        $kategoriWisata->update([
            'kategori_wisata' => $request->input('kategori_wisata'),
        ]);

        return redirect()->route('kategori_wisata.index')->with('success', 'Kategori Wisata berhasil diupdate.');
    }

    public function destroy($id)
    {
        $kategoriWisata = KategoriWisata::findOrFail($id);
        $kategoriWisata->delete();

        return redirect()->route('kategori_wisata.index')->with('success', 'Kategori Wisata berhasil dihapus.');
    }
}
