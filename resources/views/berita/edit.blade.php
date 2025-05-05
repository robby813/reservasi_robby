@extends('be.master')
@section('sidebar')
    @include('be.sidebar')
@endsection
@section('navbar')
    @include('be.navbar')
@endsection
@section('content')
<div class="container">
    <h1>{{ isset($data) ? 'Edit' : 'Tambah' }} Berita</h1>
    <form action="{{ isset($data) ? route('berita.update', $data->id) : route('berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($data))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul', $data->judul ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label>Isi Berita</label>
            <textarea name="berita" class="form-control" required>{{ old('berita', $data->berita ?? '') }}</textarea>
        </div>
        <div class="mb-3">
            <label>Tanggal Posting</label>
            <input type="datetime-local" name="tgl_post" class="form-control" value="{{ old('tgl_post', isset($data) ? \Carbon\Carbon::parse($data->tgl_post)->format('Y-m-d\TH:i') : '') }}" required>
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <select name="id_kategori_berita" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategori as $k)
                <option value="{{ $k->id }}" {{ old('id_kategori_berita', $data->id_kategori_berita ?? '') == $k->id ? 'selected' : '' }}>
                    {{ $k->kategori_berita }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control">
            @if(isset($data) && $data->foto)
                <img src="{{ asset('storage/'.$data->foto) }}" width="100" class="mt-2">
            @endif
        </div>
        <button class="btn btn-success">{{ isset($data) ? 'Update' : 'Simpan' }}</button>
        <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
