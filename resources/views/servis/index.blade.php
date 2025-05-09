@extends('fe.masters')
@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">Our Services</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
            <li class="breadcrumb-item active text-white">Services</li>
        </ol>
    </div>
</div>
<!-- Header End -->

<!-- Services Start -->
<div class="container-fluid bg-light service py-5">
    <div class="container py-4">
        <div class="mx-auto text-center mb-4" style="max-width: 900px;">
            <h5 class="section-title px-3">Services</h5>
            <h2 class="mb-0">Our Services</h2>
        </div>
        <div class="row g-4">
            @foreach ($berita as $item)
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-12">
                        <a href="{{ route('servis.show', $item->id) }}" class="text-decoration-none">
                            <div class="service-content-inner d-flex align-items-center justify-content-between bg-white border border-primary rounded p-3 pe-0">

                                {{-- Konten Teks --}}
                                <div class="service-content text-center w-75">
                                    <h4 class="mb-1 text-dark fw-bold" style="font-size: 24px;">
                                        {{ $item->judul }}
                                    </h4>
                                    <p class="mb-2 text-secondary" style="font-size: 14px;">
                                        {{ $item->kategori->kategori_berita }}
                                    </p>
                                    <p class="mb-0 text-muted" style="font-size: 13px;">
                                        {{ $item->tgl_post }}
                                    </p>
                                </div>

                                {{-- Gambar --}}
                                <div class="service-icon p-2 ps-3">
                                    <img src="{{ asset('storage/'.$item->foto) }}" style="width: 120px; height: 120px; object-fit: cover;" class="img-fluid rounded">
                                </div>

                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="col-12">
                <div class="text-center">
                    <a class="btn btn-primary rounded-pill py-2 px-4 mt-2" href="#">Service More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Services End -->
    




@endsection

