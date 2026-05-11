@extends('layouts.app')

@section('title', 'Pembayaran')

@section('content')
<div class="max-w-xl mx-auto py-20 px-6">

    <h2 class="text-3xl font-bold mb-6 text-center">Pembayaran</h2>

    <!-- DATA CUSTOMER -->
    <div class="mb-6 p-4 bg-gray-100 rounded">
        <p><b>Nama:</b> {{ $pemesanan->nama_pelanggan }}</p>
    </div>

    <!-- DETAIL PESANAN -->
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
            <span>{{ $item->frame->nama_frame }} (x{{ $qty }})</span>
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

    <!-- FORM -->
    <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
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

        <!-- QRIS -->
        <div id="qrisSection" class="hidden mb-4 text-center">
            <p class="mb-2 font-semibold">Scan QRIS untuk pembayaran:</p>

            <img src="{{ asset('images/qris.jpeg') }}"
                class="mx-auto w-48 mb-3 border rounded">

            <input type="file" name="bukti" accept="image/*"
                class="w-full border p-2 rounded mb-2">

            <small class="text-gray-500">
                Upload bukti pembayaran setelah transfer
            </small>
        </div>

        <!-- TRANSFER BANK -->
        <div id="transferSection" class="hidden mb-4 text-center bg-gray-100 p-4 rounded">
            <p class="mb-2 font-semibold">
                Untuk metode ini, silakan hubungi admin kami
            </p>

            <p class="mb-3 text-sm text-gray-600">
                Klik tombol di bawah untuk langsung chat admin
            </p>

            <a id="waLink" href="#" target="_blank"
                class="inline-block bg-lime text-dark px-4 py-2 rounded">
                Hubungi Admin via WhatsApp
            </a>
        </div>

        <!-- BUTTON NORMAL -->
        <button id="btnBayar" class="w-full bg-lime text-dark p-3 rounded">
            Buat Pesanan
        </button>

        <!-- BUTTON KHUSUS TRANSFER -->
        <a id="btnTransfer" href="#"
            class="hidden w-full bg-lime text-dark p-3 rounded text-center block mt-2">
            Saya Sudah Menghubungi Admin
        </a>

    </form>

</div>

<!-- SCRIPT -->
<script>
    document.addEventListener("DOMContentLoaded", function() {

        const metode = document.getElementById('metodeBayar');
        const qrisSection = document.getElementById('qrisSection');
        const transferSection = document.getElementById('transferSection');

        const btnBayar = document.getElementById('btnBayar');
        const btnTransfer = document.getElementById('btnTransfer');
        const waLink = document.getElementById('waLink');

        //  Cegah error kalau elemen tidak ada
        if (!metode) return;

        metode.addEventListener('change', function() {

            //  RESET SEMUA
            if (qrisSection) qrisSection.classList.add('hidden');
            if (transferSection) transferSection.classList.add('hidden');
            if (btnBayar) btnBayar.classList.remove('hidden');
            if (btnTransfer) btnTransfer.classList.add('hidden');

            // ======================
            //  QRIS
            // ======================
            if (this.value === 'Qris') {
                if (qrisSection) qrisSection.classList.remove('hidden');
            }

            // ======================
            //  TRANSFER BANK
            // ======================
            if (this.value === 'Transfer Bank') {

                if (transferSection) transferSection.classList.remove('hidden');
                if (btnBayar) btnBayar.classList.add('hidden');
                if (btnTransfer) btnTransfer.classList.remove('hidden');

                //  DATA DINAMIS DARI BLADE
                let nama = "{{ $pemesanan->nama_pelanggan }}";
                let total = "{{ $total }}";
                let id = "{{ $pemesanan->id_pemesanan }}";

                //  FORMAT PESAN WA
                let pesan = `Halo Admin,%0A
                    Saya ${nama}%0A
                    Ingin melakukan pembayaran sebesar Rp ${total}%0A
                    Metode: Transfer Bank%0A
                    ID Pesanan: ${id}`;

                let nomor = "6283895072955";

                let url = `https://wa.me/${nomor}?text=${pesan}`;

                // SET LINK
                if (waLink) waLink.href = url;
                if (btnTransfer) btnTransfer.href = `/struk/${id}`;
            }

            // ======================
            //  CASH (OPSIONAL)
            // ======================
            if (this.value === 'Cash') {
                // tetap pakai tombol bayar biasa
            }

        });

    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    document.addEventListener("DOMContentLoaded", function() {

        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Pesanan berhasil dibuat, Unduh Struk Untuk Transaksi Lebih Lanjut',
            showCancelButton: true,
            confirmButtonText: 'Lihat Struk',
            cancelButtonText: 'Nanti saja',
            confirmButtonColor: '#22c55e'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/struk/{{ $pemesanan->id_pemesanan }}";
            }
        });

    });
</script>
@endif

@endsection