<?php

// app/Http/Controllers/PenginapanController.php
namespace App\Http\Controllers;

use App\Models\Penginapan;
use Illuminate\Http\Request;

class PenginapanController extends Controller
{
    public function index()
    {
        // Ambil semua data penginapan
        $penginapan = Penginapan::all();

        // Kirimkan variabel $penginapan ke view
        return view('penginapan.index', compact('penginapan'));
    }

    public function create()
    {
        // Tampilkan form untuk menambah penginapan
        return view('penginapan.create');
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nama_penginapan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'fasilitas' => 'required|string',
            'foto1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Proses upload foto
        $data = $request->all();
        if ($request->hasFile('foto1')) {
            $data['foto1'] = $request->file('foto1')->store('images', 'public');
        }
        if ($request->hasFile('foto2')) {
            $data['foto2'] = $request->file('foto2')->store('images', 'public');
        }
        if ($request->hasFile('foto3')) {
            $data['foto3'] = $request->file('foto3')->store('images', 'public');
        }
        if ($request->hasFile('foto4')) {
            $data['foto4'] = $request->file('foto4')->store('images', 'public');
        }
        if ($request->hasFile('foto5')) {
            $data['foto5'] = $request->file('foto5')->store('images', 'public');
        }

        // Simpan data penginapan ke database
        Penginapan::create($data);

        // Redirect dengan pesan sukses
        return redirect()->route('penginapan.index')->with('success', 'Penginapan berhasil ditambahkan.');
    }

    // app/Http/Controllers/PenginapanController.php

public function edit($id)
{
    $data = Penginapan::findOrFail($id); // Mengambil data penginapan berdasarkan ID
    return view('penginapan.edit', compact('data')); // Mengirimkan data ke view
}

public function show($id)
{
    $penginapan = Penginapan::findOrFail($id);
    return view('packages.show', compact('penginapan'));
}



    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'nama_penginapan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'fasilitas' => 'required|string',
            'foto1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Ambil data penginapan berdasarkan ID
        $penginapan = Penginapan::findOrFail($id);

        // Proses upload foto
        $data = $request->all();
        if ($request->hasFile('foto1')) {
            $data['foto1'] = $request->foto1->store('images', 'public');
        }
        if ($request->hasFile('foto2')) {
            $data['foto2'] = $request->file('foto2')->store('images', 'public');
        }
        if ($request->hasFile('foto3')) {
            $data['foto3'] = $request->file('foto3')->store('iamges', 'public');
        }
        if ($request->hasFile('foto4')) {
            $data['foto4'] = $request->file('foto4')->store('images', 'public');
        }
        if ($request->hasFile('foto5')) {
            $data['foto5'] = $request->file('foto5')->store('images', 'public');
        }

        // Update data penginapan
        $penginapan->update($data);

        // Redirect dengan pesan sukses
        return redirect()->route('penginapan.index')->with('success', 'Penginapan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus data penginapan berdasarkan ID
        $penginapan = Penginapan::findOrFail($id);
        $penginapan->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('penginapan.index')->with('success', 'Penginapan berhasil dihapus.');
    }
}
