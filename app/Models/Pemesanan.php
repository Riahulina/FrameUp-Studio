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
    'id_frame', // 🔥 WAJIB ADA INI
    'tanggal_pemesanan',
    'status'
];

    // relasi ke detail
    public function details()
    {
        return $this->hasMany(DetailPemesanan::class, 'id_pemesanan');
    }
}