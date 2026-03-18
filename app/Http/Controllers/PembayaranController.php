<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Pemesanan;

class PembayaranController extends Controller
{
    public function create($id)
    {
        $pemesanan = Pemesanan::with('details.frame')->findOrFail($id);
        return view('pembayaran.form', compact('pemesanan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'metode' => 'required',
            'id_pemesanan' => 'required',
        ]);

        $pembayaran = new Pembayaran();
        $pembayaran->id_pemesanan = $request->id_pemesanan;
        $pembayaran->metode_pembayaran = $request->metode;
        $pembayaran->total_bayar = $request->total;
        $pembayaran->tanggal_bayar = now();
        $pembayaran->status_bayar = 'menunggu';

        // upload bukti
        if ($request->hasFile('bukti')) {
            $path = $request->file('bukti')->store('bukti_pembayaran', 'public');
            $pembayaran->bukti = $path;
        }

        $pembayaran->save();

        // 🔥 redirect ke struk
        return redirect('/struk/' . $request->id_pemesanan);
    }

    // 🔥 FUNCTION STRUK (HARUS DI LUAR)
    public function struk($id)
    {
        $pemesanan = Pemesanan::with('details.frame')->findOrFail($id);
        $pembayaran = Pembayaran::where('id_pemesanan', $id)->first();

        return view('pembayaran.struk', compact('pemesanan', 'pembayaran'));
    }
}