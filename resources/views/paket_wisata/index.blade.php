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

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-light text-center">
            <tr>
                <th>No</th>
                <th>Nama Paket</th>
                {{-- <th>Deskripsi</th>
                <th>Fasilitas</th> --}}
                <th>Harga/Hari</th>
                <th>Foto1</th>
                {{-- <th>Foto2</th>
                <th>Foto3</th>
                <th>Foto4</th> --}}
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pakets as $index => $paket)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $paket->nama_paket }}</td>
                {{-- <td style="max-width: 200px;">{{ \Illuminate\Support\Str::limit($paket->deskripsi, 15) }}</td>
                <td style="max-width: 150px;">{{ \Illuminate\Support\Str::limit($paket->fasilitas, 15) }}</td> --}}
                <td class="text-end">Rp {{ number_format($paket->harga_per_pack, 0, ',', '.') }}</td>

                <!-- Foto1 -->
                <td class="text-center">
                    @if($paket->foto1)
                        <img src="{{ asset('storage/' . $paket->foto1) }}" alt="foto1" width="50" height="50">
                    @else
                        <span class="text-muted">-</span>
                    @endif
                </td>

                <!-- Actions -->
                <td class="text-center">
                    <a href="{{ route('paket_wisata.show', $paket->id) }}" class="btn btn-info btn-sm">Detail</a>

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
