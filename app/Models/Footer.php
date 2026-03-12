<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $fillable = [
       'facebook',
       'instagram',
       'twitter',
       'linkedin',
       'whatsapp',
       'tiktok',
       'email',
       'kontak',
       'alamat',
    ];
}
