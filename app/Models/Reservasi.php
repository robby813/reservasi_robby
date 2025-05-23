<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $table = 'reservasi';

    protected $fillable = [
        'id_pelanggan',
        'id_paket',
        'tgl_reservasi',
        'harga',
        'jumlah_peserta',
        'diskon',
        'total_bayar',
        'file_bukti_tf',
        'status_reservasi_wisata'
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function paket()
    {
        return $this->belongsTo(PaketWisata::class, 'id_paket');
    }
}
