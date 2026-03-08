<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            // Bagian Judul yang dipecah agar admin mudah edit kata "RAPIIN"
            $table->string('judul_awal');      // Contoh: "Kasir digital simpel buat"
            $table->string('highlight_text');  // Contoh: "RAPIIN"
            $table->string('judul_akhir');     // Contoh: "bisnis kamu"
            
            // Kolom pendukung lainnya
            $table->string('button_text');       // Teks kecil di bawah judul atau teks di tombol
            // $table->string('button');          // Label tombol (misal: "Mulai Sekarang")
            $table->string('image');           // Path/nama file gambar
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heroes');
    }
};