<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap', 255);
            $table->string('no_hp', 15);
            $table->text('alamat');
            $table->timestamps();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('pelanggan');
    }
};
