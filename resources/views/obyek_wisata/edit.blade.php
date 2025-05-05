@extends('be.master')
@section('sidebar') @include('be.sidebar') @endsection
@section('navbar') @include('be.navbar') @endsection
@section('content')
<div class="container">
    <h1>Edit Obyek Wisata</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('obyek_wisata.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nama Wisata</label>
            <input type="text" name="nama_wisata" class="form-control" value="{{ old('nama_wisata', $data->nama_wisata) }}" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi_wisata" class="form-control" required>{{ old('deskripsi_wisata', $data->deskripsi_wisata) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="id_kategori_wisata" class="form-control" required>
                @foreach($kategori as $k)
                    <option value="{{ $k->id }}" {{ $data->id_kategori_wisata == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Fasilitas</label>
            <input type="text" name="fasilitas" class="form-control" value="{{ old('fasilitas', $data->fasilitas) }}" required>
        </div>

        <div class="mb-3">
            <label>Foto 1</label><br>
            @if($data->foto1)
                <img src="{{ asset('storage/' . $data->foto1) }}" width="80"><br>
            @endif
            <input type="file" name="foto1" class="form-control mt-2">
        </div>

        <button class="btn btn-success" type="submit">Update</button>
        <a href="{{ route('obyek_wisata.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
