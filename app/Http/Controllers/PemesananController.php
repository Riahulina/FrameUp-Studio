<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Frame;
use App\Models\DetailPemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    // =========================
    // LIST ADMIN
    // =========================
    public function index()
    {
        $data = Pemesanan::latest()->get();
        return view('admin.pemesanan', compact('data'));
    }

    // =========================
    // FORM PEMESANAN
    // =========================
    public function create(Request $request)
    {
        $frames = Frame::all();
        $selectedFrame = null;

        // 🔥 ambil dari Works (auto pilih)
        if ($request->frame_id) {
            $selectedFrame = Frame::find($request->frame_id);
        }

        return view('pemesanan.form', compact('frames', 'selectedFrame'));
    }

    // =========================
    // SIMPAN PEMESANAN
    // =========================
    public function store(Request $request)
    {
        // 🔥 VALIDASI (WAJIB)
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'tanggal' => 'required',
            'frame' => 'nullable|array'
        ]);

        // 🔥 JURUSAN FLEXIBLE
        $jurusan = $request->jurusan_select == 'lainnya'
            ? $request->jurusan_manual
            : $request->jurusan_select;

        // 🔥 AMBIL FRAME (AMAN)
        $frames = $request->frame ?? [];

        if (count($frames) === 0) {
            return back()->with('error', 'Pilih minimal 1 frame!');
        }

        //  FRAME UTAMA (ANTI NULL)
        $idFrameUtama = $frames[0];

        //  SIMPAN PEMESANAN
        $pemesanan = Pemesanan::create([
            'nama_pelanggan' => $request->nama,
            'no_hp' => $request->no_hp,
            'jurusan' => $jurusan,
            'id_frame' => $idFrameUtama,
            'tanggal_pemesanan' => $request->tanggal,
            'status' => 'menunggu'
        ]);

        //  SIMPAN DETAIL
        foreach ($frames as $id_frame) {
            DetailPemesanan::create([
                'id_pemesanan' => $pemesanan->id_pemesanan,
                'id_frame' => $id_frame,
                'qty' => $request->qty[$id_frame] ?? 1
            ]);
        }

        //  REDIRECT
        return redirect('/pembayaran/' . $pemesanan->id_pemesanan);
    }

    // =========================
    // UPDATE STATUS
    // =========================
    public function updateStatus($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        $pemesanan->status = $pemesanan->status == 'menunggu'
            ? 'selesai'
            : 'menunggu';

        $pemesanan->save();

        return redirect()->back();
    }
    public function chart(Request $request)
    {
        $bulan = $request->bulan ?? now()->month;

        $data = \DB::table('pemesanans')
            ->selectRaw('DATE(tanggal_pemesanan) as tanggal, COUNT(*) as total')
            ->whereMonth('tanggal_pemesanan', $bulan)
            ->groupByRaw('DATE(tanggal_pemesanan)')
            ->orderBy('tanggal')
            ->get();

        return response()->json($data);
    }
}
