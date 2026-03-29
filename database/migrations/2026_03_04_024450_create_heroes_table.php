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
            // Bagian Judul
            $table->string('judul_awal');      
            $table->string('highlight_text');  
            $table->string('judul_akhir');     
            
            // Kolom pendukung
            $table->string('button');       
            
            // Tambahkan nullable() di sini
            $table->string('image')->nullable(); 
            
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