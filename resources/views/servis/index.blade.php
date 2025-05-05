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


<!-- Testimonial Start -->
<div class="container-fluid testimonial py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Testimonial</h5>
            <h1 class="mb-0">Our Clients Say!!!</h1>
        </div>
        <div class="testimonial-carousel owl-carousel">
            <div class="testimonial-item text-center rounded pb-4">
                <div class="testimonial-comment bg-light rounded p-4">
                    <p class="text-center mb-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis nostrum cupiditate, eligendi repellendus saepe illum earum architecto dicta quisquam quasi porro officiis. Vero reiciendis,
                    </p>
                </div>
                <div class="testimonial-img p-1">
                    <img src="{{ asset ('front-end/img/testimonial-1.jpg') }}" class="img-fluid rounded-circle" alt="Image">
                </div>
                <div style="margin-top: -35px;">
                    <h5 class="mb-0">John Abraham</h5>
                    <p class="mb-0">New York, USA</p>
                    <div class="d-flex justify-content-center">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                </div>
            </div>
            <div class="testimonial-item text-center rounded pb-4">
                <div class="testimonial-comment bg-light rounded p-4">
                    <p class="text-center mb-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis nostrum cupiditate, eligendi repellendus saepe illum earum architecto dicta quisquam quasi porro officiis. Vero reiciendis,
                    </p>
                </div>
                <div class="testimonial-img p-1">
                    <img src="img/testimonial-2.jpg" class="img-fluid rounded-circle" alt="Image">
                </div>
                <div style="margin-top: -35px;">
                    <h5 class="mb-0">John Abraham</h5>
                    <p class="mb-0">New York, USA</p>
                    <div class="d-flex justify-content-center">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                </div>
            </div>
            <div class="testimonial-item text-center rounded pb-4">
                <div class="testimonial-comment bg-light rounded p-4">
                    <p class="text-center mb-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis nostrum cupiditate, eligendi repellendus saepe illum earum architecto dicta quisquam quasi porro officiis. Vero reiciendis,
                    </p>
                </div>
                <div class="testimonial-img p-1">
                    <img src="img/testimonial-3.jpg" class="img-fluid rounded-circle" alt="Image">
                </div>
                <div style="margin-top: -35px;">
                    <h5 class="mb-0">John Abraham</h5>
                    <p class="mb-0">New York, USA</p>
                    <div class="d-flex justify-content-center">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                </div>
            </div>
            <div class="testimonial-item text-center rounded pb-4">
                <div class="testimonial-comment bg-light rounded p-4">
                    <p class="text-center mb-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis nostrum cupiditate, eligendi repellendus saepe illum earum architecto dicta quisquam quasi porro officiis. Vero reiciendis,
                    </p>
                </div>
                <div class="testimonial-img p-1">
                    <img src="img/testimonial-4.jpg" class="img-fluid rounded-circle" alt="Image">
                </div>
                <div style="margin-top: -35px;">
                    <h5 class="mb-0">John Abraham</h5>
                    <p class="mb-0">New York, USA</p>
                    <div class="d-flex justify-content-center">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->

<!-- Subscribe Start -->
<div class="container-fluid subscribe py-5">
    <div class="container text-center py-5">
        <div class="mx-auto text-center" style="max-width: 900px;">
            <h5 class="subscribe-title px-3">Subscribe</h5>
            <h1 class="text-white mb-4">Our Newsletter</h1>
            <p class="text-white mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum tempore nam, architecto doloremque velit explicabo? Voluptate sunt eveniet fuga eligendi! Expedita laudantium fugiat corrupti eum cum repellat a laborum quasi.
            </p>
            <div class="position-relative mx-auto">
                <input class="form-control border-primary rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                <button type="button" class="btn btn-primary rounded-pill position-absolute top-0 end-0 py-2 px-4 mt-2 me-2">Subscribe</button>
            </div>
        </div>
    </div>
</div>
<!-- Subscribe End -->




@endsection

