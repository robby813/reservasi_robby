<?php

// app/Http/Controllers/ObyekWisataController.php
namespace App\Http\Controllers;

use App\Models\ObyekWisata;
use App\Models\KategoriWisata;
use Illuminate\Http\Request;

class ObyekWisataController extends Controller
{
    public function index()
    {
        // Mengambil semua data obyek wisata
        $obyekWisata = ObyekWisata::with('kategori')->get();

        return view('obyek_wisata.index', compact('obyekWisata'));
    }

    public function create()
{
    // Ambil semua kategori wisata
    $kategori = KategoriWisata::all();

    // Kirimkan data kategori ke view
    return view('obyek_wisata.create', compact('kategori'));
}


    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'deskripsi_wisata' => 'required|string',
            'id_kategori_wisata' => 'required|exists:kategori_wisata,id',
            'fasilitas' => 'required|string',
            'foto1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Simpan data
        $data = $request->all();

        if ($request->hasFile('foto1')) {
            $data['foto1'] = $request->foto1->store('images', 'public');
        }
        if ($request->hasFile('foto2')) {
            $data['foto2'] = $request->foto2->store('images', 'public');
        }
        if ($request->hasFile('foto3')) {
            $data['foto3'] = $request->foto3->store('images', 'public');
        }
        if ($request->hasFile('foto4')) {
            $data['foto4'] = $request->foto4->store('images', 'public');
        }

        ObyekWisata::create($data);

        return redirect()->route('obyek_wisata.index')->with('success', 'Obyek Wisata berhasil ditambahkan.');
    }

    public function edit($id)
{
    // Ambil data obyek wisata berdasarkan ID
    $data = ObyekWisata::findOrFail($id);

    // Ambil semua kategori wisata
    $kategori = KategoriWisata::all();

    // Kirim data ke view
    return view('obyek_wisata.edit', compact('data', 'kategori'));
}


    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'deskripsi_wisata' => 'required|string',
            'id_kategori_wisata' => 'required|exists:kategori_wisata,id',
            'fasilitas' => 'required|string',
            'foto1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $obyekWisata = ObyekWisata::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('foto1')) {
            $data['foto1'] = $request->foto1->store('images', 'public');
        }
        if ($request->hasFile('foto2')) {
            $data['foto2'] = $request->foto2->store('images','public');
        }
        if ($request->hasFile('foto3')) {
            $data['foto3'] = $request->foto3->store('images', 'public');
        }
        if ($request->hasFile('foto4')) {
            $data['foto4'] = $request->foto4->store('images', 'public');
        }

        $obyekWisata->update($data);

        return redirect()->route('obyek_wisata.index')->with('success', 'Obyek Wisata berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $obyekWisata = ObyekWisata::findOrFail($id);
        $obyekWisata->delete();

        return redirect()->route('obyek_wisata.index')->with('success', 'Obyek Wisata berhasil dihapus.');
    }
}
