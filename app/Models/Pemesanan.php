<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


    class Pemesanan extends Model
{
    protected $table = 'pemesanans';
    protected $primaryKey = 'id_pemesanan';

    protected $fillable = [
        'nama_pelanggan',
        'no_hp',
        'jurusan',
        'id_frame',
        'tanggal_pemesanan',
        'status'
    ];

    public function frame()
    {
        return $this->belongsTo(Frame::class,'id_frame');
    }
}

