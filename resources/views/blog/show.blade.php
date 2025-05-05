@extends('fe.masters')

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">{{ $paket->nama_paket }}</h3>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Paket Wisata</a></li>
            <li class="breadcrumb-item active text-white">{{ \Illuminate\Support\Str::limit($paket->nama_paket, 20) }}</li>
        </ol>
    </div>
</div>
<!-- Header End -->

<!-- Paket Detail Start -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="d-flex flex-wrap">
                <!-- Gambar -->
                <div class="me-4 mb-4" style="max-width: 45%;">
                    <img src="{{ asset('storage/'.$paket->foto1) }}" alt="{{ $paket->nama_paket }}" class="img-fluid rounded" style="max-height: 500px; object-fit: cover;">
                </div>

                <!-- Info Paket -->
                <div style="flex: 1;">
                    <h2 class="fw-bold mb-4">{{ $paket->nama_paket }}</h2>

                    <!-- Harga -->
                    <div class="mb-3">
                        <h5 class="text-muted mb-1"><i class="fas fa-tags text-primary me-2"></i>Harga Paket</h5>
                        <p class="text-primary fs-5 fw-semibold">Rp {{ number_format($paket->harga_per_pack, 0, ',', '.') }} /Hari</p>
                    </div>

                    <!-- Fasilitas -->
                    <div class="mb-3">
                        <h5 class="text-muted mb-1"><i class="fas fa-check-circle text-success me-2"></i>Fasilitas</h5>
                        <p style="line-height: 1.8;">{{ $paket->fasilitas }}</p>
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <h5 class="text-muted mb-1"><i class="fas fa-info-circle text-warning me-2"></i>Deskripsi</h5>
                        <p style="line-height: 1.8;">{{ $paket->deskripsi }}</p>
                    </div>
                </div>

            </div>

            <!-- Tombol Kembali dan Reservasi di bawah gambar dan teks -->
            <div class="mt-4 d-flex gap-3">
                <a href="{{ route('home.index') }}" class="btn btn-outline-primary rounded-pill px-4 py-2">
                    <i class="fas fa-arrow-left me-2"></i> Kembali ke Beranda
                </a>
                <a href="{{ route('reservasi.create', ['paket_id' => $paket->id]) }}" class="btn btn-success rounded-pill px-4 py-2">
                    <i class="fas fa-check me-2"></i> Submit Reservasi
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Paket Detail End -->

@endsection
