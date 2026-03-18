@extends('layouts.app')

@section('title', 'Pembayaran')

@section('content')
<div class="max-w-xl mx-auto py-20 px-6">

    <h2 class="text-3xl font-bold mb-6 text-center">Pembayaran</h2>

    <!-- DATA CUSTOMER -->
    <div class="mb-6 p-4 bg-gray-100 rounded">
        <p><b>Nama:</b> {{ $pemesanan->nama_pelanggan }}</p>
    </div>

    <!-- LIST FRAME -->
    <div class="mb-6 p-4 bg-gray-100 rounded">
        <p class="font-bold mb-2">Detail Pesanan:</p>

        @php $total = 0; @endphp

        @foreach($pemesanan->details as $item)
            @if($item->frame)
                @php
                    $harga = $item->frame->harga;
                    $qty = $item->qty;
                    $subtotal = $harga * $qty;
                    $total += $subtotal;
                @endphp

                <div class="flex justify-between mb-2">
                    <span>
                        {{ $item->frame->nama_frame }} (x{{ $qty }})
                    </span>
                    <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                </div>
            @endif
        @endforeach

        <hr class="my-2">

        <div class="flex justify-between font-bold text-lg">
            <span>Total</span>
            <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
        </div>
    </div>

    <!-- FORM PEMBAYARAN -->
    <form action="{{ url('/pembayaran') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id_pemesanan" value="{{ $pemesanan->id_pemesanan }}">
        <input type="hidden" name="total" value="{{ $total }}">

        <!-- METODE -->
        <select name="metode" id="metodeBayar" class="w-full border p-3 mb-4" required>
            <option value="">Pilih Metode</option>
            <option value="Transfer Bank">Transfer Bank</option>
            <option value="Qris">Qris</option>
            <option value="Cash">Cash</option>
        </select>

        <!-- QRIS SECTION -->
        <div id="qrisSection" class="hidden mb-4 text-center">

            <p class="mb-2 font-semibold">Scan QRIS untuk pembayaran:</p>

            <!-- 🔥 TARUH GAMBAR DI public/images/qris.png -->
            <img src="{{ asset('images/qris.png') }}" 
                 class="mx-auto w-48 mb-3 border rounded">

            <!-- UPLOAD BUKTI -->
            <input type="file" name="bukti" accept="image/*"
                class="w-full border p-2 rounded mb-2">

            <small class="text-gray-500">
                Upload bukti pembayaran setelah transfer
            </small>
        </div>

        <!-- BUTTON -->
        <button class="w-full bg-green-500 text-white p-3 rounded">
            Bayar Sekarang
        </button>

    </form>

</div>

<!-- SCRIPT -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const metode = document.getElementById('metodeBayar');
    const qrisSection = document.getElementById('qrisSection');

    metode.addEventListener('change', function () {
        if (this.value === 'Qris') {
            qrisSection.classList.remove('hidden');
        } else {
            qrisSection.classList.add('hidden');
        }
    });
});
</script>

@endsection