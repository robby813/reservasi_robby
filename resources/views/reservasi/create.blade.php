@extends('be.master')

@section('sidebar')
    @include('be.sidebar')
@endsection

@section('navbar')
    @include('be.navbar')
@endsection

@section('content')
<div class="container">
    <h1>Tambah Reservasi</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('reservasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="id_pelanggan">Pelanggan</label>
            <select id="id_pelanggan" name="id_pelanggan" class="form-control" required>
                <option value="">-- Pilih Pelanggan --</option>
                @foreach($pelanggan as $p)
                    <option value="{{ $p->id }}">{{ $p->nama_lengkap ?? ($p->user->name ?? 'Nama tidak ditemukan') }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_paket">Paket Wisata</label>
            <select id="id_paket" name="id_paket" class="form-control" required>
                <option value="">-- Pilih Paket Wisata --</option>
                @foreach($paket as $p)
                    <option value="{{ $p->id }}" data-harga="{{ $p->harga_per_pack }}">{{ $p->nama_paket }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tgl_reservasi">Tanggal Reservasi</label>
            <input type="datetime-local" id="tgl_reservasi" name="tgl_reservasi" class="form-control" value="{{ old('tgl_reservasi') }}" required>
        </div>
        <div class="mb-3">
            <label for="harga">Harga</label>
            <input type="number" id="harga" name="harga" class="form-control" value="{{ old('harga') }}" readonly required>
        </div>
        <div class="mb-3">
            <label for="jumlah_peserta">Jumlah Peserta</label>
            <input type="number" id="jumlah_peserta" name="jumlah_peserta" class="form-control" value="{{ old('jumlah_peserta') }}" required>
        </div>
        <div id="diskon-info" class="mb-3 d-none">
            <span class="badge bg-success" id="diskon-5">Selamat Anda mendapatkan diskon 5% karena peserta lebih dari 3</span>
            <span class="badge bg-success d-none" id="diskon-15">Selamat Anda mendapatkan diskon 15% karena peserta lebih dari 10</span>
            <span class="badge bg-warning d-none" id="diskon-none">Maaf, diskon tidak berlaku karena jumlah peserta kurang dari 3</span>
        </div>
        <div class="mb-3">
            <label for="total_bayar">Total Bayar</label>
            <input type="number" id="total_bayar" name="total_bayar" class="form-control" value="{{ old('total_bayar') }}" readonly required>
        </div>
        <div class="mb-3">
            <label for="file_bukti_tf">File Bukti Transfer</label>
            <input type="file" id="file_bukti_tf" name="file_bukti_tf" class="form-control">
        </div>
        <div class="mb-3">
            <label for="status_reservasi_wisata">Status Reservasi</label>
            <select id="status_reservasi_wisata" name="status_reservasi_wisata" class="form-control" required>
                <option value="pesan">Pesan</option>
                <option value="dibayar">Dibayar</option>
                <option value="selesai">Selesai</option>
            </select>
        </div>
        <button class="btn btn-success" type="submit">Simpan</button>
        <a href="{{ route('reservasi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

{{-- Script untuk menghitung total bayar otomatis --}}
<script>
    // Fungsi untuk menghitung total bayar
    function hitungTotalBayar() {
        const harga = parseFloat(document.getElementById('harga').value) || 0;
        const jumlahPeserta = parseInt(document.getElementById('jumlah_peserta').value) || 0;
        const diskonInfo = document.getElementById('diskon-info');
        const diskon5 = document.getElementById('diskon-5');
        const diskon15 = document.getElementById('diskon-15');
        const diskonNone = document.getElementById('diskon-none');

        let subtotal = harga * jumlahPeserta;
        let diskonOtomatis = 0;

        // Cek apakah diskon otomatis 15% berlaku
        if (jumlahPeserta >= 10) {
            diskonOtomatis = 0.15 * subtotal;
            diskon5.classList.add('d-none');
            diskon15.classList.remove('d-none');
            diskonNone.classList.add('d-none');
        }
        // Cek apakah diskon otomatis 5% berlaku
        else if (jumlahPeserta > 3) {
            diskonOtomatis = 0.05 * subtotal;
            diskon5.classList.remove('d-none');
            diskon15.classList.add('d-none');
            diskonNone.classList.add('d-none');
        } else {
            diskon5.classList.add('d-none');
            diskon15.classList.add('d-none');
            diskonNone.classList.remove('d-none');
        }

        let total = subtotal - diskonOtomatis;
        if (total < 0) total = 0;

        document.getElementById('total_bayar').value = Math.floor(total);
    }

    // Ketika pengguna memilih paket wisata
    document.getElementById('id_paket').addEventListener('change', function() {
        var harga = this.options[this.selectedIndex].getAttribute('data-harga');

        // Jika harga ditemukan, masukkan ke kolom harga
        if (harga) {
            document.getElementById('harga').value = harga;
            hitungTotalBayar(); // Update total bayar otomatis setelah harga diubah
        }
    });

    // Tambahkan event listener untuk perubahan jumlah peserta
    document.getElementById('jumlah_peserta').addEventListener('input', hitungTotalBayar);
</script>
@endsection
