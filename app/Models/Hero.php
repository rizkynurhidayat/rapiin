<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $fillable = [
        'judul_awal', 
        'highlight_text', 
        'judul_akhir', 
        'button',
        'image'
    ];
}