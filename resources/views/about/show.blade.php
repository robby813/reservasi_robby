@extends('fe.masters')

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">Detail Reservasi</h3>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('reservasi.index') }}">Reservasi Saya</a></li>
            <li class="breadcrumb-item active text-white">Detail</li>
        </ol>
    </div>
</div>
<!-- Header End -->

<!-- Detail Reservasi Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h5 class="section-about-title">Detail</h5>
            <h1 class="display-6">Detail Reservasi Anda</h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow rounded border-0">
                    <div class="card-body p-4">
                        <h4 class="mb-4 text-primary">Informasi Reservasi</h4>

                        <div class="row mb-3">
                            <div class="col-sm-5 text-muted">Nama Paket Wisata</div>
                            <div class="col-sm-7">{{ $reservasi->paket->nama_paket }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-5 text-muted">Tanggal Reservasi</div>
                            <div class="col-sm-7">{{ \Carbon\Carbon::parse($reservasi->tanggal_mulai)->format('d M Y H:i') }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-5 text-muted">Jumlah Orang</div>
                            <div class="col-sm-7">{{ $reservasi->jumlah_peserta }} Orang</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-5 text-muted">Status</div>
                            <div class="col-sm-7">
                                @if($reservasi->status_reservasi_wisata == 'dikonfirmasi')
                                    <span class="badge bg-success">Dikonfirmasi</span>
                                @elseif($reservasi->status_reservasi_wisata == 'menunggu')
                                    <span class="badge bg-warning text-dark">Menunggu</span>
                                @elseif($reservasi->status_reservasi_wisata == 'dibatalkan')
                                    <span class="badge bg-danger">Dibatalkan</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($reservasi->status_reservasi_wisata) }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-5 text-muted">Total Harga</div>
                            <div class="col-sm-7">Rp {{ number_format($reservasi->total_bayar, 0, ',', '.') }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-5 text-muted">Pelanggan</div>
                            <div class="col-sm-7">{{ $reservasi->pelanggan->nama_lengkap ?? 'Pelanggan tidak ditemukan' }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-5 text-muted">Bukti Pembayaran</div>
                            <div class="col-sm-7">
                                @if($reservasi->file_bukti_tf)
                                    <a href="{{ asset('storage/'.$reservasi->file_bukti_tf) }}" target="_blank" class="btn btn-outline-primary btn-sm">Lihat Bukti Pembayaran</a>
                                @else
                                    <span class="text-muted">Belum ada bukti pembayaran</span>
                                @endif
                            </div>
                        </div>

                        <div class="text-end mt-4">
                            <a href="{{ route('about.index') }}" class="btn btn-secondary rounded-pill px-4">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Detail Reservasi End -->

@endsection
