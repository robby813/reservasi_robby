@extends('be.master')
@section('sidebar')
    @include('be.sidebar')
@endsection
@section('navbar')
    @include('be.navbar')
@endsection
@section('content')
<div class="container">
    <h1>Tambah Obyek Wisata</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('obyek_wisata.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama_wisata">Nama Wisata</label>
            <input type="text" id="nama_wisata" name="nama_wisata" class="form-control" value="{{ old('nama_wisata') }}" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi_wisata">Deskripsi</label>
            <textarea id="deskripsi_wisata" name="deskripsi_wisata" class="form-control" required>{{ old('deskripsi_wisata') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="id_kategori_wisata">Kategori</label>
            <select id="id_kategori_wisata" name="id_kategori_wisata" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategori as $k)
                <option value="{{ $k->id }}" {{ old('id_kategori_wisata') == $k->id ? 'selected' : '' }}>
                    {{ $k->kategori_wisata }}
                </option>
            @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="fasilitas">Fasilitas</label>
            <input type="text" id="fasilitas" name="fasilitas" class="form-control" value="{{ old('fasilitas') }}" required>
        </div>
        <div class="mb-3">
            <label for="foto1">Foto 1</label>
            <input type="file" id="foto1" name="foto1" class="form-control">
        </div>
        <button class="btn btn-success" type="submit">Simpan</button>
        <a href="{{ route('obyek_wisata.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
