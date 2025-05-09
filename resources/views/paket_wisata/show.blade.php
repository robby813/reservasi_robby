@extends('be.master')

@section('sidebar')
    @include('be.sidebar')
@endsection

@section('navbar')
    @include('be.navbar')
@endsection

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Detail Paket Wisata</h1>

    <!-- Tombol Kembali ke Index -->
    <a href="{{ route('paket_wisata.index') }}" class="btn btn-secondary mb-4">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>

    <!-- Detail Paket -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">{{ $paket->nama_paket }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Deskripsi:</strong> {{ $paket->deskripsi }}</p>
            <p><strong>Fasilitas:</strong> {{ $paket->fasilitas }}</p>
            <p><strong>Harga / Hari:</strong> Rp {{ number_format($paket->harga_per_pack, 0, ',', '.') }}</p>
        </div>
    </div>

    <!-- Galeri Foto -->
    <h4 class="mb-3">Galeri Fotto</h4>
    <div class="row">
        @if($paket->foto1)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <img src="{{ asset('storage/' . $paket->foto1) }}" alt="Foto 1" class="card-img-top img-fluid rounded">
                </div>
            </div>
        @else
            <div class="col-md-3 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <p>Foto 1 tidak tersedia</p>
                    </div>
                </div>
            </div>
        @endif

        @if($paket->foto2)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <img src="{{ asset('storage/' . $paket->foto2) }}" alt="Foto 2" class="card-img-top img-fluid rounded">
                </div>
            </div>
        @else
            <div class="col-md-3 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <p>Foto 2 tidak tersedia</p>
                    </div>
                </div>
            </div>
        @endif

        @if($paket->foto3)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <img src="{{ asset('storage/' . $paket->foto3) }}" alt="Foto 3" class="card-img-top img-fluid rounded">
                </div>
            </div>
        @else
            <div class="col-md-3 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <p>Foto 3 tidak tersedia</p>
                    </div>
                </div>
            </div>
        @endif

        @if($paket->foto4)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <img src="{{ asset('storage/' . $paket->foto4) }}" alt="Foto 4" class="card-img-top img-fluid rounded">
                </div>
            </div>
        @else
            <div class="col-md-3 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <p>Foto 4 tidak tersedia</p>
                    </div>
                </div>
            </div>
        @endif
    </div>



</div>
@endsection
