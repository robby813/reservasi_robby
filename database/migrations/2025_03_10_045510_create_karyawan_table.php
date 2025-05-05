<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_karyawan', 50);
            $table->text('alamat');
            $table->string('no_hp', 15);
            $table->enum('jabatan', ['administrasi', 'bendahara', 'pemilik']);
            $table->timestamps();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('karyawan');
    }
};
