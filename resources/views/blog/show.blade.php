@extends('fe.masters')

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">{{ $paket->nama_paket }}</h3>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Paket Wisata</a></li>
            <li class="breadcrumb-item active text-white">{{ \Illuminate\Support\Str::limit($paket->nama_paket, 20) }}</li>
        </ol>
    </div>
</div>
<!-- Header End -->

<!-- Paket Detail Start -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="d-flex flex-wrap">
                <!-- Gambar -->
                <div class="me-4 mb-4" style="max-width: 45%;">
                    <img src="{{ asset('storage/'.$paket->foto1) }}" alt="{{ $paket->nama_paket }}" class="img-fluid rounded" style="max-height: 500px; object-fit: cover;">
                </div>

                <!-- Info Paket -->
                <div style="flex: 1;">
                    <h2 class="fw-bold mb-4">{{ $paket->nama_paket }}</h2>

                    <!-- Harga -->
                    <div class="mb-3">
                        <h5 class="text-muted mb-1"><i class="fas fa-tags text-primary me-2"></i>Harga Paket</h5>
                        <p class="text-primary fs-5 fw-semibold">Rp {{ number_format($paket->harga_per_pack, 0, ',', '.') }} /Hari</p>
                    </div>

                    <!-- Fasilitas -->
                    <div class="mb-3">
                        <h5 class="text-muted mb-1"><i class="fas fa-check-circle text-success me-2"></i>Fasilitas</h5>
                        <p style="line-height: 1.8;">{{ $paket->fasilitas }}</p>
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <h5 class="text-muted mb-1"><i class="fas fa-info-circle text-warning me-2"></i>Deskripsi</h5>
                        <p style="line-height: 1.8;">{{ $paket->deskripsi }}</p>
                    </div>

                    <!-- Form Reservasi -->
                    <form action="{{ route('reservasi.store') }}" method="POST" class="mt-3">
                        @csrf
                        <input type="hidden" name="paket_wisata_id" value="{{ $paket->id }}">

                        <div class="row g-2 align-items-end">
                            <!-- Tanggal Mulai -->
                            <div class="col-auto">
                                <label for="tanggal_mulai" class="form-label mb-0" style="font-size: 0.9rem;">Tanggal Mulai</label>
                                <input type="datetime-local" name="tanggal_mulai" id="tanggal_mulai" class="form-control form-control-sm @error('tanggal_mulai') is-invalid @enderror" required>
                                @error('tanggal_mulai')
                                    <div class="invalid-feedback" style="font-size: 0.8rem;">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tanggal Selesai -->
                            <div class="col-auto">
                                <label for="tanggal_selesai" class="form-label mb-0" style="font-size: 0.9rem;">Tanggal Selesai</label>
                                <input type="datetime-local" name="tanggal_selesai" id="tanggal_selesai" class="form-control form-control-sm @error('tanggal_selesai') is-invalid @enderror" required>
                                @error('tanggal_selesai')
                                    <div class="invalid-feedback" style="font-size: 0.8rem;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Jumlah Peserta & Total Harga -->
                        <div class="row g-2 align-items-end mt-2">
                            <!-- Jumlah Peserta -->
                            <div class="col-auto">
                                <label for="jumlah_peserta" class="form-label mb-0" style="font-size: 0.9rem;">Jumlah Peserta</label>
                                <input type="number" name="jumlah_peserta" id="jumlah_peserta" min="1" value="1" class="form-control form-control-sm @error('jumlah_peserta') is-invalid @enderror" required>
                                @error('jumlah_peserta')
                                    <div class="invalid-feedback" style="font-size: 0.8rem;">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Total Harga -->
                            <div class="col-auto">
                                <label class="form-label mb-0" style="font-size: 0.9rem;">Total Harga</label>
                                <input type="text" id="total_harga_display" class="form-control form-control-sm bg-light" readonly>
                                <input type="hidden" name="total_harga" id="total_harga">
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="mt-3">
                            <button type="submit" class="btn btn-success rounded-pill px-4 py-2">
                                <i class="fas fa-check me-2"></i> Submit Reservasi
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Tombol Kembali -->
            <div class="mt-4 d-flex gap-3">
                <a href="{{ route('home.index') }}" class="btn btn-outline-primary rounded-pill px-4 py-2">
                    <i class="fas fa-arrow-left me-2"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Paket Detail End -->

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const hargaPerPack = {{ $paket->harga_per_pack }};
        const jumlahPesertaInput = document.getElementById('jumlah_peserta');
        const totalHargaDisplay = document.getElementById('total_harga_display');
        const totalHargaHidden = document.getElementById('total_harga');

        function hitungTotalHarga() {
            let peserta = parseInt(jumlahPesertaInput.value);
            if (isNaN(peserta) || peserta < 1) peserta = 1;

            let total = hargaPerPack * peserta;
            let diskon = 0;

            if (peserta >= 10) {
                diskon = 0.15;
            } else if (peserta >= 3) {
                diskon = 0.05;
            }

            let totalSetelahDiskon = total - (total * diskon);
            totalHargaDisplay.value = 'Rp ' + totalSetelahDiskon.toLocaleString('id-ID');
            totalHargaHidden.value = Math.round(totalSetelahDiskon);
        }

        jumlahPesertaInput.addEventListener('input', hitungTotalHarga);
        jumlahPesertaInput.addEventListener('change', hitungTotalHarga);
        hitungTotalHarga(); // run on page load
    });
</script>
@endpush
