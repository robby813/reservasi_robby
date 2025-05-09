<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservasi;
use Illuminate\Http\Request;


class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
{
    $user = auth('web')->user(); // akan null jika belum login

    if (!$user) {
        $reservasi = collect(); // kosongkan jika tidak login
    } else {
        $pelanggan = $user->pelanggan;
        $reservasi = $pelanggan ? $pelanggan->reservasi : collect();
    }

    return view('about.index', [
        'title' => 'ABOUT travel',
        'reservasi' => $reservasi,
    ]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reservasi = \App\Models\Reservasi::findOrFail($id);
        return view('about.show', compact('reservasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
