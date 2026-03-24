@extends('layouts.app')

@section('title', 'Struk Pembayaran')

@section('content')
<div class="max-w-xl mx-auto py-16 px-6">

    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <!-- HEADER -->
        <div class="bg-navy text-white text-center py-6">
            <h2 class="text-2xl font-bold tracking-wide">FRAME UP</h2>
            <p class="text-sm text-lavender">Struk Pembayaran</p>
        </div>

        <div class="p-6">

            <!-- INFO -->
            <div class="space-y-1 text-sm text-gray-700">
                <p><span class="font-semibold text-navy">Nama:</span> {{ $pemesanan->nama_pelanggan }}</p>
                <p><span class="font-semibold text-navy">Tanggal:</span> {{ $pembayaran->tanggal_bayar ?? '-' }}</p>
                <p><span class="font-semibold text-navy">Metode:</span> {{ $pembayaran->metode_pembayaran ?? '-' }}</p>
            </div>

            <div class="border-t border-dashed my-4"></div>

            <!-- ITEM LIST -->
            @php $total = 0; @endphp

            <div class="space-y-2 text-sm">
                @foreach($pemesanan->details as $item)
                @if($item->frame)
                @php
                $subtotal = $item->frame->harga * $item->qty;
                $total += $subtotal;
                @endphp

                <div class="flex justify-between bg-gray-50 p-2 rounded-lg">
                    <span class="text-gray-700">
                        {{ $item->frame->nama_frame }} 
                        <span class="text-xs text-warm">(x{{ $item->qty }})</span>
                    </span>
                    <span class="font-medium text-navy">
                        Rp {{ number_format($subtotal,0,',','.') }}
                    </span>
                </div>

                @endif
                @endforeach
            </div>

            <div class="border-t border-dashed my-4"></div>

            <!-- TOTAL -->
            <div class="flex justify-between items-center bg-lavender/40 p-3 rounded-lg">
                <span class="font-semibold text-navy">Total Bayar</span>
                <span class="text-lg font-bold text-navy">
                    Rp {{ number_format($total,0,',','.') }}
                </span>
            </div>

            <!-- STATUS -->
            <div class="text-center mt-6">
                <p class="inline-block bg-lime text-navy px-4 py-2 rounded-full text-sm font-semibold shadow">
                    ✔ Pesanan Berhasil Dibuat
                </p>
            </div>

            <!-- BUTTON -->
            <div class="flex justify-center mt-5">
                <a href="{{ url('/struk/'.$pemesanan->id_pemesanan.'/download') }}"
                   class="bg-pink text-white px-5 py-2 rounded-lg shadow hover:scale-105 transition">
                    ⬇️ Unduh Struk PDF
                </a>
            </div>

        </div>

    </div>

</div>
@endsection