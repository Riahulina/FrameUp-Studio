<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Frame;
use App\Models\DetailPemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    // 🔥 INI YANG KAMU BUTUH
    public function index()
    {
        $data = Pemesanan::latest()->get();
        return view('admin.pemesanan', compact('data'));
    }

    public function create()
    {
        $frames = Frame::all();
        return view('pemesanan.form', compact('frames'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'frame' => 'required|array|min:1'
        ]);

        $jurusan = $request->jurusan_select == 'lainnya'
            ? $request->jurusan_manual
            : $request->jurusan_select;

        $idFrameUtama = $request->frame[0];

        $pemesanan = Pemesanan::create([
            'nama_pelanggan' => $request->nama,
            'no_hp' => $request->no_hp,
            'jurusan' => $jurusan,
            'id_frame' => $idFrameUtama,
            'tanggal_pemesanan' => $request->tanggal,
            'status' => 'menunggu'
        ]);

  

        foreach ($request->frame as $id_frame) {
            DetailPemesanan::create([
                'id_pemesanan' => $pemesanan->id_pemesanan,
                'id_frame' => $id_frame,
                'qty' => $request->qty[$id_frame] ?? 1
            ]);
        }

        return redirect('/pembayaran/' . $pemesanan->id_pemesanan);
    }

    public function updateStatus($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        // toggle status
        $pemesanan->status = $pemesanan->status == 'menunggu' ? 'selesai' : 'menunggu';

        $pemesanan->save();

        return redirect()->back();
    }
}
