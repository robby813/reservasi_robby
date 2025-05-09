@extends('fe.masters')
@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">{{ $penginapan->nama_penginapan }}</h3>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Penginapan</a></li>
            <li class="breadcrumb-item active text-white">Detail</li>
        </ol>
    </div>
</div>
<!-- Header End -->

<!-- Penginapan Detail Start -->
<div class="container py-5">
    <div class="row g-5">
        <!-- Informasi Utama -->
        <div class="col-lg-8">
            <h2 class="mb-3">{{ $penginapan->nama_penginapan }}</h2>

            <!-- Deskripsi -->
            <h5 class="mb-2">Deskripsi</h5>
            <p class="mb-4">{{ $penginapan->deskripsi }}</p>

            <!-- Fasilitas -->
            <h5 class="mb-2">Fasilitas</h5>
            <ul class="list-unstyled mb-4">
                @foreach(explode(',', $penginapan->fasilitas) as $fasilitas)
                    <li><i class="fa fa-check text-success me-2"></i>{{ trim($fasilitas) }}</li>
                @endforeach
            </ul>

            <!-- Foto -->
<h5 class="mb-3">Foto Penginapan</h5>
<div class="row g-3">
    @for($i = 1; $i <= 5; $i++)
        @php $foto = 'foto' . $i; @endphp
        @if(!empty($penginapan->$foto))
            <div class="col-md-4 col-sm-6">
                <a href="{{ asset('storage/' . $penginapan->$foto) }}" data-lightbox="penginapan-gallery">
                    <img src="{{ asset('storage/' . $penginapan->$foto) }}"
                         class="img-fluid rounded shadow-sm"
                         alt="Foto {{ $i }}"
                         style="width: 100%; aspect-ratio: 4/3; object-fit: cover;">
                </a>
            </div>
        @endif
    @endfor
</div>

<!-- Tombol Kembali -->
<div class="container pb-4 mt-4">
    <div class="d-flex justify-content-start">
        <a href="{{ route('packages.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill">
            <i class="fa fa-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>



        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="bg-light rounded p-4">
                <h5 class="mb-3">Informasi Singkat</h5>
                <p><strong>Nama Penginapan:</strong><br>{{ $penginapan->nama_penginapan }}</p>
                <p><strong>Deskripsi Singkat:</strong><br>{{ Str::limit($penginapan->deskripsi, 150) }}</p>
                <p><strong>Jumlah Fasilitas:</strong><br>{{ count(explode(',', $penginapan->fasilitas)) }} item</p>
            </div>
        </div>
    </div>
</div>
<!-- Penginapan Detail End -->

@endsection
