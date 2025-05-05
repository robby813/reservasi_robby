@extends('be.master')

@section('sidebar')
    @include('be.sidebar')
@endsection

@section('navbar')
    @include('be.navbar')
@endsection

@section('content')
<div class="container">
    <h1>Edit Penginapan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('penginapan.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nama Penginapan</label>
            <input type="text" name="nama_penginapan" class="form-control" value="{{ $data->nama_penginapan }}" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required>{{ $data->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label>Fasilitas</label>
            <input type="text" name="fasilitas" class="form-control" value="{{ $data->fasilitas }}" required>
        </div>

        <div class="mb-3">
            <label>Foto 1</label><br>
            @if($data->foto1)
                <img src="{{ asset('storage/' . $data->foto1) }}" width="80"><br>
            @endif
            <input type="file" name="foto1" class="form-control mt-2">
        </div>

        <div class="mb-3">
            <label>Foto 2</label><br>
            @if($data->foto2)
                <img src="{{ asset('storage/' . $data->foto2) }}" width="80"><br>
            @endif
            <input type="file" name="foto2" class="form-control mt-2">
        </div>

        <div class="mb-3">
            <label>Foto 3</label><br>
            @if($data->foto3)
                <img src="{{ asset('storage/' . $data->foto3) }}" width="80"><br>
            @endif
            <input type="file" name="foto3" class="form-control mt-2">
        </div>

        <div class="mb-3">
            <label>Foto 4</label><br>
            @if($data->foto4)
                <img src="{{ asset('storage/' . $data->foto4) }}" width="80"><br>
            @endif
            <input type="file" name="foto4" class="form-control mt-2">
        </div>

        <div class="mb-3">
            <label>Foto 5</label><br>
            @if($data->foto5)
                <img src="{{ asset('storage/' . $data->foto5) }}" width="80"><br>
            @endif
            <input type="file" name="foto5" class="form-control mt-2">
        </div>

        <button class="btn btn-success" type="submit">Update</button>
        <a href="{{ route('penginapan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
