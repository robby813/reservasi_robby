<?php

namespace App\Http\Controllers;

use App\Models\PaketWisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaketWisataController extends Controller
{
    public function index()
    {
        $pakets = PaketWisata::all();
        return view('paket_wisata.index', compact('pakets'));
    }

    public function create()
    {
        return view('paket_wisata.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required',
            'deskripsi' => 'required',
            'fasilitas' => 'required',
            'harga_per_pack' => 'required|integer',
            'foto1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $paket = new PaketWisata();
        $paket->nama_paket = $request->nama_paket;
        $paket->deskripsi = $request->deskripsi;
        $paket->fasilitas = $request->fasilitas;
        $paket->harga_per_pack = $request->harga_per_pack;

        // Upload photos if present
        if ($request->hasFile('foto1')) {
            $paket->foto1 = $request->foto1->store('images', 'public');
        }
        if ($request->hasFile('foto2')) {
            $paket->foto2 = $request->foto2->store('images', 'public');
        }
        if ($request->hasFile('foto3')) {
            $paket->foto3 = $request->foto3->store('images', 'public');
        }
        if ($request->hasFile('foto4')) {
            $paket->foto4 = $request->foto4->store('images', 'public');
        }

        $paket->save();

        return redirect()->route('paket_wisata.index')->with('success', 'Paket Wisata berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $paket = PaketWisata::findOrFail($id);
        return view('paket_wisata.edit', compact('paket'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_paket' => 'required',
            'deskripsi' => 'required',
            'fasilitas' => 'required',
            'harga_per_pack' => 'required|integer',
            'foto1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $paket = PaketWisata::findOrFail($id);
        $paket->nama_paket = $request->nama_paket;
        $paket->deskripsi = $request->deskripsi;
        $paket->fasilitas = $request->fasilitas;
        $paket->harga_per_pack = $request->harga_per_pack;

        // Upload photos if present
        if ($request->hasFile('foto1')) {
            Storage::delete('public/' . $paket->foto1);
            $paket->foto1 = $request->foto1->store('images', 'public');
        }
        if ($request->hasFile('foto2')) {
            Storage::delete('public/' . $paket->foto2);
            $paket->foto2 = $request->foto2->store('images', 'public');
        }
        if ($request->hasFile('foto3')) {
            Storage::delete('public/' . $paket->foto3);
            $paket->foto3 = $request->foto3->store('images', 'public');
        }
        if ($request->hasFile('foto4')) {
            Storage::delete('public/' . $paket->foto4);
            $paket->foto4 = $request->foto4->store('images', 'public');
        }

        $paket->save();

        return redirect()->route('paket_wisata.index')->with('success', 'Paket Wisata berhasil diupdate.');
    }

    public function destroy($id)
    {
        $paket = PaketWisata::findOrFail($id);

        // Delete images if they exist
        Storage::delete('public/' . $paket->foto1);
        Storage::delete('public/' . $paket->foto2);
        Storage::delete('public/' . $paket->foto3);
        Storage::delete('public/' . $paket->foto4);

        $paket->delete();

        return redirect()->route('paket_wisata.index')->with('success', 'Paket Wisata berhasil dihapus.');
    }
}
