<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Hero;
use App\Models\Pricing;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        User::create([
            'name' => 'Admin Rapiin',
            'email' => 'admin@rapiin.com',
            'password' => Hash::make('password123'),
        ]);

        Hero::create([
            'judul_awal' => 'Kasir digital simpel buat',
            'highlight_text' => 'RAPIIN',
            'judul_akhir' => 'bisnis kamu',
            'deskripsi' => 'Uji Coba Gratis 7 Hari →',
            'button' => 'Mulai Sekarang',
            'image' => 'rapiin/foto/Screenshot.png',
        ]);

        // Paket 1 (Trial + Header)
        Pricing::create([
            'section_judul_awal' => 'Mulai',
            'section_highlight_text' => 'RAPIIN',
            'section_judul_akhir' => 'Bisnis Kamu Sekarang',
            'section_sub_judul' => 'Pilih paket sesuai kebutuhan bisnis Anda.',
            'nama_paket' => 'trial',
            'deskripsi' => 'Coba gratis tanpa komitmen.',
            'harga_lengkap' => 'Gratis / 7 Hari',
            'teks_button' => 'Coba Sekarang',
            'fitur' => 'Kasir Dasar, Laporan Harian, 1 User',
            'icon' => null,
        ]);

        // Paket 2 (Best Seller)
        Pricing::create([
            'nama_paket' => 'starter',
            'deskripsi' => 'Cocok untuk UMKM berkembang.',
            'harga_lengkap' => 'Rp100.000 / Bulan',
            'teks_button' => 'Pilih Paket',
            'fitur' => 'Kasir Pro, Stok Barang, Laporan Lengkap, Support WA',
            'icon' => '👑',
        ]);

        // Paket 3 (Bundling)
        Pricing::create([
            'nama_paket' => 'bundling',
            'deskripsi' => 'Lengkap dengan printer thermal.',
            'harga_lengkap' => 'Rp400.000 / Bulan',
            'teks_button' => 'Beli Bundling',
            'fitur' => 'Semua Fitur Pro, Printer Bluetooth, Kertas Roll, Prioritas',
            'icon' => null,
        ]);
    }
}