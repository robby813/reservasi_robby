@extends('be.master')

@section('sidebar')
    @include('be.sidebar')
@endsection

@section('navbar')
    @include('be.navbar')
@endsection

@section('content')
<div class="container">
    <h1>Data Penginapan</h1>
    <a href="{{ route('penginapan.create') }}" class="btn btn-primary mb-3">Tambah Penginapan</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Penginapan</th>
                    <th>Fasilitas</th>
                    <th>Foto 1</th>
                    <th>Foto 2</th>
                    <th>Foto 3</th>
                    <th>Foto 4</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($penginapan as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama_penginapan }}</td>
                    <td>{{ $item->fasilitas }}</td>

                    <td>
                        @if($item->foto1)
                            <img src="{{ asset('storage/' . $item->foto1) }}" width="80" class="img-thumbnail">
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if($item->foto2)
                            <img src="{{ asset('storage/' . $item->foto2) }}" width="80" class="img-thumbnail">
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if($item->foto3)
                            <img src="{{ asset('storage/' . $item->foto3) }}" width="80" class="img-thumbnail">
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if($item->foto4)
                            <img src="{{ asset('storage/' . $item->foto4) }}" width="80" class="img-thumbnail">
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('penginapan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('penginapan.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Yakin mau hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
