@extends('be.master')
@section('sidebar')
    @include('be.sidebar')
@endsection
@section('navbar')
    @include('be.navbar')
@endsection
@section('content')
<div class="container">
    <h1>Data Obyek Wisata</h1>
    <a href="{{ route('obyek_wisata.create') }}" class="btn btn-primary mb-3">Tambah Obyek Wisata</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Wisata</th>
                <th>Kategori</th>
                <th>Fasilitas</th>
                <th>Foto 1</th>
                <th>Foto 2</th>
                <th>Foto 3</th>
                <th>Foto 4</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($obyekWisata as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_wisata }}</td>
                <td>{{ $item->kategori->kategori_wisata }}</td> <!-- Menampilkan kategori -->
                <td>{{ $item->fasilitas }}</td>
                <td>
                    @if($item->foto1)
                    <img src="{{ asset('storage/' . $item->foto1) }}" alt="Foto 1" width="100">
                    @endif
                </td>
                <td>
                    @if($item->foto2)
                    <img src="{{ asset('storage/' . $item->foto2) }}" alt="Foto 2" width="100">
                    @endif
                </td>
                <td>
                    @if($item->foto3)
                    <img src="{{ asset('storage/' . $item->foto3) }}" alt="Foto 3" width="100">
                    @endif
                </td>
                <td>
                    @if($item->foto4)
                    <img src="{{ asset('storage/' . $item->foto4) }}" alt="Foto 4" width="100">
                    @endif
                </td>
                <td>
                    <a href="{{ route('obyek_wisata.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('obyek_wisata.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Yakin mau hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
