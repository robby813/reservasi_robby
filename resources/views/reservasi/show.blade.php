@extends('be.master')
@section('sidebar')
    @include('be.sidebar')
@endsection
@section('navbar')
    @include('be.navbar')
@endsection
@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center">Detail Reservasi</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow-sm p-4">
        <!-- Detail fields -->
        <div class="mb-3">
            <label for="id_pelanggan"><strong>Pelanggan</strong></label>
            <input type="text" id="id_pelanggan" class="form-control" value="{{ $reservasi->pelanggan->nama_lengkap ?? ($reservasi->pelanggan->user->name ?? 'Nama tidak ditemukan') }}" readonly>
        </div>
        <div class="mb-3">
            <label for="id_paket"><strong>Paket Wisata</strong></label>
            <input type="text" id="id_paket" class="form-control" value="{{ $reservasi->paket->nama_paket }}" readonly>
        </div>
        <div class="mb-3">
            <label for="tgl_reservasi"><strong>Tanggal Reservasi</strong></label>
            <input type="text" id="tgl_reservasi" class="form-control" value="{{ \Carbon\Carbon::parse($reservasi->tgl_reservasi)->format('d-m-Y H:i') }}" readonly>
        </div>
        <div class="mb-3">
            <label for="harga"><strong>Harga</strong></label>
            <input type="text" id="harga" class="form-control" value="{{ number_format($reservasi->harga, 0, ',', '.') }}" readonly>
        </div>
        <div class="mb-3">
            <label for="jumlah_peserta"><strong>Jumlah Peserta</strong></label>
            <input type="text" id="jumlah_peserta" class="form-control" value="{{ $reservasi->jumlah_peserta }}" readonly>
        </div>
        <div id="diskon-info" class="mb-3">
            @if ($reservasi->jumlah_peserta >= 10)
                <span class="badge bg-success">Diskon 15% karena peserta lebih dari 10</span>
            @elseif ($reservasi->jumlah_peserta > 3)
                <span class="badge bg-info">Diskon 5% karena peserta lebih dari 3</span>
            @else
                <span class="badge bg-warning">Tidak ada diskon karena peserta kurang dari 3</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="total_bayar"><strong>Total Bayar</strong></label>
            <input type="text" id="total_bayar" class="form-control" value="{{ number_format($reservasi->total_bayar, 0, ',', '.') }}" readonly>
        </div>
        <div class="mb-3">
            <label for="file_bukti_tf"><strong>File Bukti Transfer</strong></label>
            @if($reservasi->file_bukti_tf)
                <a href="{{ asset('storage/'.$reservasi->file_bukti_tf) }}" class="form-control" target="_blank">Lihat Bukti Transfer</a>
            @else
                <input type="text" class="form-control" value="Tidak ada bukti transfer" readonly>
            @endif
        </div>
        <div class="mb-3">
            <label for="status_reservasi_wisata"><strong>Status Reservasi</strong></label>
            <input type="text" id="status_reservasi_wisata" class="form-control" value="{{ ucfirst($reservasi->status_reservasi_wisata) }}" readonly>
        </div>

        <!-- Tombol Edit dan Kembali -->
        <div class="mt-3">
            <!-- Tombol Edit dengan ukuran lebih kecil -->
            <a href="{{ route('reservasi.edit', $reservasi->id) }}" class="btn btn-warning btn-sm">Edit Reservasi</a>
            <!-- Tombol Kembali -->
            <a href="{{ route('reservasi.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
        </div>

    </div>
</div>
@endsection
