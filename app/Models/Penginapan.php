<?php

// app/Models/Penginapan.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penginapan extends Model
{
    use HasFactory;

    // Tentukan nama tabel
    protected $table = 'penginapan';

    // Tentukan kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'nama_penginapan',
        'deskripsi',
        'fasilitas',
        'foto1',
        'foto2',
        'foto3',
        'foto4',
        'foto5',
    ];
}

