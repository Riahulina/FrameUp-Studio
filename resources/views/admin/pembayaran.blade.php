@extends('layouts.admin')

@section('content')

{{-- HERO --}}
<section class="pt-20 pb-10 bg-navy rounded-2xl shadow-lg mb-8 text-center">
    <span class="text-lime/70 text-xs tracking-[0.3em] uppercase block mb-2">
        Admin Panel
    </span>

    <h1 class="text-4xl lg:text-5xl font-bold text-lavender">
        Data <span class="italic text-pink">Pembayaran</span>
    </h1>

    <p class="text-warm mt-2">
        Kelola dan verifikasi pembayaran pelanggan
    </p>
</section>

{{-- TITLE --}}
<div class="px-6 py-6 border-b text-center">
    <h2 class="text-2xl lg:text-3xl font-bold text-navy">
        Daftar <span class="italic text-pink">Pembayaran</span>
    </h2>
    <p class="text-sm text-gray-400 mt-1">
        Data transaksi pelanggan terbaru
    </p>
</div>

<div class="overflow-x-auto">
    <table class="w-full text-sm">

        {{-- HEAD --}}
        <thead class="bg-lavender/10 text-navy uppercase text-xs tracking-wider">
            <tr>
                <th class="px-4 py-3 text-left">Nama</th>
                <th class="px-4 py-3 text-left">Metode</th>
                <th class="px-4 py-3 text-left">Total</th>
                <th class="px-4 py-3 text-left">Tanggal</th>
                <th class="px-4 py-3 text-center">Bukti</th>
                <th class="px-4 py-3 text-center">Status</th>
            </tr>
        </thead>

        {{-- BODY --}}
        <tbody class="divide-y divide-lavender/20">

            @forelse($data as $d)
            <tr class="hover:bg-lavender/5 transition">

                {{-- Nama --}}
                <td class="px-4 py-3 font-medium text-gray-700">
                    {{ $d->pemesanan->nama_pelanggan ?? '-' }}
                </td>

                {{-- Metode --}}
                <td class="px-4 py-3 text-gray-600">
                    {{ $d->metode_pembayaran }}
                </td>

                {{-- Total --}}
                <td class="px-4 py-3 text-green-600 font-semibold">
                    Rp {{ number_format($d->total_bayar,0,',','.') }}
                </td>

                {{-- Tanggal --}}
                <td class="px-4 py-3 text-gray-500">
                    {{ $d->tanggal_bayar }}
                </td>

                {{-- Bukti --}}
                <td class="px-4 py-3 text-center">
                    @if($d->bukti)
                    <a href="{{ asset('storage/'.$d->bukti) }}" target="_blank">
                        <img src="{{ asset('storage/'.$d->bukti) }}"
                            class="w-16 h-16 object-cover rounded-lg shadow hover:scale-110 transition mx-auto">
                    </a>
                    @else
                    <span class="text-gray-400 text-xs">-</span>
                    @endif
                </td>

                {{-- STATUS (FIXED) --}}
                <td class="px-4 py-3 text-center">
                    <a href="/admin/pembayaran/{{ $d->id_pembayaran }}/status"
                        class="px-3 py-1 rounded 
        {{ $d->status_bayar == 'lunas' ? 'bg-green-500 text-white' : 'bg-yellow-500 text-white' }}">
                        {{ $d->status_bayar }}
                    </a>
                </td>

            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center p-6 text-gray-400">
                    Belum ada pembayaran
                </td>
            </tr>
            @endforelse

        </tbody>

    </table>
</div>

@endsection