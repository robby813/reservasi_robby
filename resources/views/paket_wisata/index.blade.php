<!-- resources/views/paket_wisata/index.blade.php -->

@extends('be.master')

@section('sidebar')
    @include('be.sidebar')
@endsection

@section('navbar')
    @include('be.navbar')
@endsection

@section('content')
<div class="container">
    <h1>Data Paket Wisata</h1>
    <a href="{{ route('paket_wisata.create') }}" class="btn btn-primary mb-3">Tambah Paket Wisata</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Paket</th>
                <th>Deskripsi</th>
                <th>Harga per Pack</th>
                <th>Foto1</th>
                <th>Foto2</th>
                <th>Foto3</th>
                <th>Foto4</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pakets as $index => $paket)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $paket->nama_paket }}</td>
                <td>{{ $paket->deskripsi }}</td>
                <td>{{ number_format($paket->harga_per_pack, 0, ',', '.') }}</td>

                <!-- Foto1 -->
                <td>
                    @if($paket->foto1)
                        <img src="{{ asset('storage/' . $paket->foto1) }}" alt="foto1" width="50" height="50">
                    @else
                        Tidak ada foto
                    @endif
                </td>

                <!-- Foto2 -->
                <td>
                    @if($paket->foto2)
                        <img src="{{ asset('storage/' . $paket->foto2) }}" alt="foto2" width="50" height="50">
                    @else
                        Tidak ada foto
                    @endif
                </td>

                <!-- Foto3 -->
                <td>
                    @if($paket->foto3)
                        <img src="{{ asset('storage/' . $paket->foto3) }}" alt="foto3" width="50" height="50">
                    @else
                        Tidak ada foto
                    @endif
                </td>

                <!-- Foto4 -->
                <td>
                    @if($paket->foto4)
                        <img src="{{ asset('storage/' . $paket->foto4) }}" alt="foto4" width="50" height="50">
                    @else
                        Tidak ada foto
                    @endif
                </td>

                <!-- Actions -->
                <td>
                    <a href="{{ route('paket_wisata.edit', $paket->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('paket_wisata.destroy', $paket->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin mau hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
