
@extends('be.master')

@section('sidebar')
    @include('be.sidebar')
@endsection

@section('navbar')
    @include('be.navbar')
@endsection

@section('content')
<div class="container">
    <h1>Tambah Penginapan</h1>

    <form action="{{ route('penginapan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Nama Penginapan</label>
            <input type="text" name="nama_penginapan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Fasilitas</label>
            <input type="text" name="fasilitas" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Foto 1</label>
            <input type="file" name="foto1" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
            <label>Foto 2</label>
            <input type="file" name="foto2" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
            <label>Foto 3</label>
            <input type="file" name="foto3" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
            <label>Foto 4</label>
            <input type="file" name="foto4" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
            <label>Foto 5</label>
            <input type="file" name="foto5" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('penginapan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
