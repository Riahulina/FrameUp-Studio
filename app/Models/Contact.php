<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'company',
        'budget',
        'services',
        'message',
        'rating'
    ];

    // konversi services JSON ke array otomatis
    protected $casts = [
        'services' => 'array',
    ];
}
