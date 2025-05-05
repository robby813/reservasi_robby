<!-- resources/views/paket_wisata/edit.blade.php -->

@extends('be.master')

@section('sidebar')
    @include('be.sidebar')
@endsection

@section('navbar')
    @include('be.navbar')
@endsection

@section('content')
<div class="container">
    <h1>Edit Paket Wisata</h1>

    <form action="{{ route('paket_wisata.update', $paket->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_paket" class="form-label">Nama Paket</label>
            <input type="text" class="form-control" id="nama_paket" name="nama_paket" value="{{ $paket->nama_paket }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ $paket->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label for="fasilitas" class="form-label">Fasilitas</label>
            <input type="text" class="form-control" id="fasilitas" name="fasilitas" value="{{ $paket->fasilitas }}" required>
        </div>

        <div class="mb-3">
            <label for="harga_per_pack" class="form-label">Harga/Hari</label>
            <input type="number" class="form-control" id="harga_per_pack" name="harga_per_pack" value="{{ $paket->harga_per_pack }}" required>
        </div>

        <div class="mb-3">
            <label for="foto1" class="form-label">Foto 1</label>
            <input type="file" class="form-control" id="foto1" name="foto1">
            @if($paket->foto1)
                <img src="{{ asset('storage/' . $paket->foto1) }}" width="100" height="100" alt="Foto 1">
            @endif
        </div>

        <div class="mb-3">
            <label for="foto2" class="form-label">Foto 2</label>
            <input type="file" class="form-control" id="foto2" name="foto2">
            @if($paket->foto2)
                <img src="{{ asset('storage/' . $paket->foto2) }}" width="100" height="100" alt="Foto 2">
            @endif
        </div>

        <div class="mb-3">
            <label for="foto3" class="form-label">Foto 3</label>
            <input type="file" class="form-control" id="foto3" name="foto3">
            @if($paket->foto3)
                <img src="{{ asset('storage/' . $paket->foto3) }}" width="100" height="100" alt="Foto 3">
            @endif
        </div>

        <div class="mb-3">
            <label for="foto4" class="form-label">Foto 4</label>
            <input type="file" class="form-control" id="foto4" name="foto4">
            @if($paket->foto4)
                <img src="{{ asset('storage/' . $paket->foto4) }}" width="100" height="100" alt="Foto 4">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
