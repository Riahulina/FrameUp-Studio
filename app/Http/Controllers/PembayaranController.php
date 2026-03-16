<?php

namespace App\Http\Controllers;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function store(Request $request)
    {
        Pembayaran::create([
            'id_pemesanan' => $request->id_pemesanan,
            'metode_pembayaran' => $request->metode,
            'total_bayar' => $request->total,
            'tanggal_bayar' => now(),
            'status_bayar' => 'lunas'
        ]);

        return redirect('/dashboard')->with('success','Pembayaran berhasil');
    }
}