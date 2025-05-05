<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('obyek_wisata', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wisata', 255);
            $table->text('deskripsi_wisata');
            $table->foreignId('id_kategori_wisata')->constrained('kategori_wisata')->onDelete('cascade');
            $table->string('fasilitas');
            $table->text('foto1')->nullable();
            $table->text('foto2')->nullable();
            $table->text('foto3')->nullable();
            $table->text('foto4')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('obyek_wisata');
    }
};
