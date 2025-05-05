<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('kategori_berita', function (Blueprint $table) {
            $table->id();
            $table->string('kategori_berita', 255);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('kategori_berita');
    }
};
