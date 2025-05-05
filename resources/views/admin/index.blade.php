@extends('be.master')
@section('sidebar')
    @include('be.sidebar')
@endsection
@section('navbar')
    @include('be.navbar')
@endsection
@section('content')
<div class="row mt-4"> <!-- Tambahkan mt-4 agar ada jarak dari navbar -->
    <div class="col-md-12 d-flex justify-content-center">
        <div class="card flat-card" style="max-width: 600px; width: 100%;">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6 card-body br">
                        <div class="row align-items-center">
                            <div class="col-sm-4 text-center">
                                <i class="icon feather icon-eye text-c-green mb-1 d-block"></i>
                            </div>
                            <div class="col-sm-8 text-center">
                                <h5>10k</h5>
                                <span>Visitors</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 card-body">
                        <div class="row align-items-center">
                            <div class="col-sm-4 text-center">
                                <i class="icon feather icon-music text-c-red mb-1 d-block"></i>
                            </div>
                            <div class="col-sm-8 text-center">
                                <h5>100%</h5>
                                <span>Volume</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 card-body br">
                        <div class="row align-items-center">
                            <div class="col-sm-4 text-center">
                                <i class="icon feather icon-file-text text-c-blue mb-1 d-block"></i>
                            </div>
                            <div class="col-sm-8 text-center">
                                <h5>2000 +</h5>
                                <span>Files</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 card-body">
                        <div class="row align-items-center">
                            <div class="col-sm-4 text-center">
                                <i class="icon feather icon-mail text-c-yellow mb-1 d-block"></i>
                            </div>
                            <div class="col-sm-8 text-center">
                                <h5>120</h5>
                                <span>Mails</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- widget primary card start -->
        </div>
    </div>
</div>


@endsection
