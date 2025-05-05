<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('paket_wisata', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket', 255);
            $table->text('deskripsi');
            $table->string('fasilitas', 255);
            $table->integer('harga_per_pack');
            $table->text('foto1')->nullable();
            $table->text('foto2')->nullable();
            $table->text('foto3')->nullable();
            $table->text('foto4')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('paket_wisata');
    }
};
