<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPemesanan extends Model
{
    protected $fillable = [
        'id_pemesanan',
        'id_frame',
        'qty'
    ];

    
    public function frame()
    {
        return $this->belongsTo(Frame::class, 'id_frame');
    }

    
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan');
    }
}