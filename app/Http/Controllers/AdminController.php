<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{
    public function chart(Request $request)
    {
        $bulan = $request->bulan ?? now()->month;

        $data = DB::table('pemesanans')
            ->selectRaw('DATE(tanggal_pemesanan) as tanggal, COUNT(*) as total')
            ->whereMonth('tanggal_pemesanan', $bulan)
            ->groupByRaw('DATE(tanggal_pemesanan)')
            ->orderBy('tanggal')
            ->get();

        return response()->json($data);
    }
}
