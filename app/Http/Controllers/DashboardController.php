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

        return view('admin.dashboard', compact(
            'total_pemesanan',
            'total_frame',
            'total_pendapatan'
        ));
    }
}