<!-- resources/views/paket_wisata/create.blade.php -->

@extends('be.master')

@section('sidebar')
    @include('be.sidebar')
@endsection

@section('navbar')
    @include('be.navbar')
@endsection

@section('content')
<div class="container">
    <h1>Tambah Paket Wisata</h1>

    <form action="{{ route('paket_wisata.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama_paket" class="form-label">Nama Paket</label>
            <input type="text" class="form-control" id="nama_paket" name="nama_paket" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
        </div>

        <div class="mb-3">
            <label for="fasilitas" class="form-label">Fasilitas</label>
            <input type="text" class="form-control" id="fasilitas" name="fasilitas" required>
        </div>

        <div class="mb-3">
            <label for="harga_per_pack" class="form-label">Harga/Hari</label>
            <input type="number" class="form-control" id="harga_per_pack" name="harga_per_pack" required>
        </div>

        <div class="mb-3">
            <label for="foto1" class="form-label">Foto 1</label>
            <input type="file" class="form-control" id="foto1" name="foto1">
        </div>

        <div class="mb-3">
            <label for="foto2" class="form-label">Foto 2</label>
            <input type="file" class="form-control" id="foto2" name="foto2">
        </div>

        <div class="mb-3">
            <label for="foto3" class="form-label">Foto 3</label>
            <input type="file" class="form-control" id="foto3" name="foto3">
        </div>

        <div class="mb-3">
            <label for="foto4" class="form-label">Foto 4</label>
            <input type="file" class="form-control" id="foto4" name="foto4">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
