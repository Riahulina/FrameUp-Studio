<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Frame;
use App\Models\DetailPemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function create()
    {
        $frames = Frame::all();
        return view('pemesanan.form', compact('frames'));
    }

    public function store(Request $request)
    {
        // ✅ VALIDASI (biar aman)
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'frame' => 'required|array|min:1'
        ]);

        // ✅ ambil jurusan (dropdown / manual)
        $jurusan = $request->jurusan_select == 'lainnya'
            ? $request->jurusan_manual
            : $request->jurusan_select;

        // ✅ ambil 1 frame sebagai FK utama
        $idFrameUtama = $request->frame[0];

        // ✅ simpan pemesanan
        $pemesanan = Pemesanan::create([
            'nama_pelanggan' => $request->nama,
            'no_hp' => $request->no_hp,
            'jurusan' => $jurusan,
            'id_frame' => $idFrameUtama, // 🔥 WAJIB isi
            'tanggal_pemesanan' => $request->tanggal,
            'status' => 'menunggu'
        ]);

        // ✅ simpan banyak frame ke detail
        foreach ($request->frame as $id_frame) {
            DetailPemesanan::create([
                'id_pemesanan' => $pemesanan->id_pemesanan,
                'id_frame' => $id_frame,
                'qty' => $request->qty[$id_frame] ?? 1
            ]);
        }

        return redirect('/pembayaran/' . $pemesanan->id_pemesanan);
    }
}