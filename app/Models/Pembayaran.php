<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayarans';
    protected $primaryKey = 'id_pembayaran';

    protected $fillable = [
        'id_pemesanan',
        'metode_pembayaran',
        'total_bayar',
        'tanggal_bayar',
        'status_bayar'
        
    ];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class,'id_pemesanan');
    }

    

}
