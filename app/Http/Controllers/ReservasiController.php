<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Pelanggan;
use App\Models\PaketWisata;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    /**
     * Menampilkan daftar semua reservasi.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data = Reservasi::with('pelanggan', 'paket')->get();
        return view('reservasi.index', compact('data'));
    }

    /**
     * Menampilkan form untuk menambah data reservasi.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $pelanggan = Pelanggan::all();
        $paket = PaketWisata::all();
        return view('reservasi.create', compact('pelanggan', 'paket'));
    }

    /**
     * Menyimpan data reservasi yang baru ditambahkan.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pelanggan' => 'required|exists:pelanggan,id',
            'id_paket' => 'required|exists:paket_wisata,id',
            'tgl_reservasi' => 'required|date',
            'harga' => 'required|integer',
            'jumlah_peserta' => 'required|integer',
            'diskon' => 'nullable|numeric',
            'total_bayar' => 'required|integer',
            'file_bukti_tf' => 'nullable|file|mimes:jpg,png,jpeg,pdf|max:2048',
            'status_reservasi_wisata' => 'required|in:pesan,dibayar,selesai',
        ]);

        if ($request->hasFile('file_bukti_tf')) {
            $validated['file_bukti_tf'] = $request->file('file_bukti_tf')->store('bukti_tf', 'public');
        }

        Reservasi::create($validated);
        return redirect()->route('reservasi.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit data reservasi yang sudah ada.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $data = Reservasi::findOrFail($id);
        $pelanggan = Pelanggan::all();
        $paket = PaketWisata::all();
        return view('reservasi.edit', compact('data', 'pelanggan', 'paket'));
    }

    /**
     * Menampilkan detail data reservasi tertentu.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        return view('reservasi.show', compact('reservasi'));
    }

    /**
     * Memperbarui data reservasi yang sudah ada.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $reservasi = Reservasi::findOrFail($id);
        $validated = $request->validate([
            'id_pelanggan' => 'required|exists:pelanggan,id',
            'id_paket' => 'required|exists:paket_wisata,id',
            'tgl_reservasi' => 'required|date',
            'harga' => 'required|integer',
            'jumlah_peserta' => 'required|integer',
            'diskon' => 'nullable|numeric',
            'total_bayar' => 'required|integer',
            'file_bukti_tf' => 'nullable|file|mimes:jpg,png,jpeg,pdf|max:2048',
            'status_reservasi_wisata' => 'required|in:pesan,dibayar,selesai',
        ]);

        if ($request->hasFile('file_bukti_tf')) {
            $validated['file_bukti_tf'] = $request->file('file_bukti_tf')->store('bukti_tf', 'public');
        }

        $reservasi->update($validated);
        return redirect()->route('reservasi.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Menghapus data reservasi yang ada.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        $reservasi->delete();
        return redirect()->route('reservasi.index')->with('success', 'Data berhasil dihapus.');
    }
}
