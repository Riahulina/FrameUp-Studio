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

    // 🔥 TAMBAH INI
    public function frame()
    {
        return $this->belongsTo(Frame::class, 'id_frame');
    }

    // optional (biar lengkap)
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan');
    }
}