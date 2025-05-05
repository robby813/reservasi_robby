<?php

// app/Models/KategoriWisata.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriWisata extends Model
{
    use HasFactory;

    protected $table = 'kategori_wisata'; // Nama tabel

    protected $fillable = ['kategori_wisata']; // Kolom yang bisa diisi

    // Relasi jika ada hubungan dengan model lain, misalnya 'ObyekWisata'
    public function obyekWisata()
    {
        return $this->hasMany(ObyekWisata::class, 'id_kategori_wisata');
    }

}

