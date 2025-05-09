@extends('fe.masters')

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">Reservasi Saya</h3>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
            <li class="breadcrumb-item active text-white">Reservasi Saya</li>
        </ol>
    </div>
</div>
<!-- Header End -->

<!-- Reservasi Saya Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h5 class="section-about-title">Reservasi</h5>
            <h1 class="display-5">Daftar Reservasi Saya</h1>
        </div>

        @if($reservasi->count() > 0)
        <div class="table-responsive shadow rounded">
            <table class="table table-bordered align-middle text-center mb-0">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Paket Wisata</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Jumlah Peserta</th>
                        <th>Total Bayar</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservasi as $index => $r)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $r->paket->nama_paket }}</td>
                            <td>{{ \Carbon\Carbon::parse($r->tanggal_mulai)->format('d M Y H:i') }}</td>
                            <td>{{ \Carbon\Carbon::parse($r->tanggal_selesai)->format('d M Y H:i') }}</td>
                            <td>{{ $r->jumlah_peserta }} Orang</td>
                            <td>Rp {{ number_format($r->total_bayar, 0, ',', '.') }}</td>
                            <td>
                                @if($r->status_reservasi_wisata == 'dikonfirmasi')
                                    <span class="badge bg-success">Dikonfirmasi</span>
                                @elseif($r->status_reservasi_wisata == 'menunggu')
                                    <span class="badge bg-warning text-dark">Menunggu</span>
                                @elseif($r->status_reservasi_wisata == 'dibatalkan')
                                    <span class="badge bg-danger">Dibatalkan</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($r->status_reservasi_wisata) }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('about.show', $r->id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
            <div class="alert alert-info text-center">
                Kamu belum memiliki reservasi.
            </div>
        @endif
    </div>
</div>
<!-- Reservasi Saya End -->

@endsection
