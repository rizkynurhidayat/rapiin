<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_judul_awal', 
        'section_highlight_text', 
        'section_judul_akhir', 
        'section_sub_judul',
        'nama_paket', 
        'deskripsi', 
        'harga_lengkap', 
        'teks_button', 
        'fitur', 
        'icon'
    ];
}