@extends('be.master')
@section('sidebar')
    @include('be.sidebar')
@endsection
@section('navbar')
    @include('be.navbar')
@endsection
@section('content')
<div class="container">
    <h1>Edit Kategori Berita</h1>
    <form action="{{ route('kategori_berita.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" name="kategori_berita" class="form-control @error('kategori_berita') is-invalid @enderror" value="{{ old('kategori_berita', $kategori->kategori_berita) }}">
            @error('kategori_berita')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary mt-3" type="submit">Update</button>
        <a href="{{ route('kategori_berita.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection
