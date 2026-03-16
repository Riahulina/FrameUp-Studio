<?php

namespace App\Http\Controllers;
use App\Models\Pemesanan;
use App\Models\Frame;
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
        Pemesanan::create([
            'nama_pelanggan' => $request->nama,
            'no_hp' => $request->no_hp,
            'jurusan' => $request->jurusan,
            'id_frame' => $request->frame,
            'tanggal_pemesanan' => $request->tanggal,
            'status' => 'menunggu'
        ]);

        return redirect('/')->with('success','Pemesanan berhasil');
    }

    public function index()
    {
        $data = Pemesanan::with('frame')->get();
        return view('admin.pemesanan', compact('data'));
    }
}