@extends('be.master')
@section('sidebar')
    @include('be.sidebar')
@endsection
@section('navbar')
    @include('be.navbar')
@endsection
@section('content')

<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h5>Edit Kategori Wisata</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('kategori_wisata.update', $kategoriWisata->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="kategori_wisata">Nama Kategori Wisata</label>
                    <input type="text" name="kategori_wisata" class="form-control @error('kategori_wisata') is-invalid @enderror" value="{{ old('kategori_wisata', $kategoriWisata->kategori_wisata) }}" required>

                    @error('kategori_wisata')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-warning mt-3">Update</button>
                <a href="{{ route('kategori_wisata.index') }}" class="btn btn-secondary mt-3">Kembali</a>
            </form>
        </div>
    </div>
</div>

@endsection
