<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Opsi extends Model
{
    protected $fillable = [
        'judul',
        'image',
        'teks_button',
        'title',
        'isi',
    ];
}
