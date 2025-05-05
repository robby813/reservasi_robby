@extends('be.master')
@section('sidebar')
    @include('be.sidebar')
@endsection
@section('navbar')
    @include('be.navbar')
@endsection
@section('content')
<div class="container">
    <h1>Data Berita</h1>
    <a href="{{ route('berita.create') }}" class="btn btn-primary mb-3">Tambah Berita</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Tanggal</th>
                <th>Isi Berita</th> <!-- Kolom untuk menampilkan isi berita -->
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->kategori->kategori_berita }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tgl_post)->format('d-m-Y H:i') }}</td>
                <td>{{ Str::limit($item->berita, 50) }} <!-- Menampilkan potongan dari isi berita --> </td>
                <td>
                    @if($item->foto)
                        <img src="{{ asset('storage/'.$item->foto) }}" width="100">
                    @endif
                </td>
                <td>
                    <a href="{{ route('berita.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('berita.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
