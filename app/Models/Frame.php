<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


   class Frame extends Model
{
    protected $table = 'frames';
    protected $primaryKey = 'id_frame';

    protected $fillable = [
        'nama_frame',
        'jurusan',
        'gambar_frame',
        'harga'
    ];
}
