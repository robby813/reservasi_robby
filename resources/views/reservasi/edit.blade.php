@extends('be.master')
@section('sidebar')
    @include('be.sidebar')
@endsection
@section('navbar')
    @include('be.navbar')
@endsection
@section('content')
<div class="container">
    <h1>Edit Reservasi</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('reservasi.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_pelanggan">Pelanggan</label>
            <select id="id_pelanggan" name="id_pelanggan" class="form-control" required>
                <option value="">-- Pilih Pelanggan --</option>
                @foreach($pelanggan as $p)
                    <option value="{{ $p->id }}" {{ $data->id_pelanggan == $p->id ? 'selected' : '' }}>
                        {{ $p->nama_lengkap }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_paket">Paket Wisata</label>
            <select id="id_paket" name="id_paket" class="form-control" required>
                <option value="">-- Pilih Paket Wisata --</option>
                @foreach($paket as $p)
                    <option value="{{ $p->id }}" {{ $data->id_paket == $p->id ? 'selected' : '' }}>
                        {{ $p->nama_paket }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tgl_reservasi">Tanggal Reservasi</label>
            <input type="datetime-local" id="tgl_reservasi" name="tgl_reservasi" class="form-control" value="{{ $data->tgl_reservasi }}" required>
        </div>
        <div class="mb-3">
            <label for="harga">Harga</label>
            <input type="number" id="harga" name="harga" class="form-control" value="{{ $data->harga }}" required>
        </div>
        <div class="mb-3">
            <label for="jumlah_peserta">Jumlah Peserta</label>
            <input type="number" id="jumlah_peserta" name="jumlah_peserta" class="form-control" value="{{ $data->jumlah_peserta }}" required>
        </div>
        <div class="mb-3">
            <label for="diskon">Diskon</label>
            <input type="number" id="diskon" name="diskon" class="form-control" value="{{ $data->diskon }}">
        </div>
        <div class="mb-3">
            <label for="total_bayar">Total Bayar</label>
            <input type="number" id="total_bayar" name="total_bayar" class="form-control" value="{{ $data->total_bayar }}" required>
        </div>
        <div class="mb-3">
            <label for="file_bukti_tf">File Bukti Transfer</label>
            <input type="file" id="file_bukti_tf" name="file_bukti_tf" class="form-control">
        </div>
        <div class="mb-3">
            <label for="status_reservasi_wisata">Status Reservasi</label>
            <select id="status_reservasi_wisata" name="status_reservasi_wisata" class="form-control" required>
                <option value="pesan" {{ $data->status_reservasi_wisata == 'pesan' ? 'selected' : '' }}>Pesan</option>
                <option value="dibayar" {{ $data->status_reservasi_wisata == 'dibayar' ? 'selected' : '' }}>Dibayar</option>
                <option value="selesai" {{ $data->status_reservasi_wisata == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>
        <button class="btn btn-success" type="submit">Update</button>
        <a href="{{ route('reservasi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
