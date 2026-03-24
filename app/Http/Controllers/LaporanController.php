<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class LaporanController extends Controller
{
    // =========================
    // 📊 HALAMAN LAPORAN
    // =========================
    public function index()
    {
        // =====================
        // 📦 PESANAN
        // =====================
        $totalPesanan = Pemesanan::count();
        $pesananSelesai = Pemesanan::where('status', 'selesai')->count();
        $pesananMenunggu = Pemesanan::where('status', 'menunggu')->count();

        // =====================
        // 💳 PEMBAYARAN
        // =====================
        $pembayaranLunas = Pembayaran::where('status_bayar', 'lunas')->count();
        $pembayaranPending = Pembayaran::where('status_bayar', 'menunggu')->count();

        // 💰 Pendapatan
        $pendapatanLunas = Pembayaran::where('status_bayar', 'lunas')->sum('total_bayar');
        $pendapatanPending = Pembayaran::where('status_bayar', 'menunggu')->sum('total_bayar');

        $totalPotensi = $pendapatanLunas + $pendapatanPending;

        // =====================
        // 📅 LAPORAN HARIAN
        // =====================
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();

        $pendapatanHariIni = Pembayaran::whereDate('tanggal_bayar', $today)
            ->where('status_bayar', 'lunas')
            ->sum('total_bayar');

        $pendapatanKemarin = Pembayaran::whereDate('tanggal_bayar', $yesterday)
            ->where('status_bayar', 'lunas')
            ->sum('total_bayar');

        $selisih = $pendapatanHariIni - $pendapatanKemarin;

        $persen = $pendapatanKemarin > 0
            ? ($selisih / $pendapatanKemarin) * 100
            : 0;

        return view('admin.laporan', compact(
            'totalPesanan',
            'pesananSelesai',
            'pesananMenunggu',
            'pembayaranLunas',
            'pembayaranPending',
            'pendapatanLunas',
            'pendapatanPending',
            'totalPotensi',

            // 🔥 tambahan
            'pendapatanHariIni',
            'pendapatanKemarin',
            'selisih',
            'persen'
        ));
    }

    // =========================
    // 📄 DOWNLOAD PDF
    // =========================
    public function downloadPdf()
    {
        // =====================
        // 📦 PESANAN
        // =====================
        $totalPesanan = Pemesanan::count();
        $pesananSelesai = Pemesanan::where('status', 'selesai')->count();
        $pesananMenunggu = Pemesanan::where('status', 'menunggu')->count();

        // =====================
        // 💳 PEMBAYARAN
        // =====================
        $pembayaranLunas = Pembayaran::where('status_bayar', 'lunas')->count();
        $pembayaranPending = Pembayaran::where('status_bayar', 'menunggu')->count();

        // 💰 Pendapatan
        $pendapatanLunas = Pembayaran::where('status_bayar', 'lunas')->sum('total_bayar');
        $pendapatanPending = Pembayaran::where('status_bayar', 'menunggu')->sum('total_bayar');

        $totalPotensi = $pendapatanLunas + $pendapatanPending;

        // =====================
        // 📅 LAPORAN HARIAN
        // =====================
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();

        $pendapatanHariIni = Pembayaran::whereDate('tanggal_bayar', $today)
            ->where('status_bayar', 'lunas')
            ->sum('total_bayar');

        $pendapatanKemarin = Pembayaran::whereDate('tanggal_bayar', $yesterday)
            ->where('status_bayar', 'lunas')
            ->sum('total_bayar');

        $selisih = $pendapatanHariIni - $pendapatanKemarin;

        $pdf = Pdf::loadView('admin.laporan_pdf', compact(
            'totalPesanan',
            'pesananSelesai',
            'pesananMenunggu',
            'pembayaranLunas',
            'pembayaranPending',
            'pendapatanLunas',
            'pendapatanPending',
            'totalPotensi',

            // 🔥 tambahan
            'pendapatanHariIni',
            'pendapatanKemarin',
            'selisih'
        ));

        return $pdf->download('laporan-frameup.pdf');
    }
}