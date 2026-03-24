<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Pemesanan;
use Barryvdh\DomPDF\Facade\Pdf;

class PembayaranController extends Controller
{
    // =========================
    // ADMIN: LIST PEMBAYARAN
    // =========================
    public function index()
    {
        $data = Pembayaran::with('pemesanan')->latest()->get();
        return view('admin.pembayaran', compact('data'));
    }

    // =========================
    // FORM PEMBAYARAN
    // =========================
    public function create($id)
    {
        $pemesanan = Pemesanan::with('details.frame')->findOrFail($id);
        return view('pembayaran.form', compact('pemesanan'));
    }

    // =========================
    // SIMPAN PEMBAYARAN
    // =========================
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

        // Upload bukti (opsional)
        if ($request->hasFile('bukti')) {
            $path = $request->file('bukti')->store('bukti_pembayaran', 'public');
            $pembayaran->bukti = $path;
        }

        $pembayaran->save();

        // 🔥 Redirect ke STRUK (bukan balik ke form)
        return redirect('/pembayaran/' . $request->id_pemesanan)
            ->with('success', 'Pesanan berhasil dibuat!');
    }

    // =========================
    // TAMPILKAN STRUK
    // =========================
    public function struk($id)
    {
        $pemesanan = Pemesanan::with('details.frame')->findOrFail($id);

        $pembayaran = Pembayaran::where('id_pemesanan', $id)->first();

        //  kalau belum ada pembayaran → buat otomatis
        if (!$pembayaran) {
            $pembayaran = Pembayaran::create([
                'id_pemesanan' => $id,
                'metode_pembayaran' => 'Transfer / Manual',
                'total_bayar' => $pemesanan->details->sum(function ($item) {
                    return $item->qty * $item->frame->harga;
                }),
                'tanggal_bayar' => now(),
                'status_bayar' => 'menunggu'
            ]);
        }

        return view('pembayaran.struk', compact('pemesanan', 'pembayaran'));
    }

    // =========================
    // DOWNLOAD STRUK PDF
    // =========================
    public function download($id)
    {
        $pemesanan = Pemesanan::with('details.frame')->findOrFail($id);
        $pembayaran = Pembayaran::where('id_pemesanan', $id)->first();

        $pdf = Pdf::loadView('pembayaran.struk_pdf', compact('pemesanan', 'pembayaran'));

        return $pdf->download('struk-' . $id . '.pdf');
    }

    public function updateStatus($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        // toggle status
        if ($pembayaran->status_bayar == 'menunggu') {
            $pembayaran->status_bayar = 'lunas';
        } else {
            $pembayaran->status_bayar = 'menunggu';
        }

        $pembayaran->save();

        return back()->with('success', 'Status berhasil diubah');
    }
}
