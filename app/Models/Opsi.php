<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Opsi extends Model
{
    protected $fillable = [
        'judul',
        'sub_judul',
        'label',
        'icon',
        'kategori',
        'harga',
        'button',
        'isi' 
    ];
}
