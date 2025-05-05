@extends('fe.masters')
@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">PAKET WISATA</h3>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Paket Wisata</li>
        </ol>
    </div>
</div>
<!-- Header End -->

<!-- Blog Start -->
<div class="container-fluid blog py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Paket Wisata</h5>
            <h1 class="mb-4">Popular Wisata Terkini</h1>
            <p class="mb-0">Nikmati perjalanan wisata terbaik dan tak terlupakan bersama kami. Pilih paket wisata favoritmu dan rasakan petualangan yang seru dan menyenangkan di berbagai destinasi menarik.</p>
        </div>

        <div class="row g-4 justify-content-center">
            @foreach ($paket_wisata as $item)
            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <div class="blog-img">
                        <div class="blog-img-inner">
                            <img class="img-fluid w-100 rounded-top" style="width: 100%; height: 500px; object-fit: cover;" src="{{ asset('storage/' . $item->foto1) }}" alt="{{ $item->nama_paket }}">
                            <div class="blog-icon">
                                <a href="{{ route('blog.show', $item->id) }}" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
                            </div>
                        </div>
                        <div class="blog-info d-flex align-items-center border border-start-0 border-end-0">
                            <small class="flex-fill text-center border-end py-2">
                                <i class="fa fa-calendar-alt text-primary me-2"></i> {{ $item->nama_paket }}
                            </small>
                            <a href="#" class="btn-hover flex-fill text-center text-white border-end py-2">
                                <i class="fa fa-thumbs-up text-primary me-2"></i>1.7K
                            </a>
                            <a href="#" class="btn-hover flex-fill text-center text-white py-2">
                                <i class="fa fa-comments text-primary me-2"></i>1K
                            </a>
                        </div>
                    </div>

                    <div class="blog-content border border-top-0 rounded-bottom p-4">
                        <p class="mb-3">Rp {{ number_format($item->harga_per_pack, 0, ',', '.') }}</p>
                        <a href="{{ route('blog.show', $item->id) }}" class="h4 d-block mb-2">{{ $item->nama_paket }}</a>
                        <p class="my-3">{{ Str::limit($item->deskripsi, 100) }}</p>
                        <a href="{{ route('blog.show', $item->id) }}" class="btn btn-primary rounded-pill py-2 px-4">Cek reservasi</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Blog End -->

@endsection
