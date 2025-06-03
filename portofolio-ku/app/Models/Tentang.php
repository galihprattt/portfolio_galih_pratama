<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    protected $fillable = ['deskripsi', 'foto', 'keahlian'];

    protected $casts = [
        'keahlian' => 'array',
    ];
}
