<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $fillable = [
        'twitter',
        'instagram',
        'facebook',
        'tiktok',
        'email',
        'kontak',
        'alamat',
        'latitude',
        'longitude'
    ];
}
