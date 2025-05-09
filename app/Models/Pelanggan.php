<?php

// app/Models/Pelanggan.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';
    protected $fillable = [
        'nama_lengkap', 'no_hp', 'alamat', 'id_user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function reservasi()
    {
        return $this->hasMany(Reservasi::class, 'id_pelanggan');
    }

    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class, 'id_user');
    }
    
}




