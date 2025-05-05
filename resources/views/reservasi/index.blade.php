@extends('be.master')
@section('sidebar')
    @include('be.sidebar')
@endsection
@section('navbar')
    @include('be.navbar')
@endsection
@section('content')
<div class="container">
    <h1>Daftar Reservasi</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('reservasi.create') }}" class="btn btn-primary">Tambah Reservasi</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Nama Paket Wisata</th>
                <th>Tanggal Reservasi</th>
                <th>Total Bayar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $reservasi)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $reservasi->pelanggan->nama_lengkap }}</td>
                    <td>{{ $reservasi->paket->nama_paket }}</td>
                    <td>{{ $reservasi->tgl_reservasi }}</td>
                    <td>{{ number_format($reservasi->total_bayar, 0, ',', '.') }}</td>
                    <td>{{ $reservasi->status_reservasi_wisata }}</td>
                    <td>
                        <a href="{{ route('reservasi.edit', $reservasi->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('reservasi.destroy', $reservasi->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
