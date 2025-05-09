    @extends('fe.masters')

    @section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Travel Packages</h3>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Packages</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Destination Start -->
    <div class="container-fluid destination py-5">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Penginapan</h5>
                <h1 class="mb-0">Popular Penginapan</h1>
            </div>

            <div class="tab-class text-center">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            @foreach ($penginapan as $item)
                                <div class="col-lg-6 col-xl-4">
                                    <div class="destination-img position-relative">
                                        <img class="img-fluid rounded w-100" src="{{ asset('storage/' . $item->foto1) }}" alt="{{ $item->nama_penginapan }}">

                                        <div class="destination-overlay p-4">
                                            <a href="#" class="btn btn-primary text-white rounded-pill border py-2 px-3">
                                                {{ $item->nama_penginapan }}
                                            </a>
                                            <a href="{{ route('penginapan.show', $item->id) }}" class="btn-hover text-white">
                                                View All Place <i class="fa fa-arrow-right ms-2"></i>
                                            </a>
                                        </div>

                                        <div class="search-icon">
                                            <a href="{{ asset('storage/' . $item->foto1) }}" data-lightbox="destination-{{ $loop->index }}">
                                                <i class="fa fa-plus-square fa-1x btn btn-light btn-lg-square text-primary"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div> <!-- row -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Destination End -->
    @endsection
