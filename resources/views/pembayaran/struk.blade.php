@extends('layouts.app')

@section('title', 'Struk Pembayaran')

@section('content')
<div class="max-w-xl mx-auto py-20 px-6">

    <div class="bg-white p-6 rounded shadow">

        <h2 class="text-2xl font-bold text-center mb-4">
            STRUK PEMBAYARAN
        </h2>

        <hr class="mb-4">

        <p><b>Nama:</b> {{ $pemesanan->nama_pelanggan }}</p>
        <p><b>Tanggal:</b> {{ $pembayaran->tanggal_bayar }}</p>
        <p><b>Metode:</b> {{ $pembayaran->metode_pembayaran }}</p>

        <hr class="my-4">

        @php $total = 0; @endphp

        @foreach($pemesanan->details as $item)
            @if($item->frame)
                @php
                    $subtotal = $item->frame->harga * $item->qty;
                    $total += $subtotal;
                @endphp

                <div class="flex justify-between">
                    <span>{{ $item->frame->nama_frame }} (x{{ $item->qty }})</span>
                    <span>Rp {{ number_format($subtotal,0,',','.') }}</span>
                </div>
            @endif
        @endforeach

        <hr class="my-4">

        <div class="flex justify-between font-bold text-lg">
            <span>Total Bayar</span>
            <span>Rp {{ number_format($total,0,',','.') }}</span>
        </div>

        <p class="text-center mt-6 text-green-600 font-bold">
            ✔ Pembayaran Berhasil
        </p>

        <!-- tombol print -->
        <button onclick="window.print()" 
            class="w-full mt-4 bg-blue-500 text-white p-3 rounded">
            Print Struk
        </button>

    </div>

</div>
@endsection