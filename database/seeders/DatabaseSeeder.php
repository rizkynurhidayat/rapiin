<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Hero;
use App\Models\Pricing;
use App\Models\Footer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. User - Admin Login
        User::create([
            'name' => 'Admin Rapiin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
        ]);

        // 2. Hero Section
        Hero::create([
          'judul'     => 'Kasir digital simpel buat RAPIIN bisnis kamu', 
          'deskripsi' => 'Uji Coba Gratis 7 Hari →',
          'image'     => 'rapiin/foto/Screenshot.png',
          'button'    => 'Mulai Sekarang',
      ]);


        // 3. Pricing Section
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

        Pricing::create([
            'nama_paket' => 'starter',
            'deskripsi' => 'Cocok untuk UMKM berkembang.',
            'harga_lengkap' => 'Rp100.000 / Bulan',
            'teks_button' => 'Pilih Paket',
            'fitur' => 'Kasir Pro, Stok Barang, Laporan Lengkap, Support WA',
            'icon' => '👑',
        ]);

        Pricing::create([
            'nama_paket' => 'bundling',
            'deskripsi' => 'Lengkap dengan printer thermal.',
            'harga_lengkap' => 'Rp400.000 / Bulan',
            'teks_button' => 'Beli Bundling',
            'fitur' => 'Semua Fitur Pro, Printer Bluetooth, Kertas Roll, Prioritas',
            'icon' => null,
        ]);

        // 4. Footer Section - DATA SUDAH LENGKAP
        Footer::create([
            'twitter'   => 'https://twitter.com/rapiin',
            'instagram' => 'https://instagram.com/rapiin',
            'facebook'  => 'https://facebook.com/rapiin',
            'linkedin'  => 'https://linkedin.com/company/rapiin', 
            'whatsapp'  => 'https://wa.me/6287812066967',         
            'tiktok'    => 'https://tiktok.com/@rapiin',
            'email'     => 'contact@techade.id',
            'kontak'    => '+6287812066967',
            'alamat'    => 'Palm Asri 2 Blk. G No.16, Pedagangan, Kecamatan Dukuhwaru, Kabupaten Tegal, Jawa Tengah, 52451 Indonesia',
            'latitude'  => '-6.976366', 
            'longitude' => '109.120838',
        ]);
    }
}