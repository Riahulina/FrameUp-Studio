<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Pembayaran;
use App\Models\Frame;

class DashboardController extends Controller
{
    public function index()
    {
        $total_pemesanan = Pemesanan::count();
        $total_frame = Frame::count();
        $total_pendapatan = Pembayaran::sum('total_bayar');

        // 🔥 PESANAN TERBARU
        $pesanan_terbaru = Pemesanan::latest()->take(5)->get();

        // 🔥 DATA CHART (pendapatan per hari)
        $chart = Pembayaran::selectRaw('DATE(tanggal_bayar) as tanggal, SUM(total_bayar) as total')
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        return view('admin.dashboard', compact(
            'total_pemesanan',
            'total_frame',
            'total_pendapatan',
            'pesanan_terbaru',
            'chart'
        ));
    }
}
