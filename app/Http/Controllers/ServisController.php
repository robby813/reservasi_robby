<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $berita = \App\Models\Berita::all();
        return view('servis.index', [
            'title' => 'SERVIS trvela',
            'berita' => $berita,
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
    $berita = \App\Models\Berita::with('kategori')->findOrFail($id);
    return view('servis.show', compact('berita'));
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
