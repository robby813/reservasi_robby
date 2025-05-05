<?php
// app/Models/ObyekWisata.php
// app/Models/ObyekWisata.php

// app/Models/ObyekWisata.php
// app/Models/ObyekWisata.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObyekWisata extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_wisata', 'deskripsi_wisata', 'id_kategori_wisata',
        'fasilitas', 'foto1', 'foto2', 'foto3', 'foto4'
    ];

    // Tentukan nama tabel yang sesuai
    protected $table = 'obyek_wisata'; // Tambahkan ini

    // Relasi dengan KategoriWisata
    public function kategori()
    {
        return $this->belongsTo(KategoriWisata::class, 'id_kategori_wisata');
    }
}




