<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survei extends Model
{
    protected $table = 'surveis';
    protected $primaryKey = 'id_survei';

    protected $fillable = [
        'nama',
        'email',
        'rating',
        'pesan'
    ];
}
