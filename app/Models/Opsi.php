<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Opsi extends Model
{
    protected $fillable = [
        'image',
        'judul',
        'subtitle',
        'title',
        'button',   
    ];
}
