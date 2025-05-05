<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('berita');
            $table->dateTime('tgl_post');
            $table->foreignId('id_kategori_berita')->constrained('kategori_berita')->onDelete('cascade');
            $table->text('foto')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('berita');
    }
};
