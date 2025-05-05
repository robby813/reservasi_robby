@extends('fe.masters')

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">{{ $berita->judul }}</h3>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
            <li class="breadcrumb-item active text-white">{{ \Illuminate\Support\Str::limit($berita->judul, 20) }}</li>
        </ol>
    </div>
</div>
<!-- Header End -->

<!-- Detail Berita Start -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Gambar Berita -->
            <div class="mb-4">
                <img src="{{ asset('storage/'.$berita->foto) }}" alt="{{ $berita->judul }}" class=" rounded w-100" style="max-height: 400px; object-fit: cover;">
            </div>

            <!-- Meta Info (Kategori dan Tanggal) -->
            <div class="mb-3">
                <span class="badge bg-primary">{{ $berita->kategori->kategori_berita }}</span>
                <span class="text-muted ms-3">{{ \Carbon\Carbon::parse($berita->tgl_post)->format('d M Y, H:i') }}</span>
            </div>

            <!-- Judul Berita -->
            <h2 class="mb-3 fw-bold text-dark">{{ $berita->judul }}</h2>

            <!-- Isi Berita -->
            <div class="content text-justify mb-4" style="line-height: 1.8; font-size: 1.1rem;">
                {!! nl2br(e($berita->berita)) !!}
            </div>

            <!-- Tombol Kembali -->
            <div class="mt-5">
                <a href="{{ route('servis.index') }}" class="btn btn-outline-primary rounded-pill px-4 py-2">
                    <i class="fas fa-arrow-left me-2"></i> Kembali ke Services
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Detail Berita End -->

@endsection
