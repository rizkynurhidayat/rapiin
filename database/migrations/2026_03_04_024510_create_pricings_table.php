<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pricings', function (Blueprint $table) {
            $table->id();
            // Header Section (Hanya baris ID 1 yang menggunakan ini)
            $table->string('section_judul_awal')->nullable();
            $table->string('section_highlight_text')->nullable();
            $table->string('section_judul_akhir')->nullable();
            $table->string('section_sub_judul')->nullable();

            // Detail Kartu Paket
            $table->string('nama_paket');
            $table->text('deskripsi');
            $table->string('harga_lengkap'); 
            $table->string('teks_button');
            $table->text('fitur'); // Disimpan dalam string dipisah koma
            $table->string('icon')->nullable(); // Jika isi (👑), kartu jadi active/biru
            
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('pricings');
    }
};