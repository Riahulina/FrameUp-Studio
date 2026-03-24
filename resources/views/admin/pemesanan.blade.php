@extends('layouts.admin')

@section('content')

{{-- HERO --}}
<section class="pt-20 pb-10 bg-navy rounded-2xl shadow-lg mb-8 text-center">
    <span class="text-lime/70 text-xs tracking-[0.3em] uppercase block mb-2">
        Admin Panel
    </span>

    <h1 class="text-4xl lg:text-5xl font-bold text-lavender">
        Data <span class="italic text-pink">Pemesanan</span>
    </h1>

    <p class="text-warm mt-2">
        Kelola semua pesanan pelanggan
    </p>
</section>

{{-- TABLE CARD --}}
<div class="bg-white rounded-2xl shadow-lg overflow-hidden">

    <div class="px-6 py-6 border-b text-center">
        <h2 class="text-2xl lg:text-3xl font-bold text-navy">
            Daftar <span class="italic text-pink">Pemesanan</span>
        </h2>
        <p class="text-sm text-gray-400 mt-1">
            Data transaksi pemesanan terbaru
        </p>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">

            {{-- HEAD --}}
            <thead class="bg-lavender/10 text-navy uppercase text-xs tracking-wider">
                <tr>
                    <th class="px-4 py-3 text-left">Nama</th>
                    <th class="px-4 py-3 text-left">No HP</th>
                    <th class="px-4 py-3 text-left">Jurusan</th>
                    <th class="px-4 py-3 text-left">Tanggal</th>
                    <th class="px-4 py-3 text-center">Status</th>
                </tr>
            </thead>

            {{-- BODY --}}
            <tbody class="divide-y divide-lavender/20">

                @forelse($data as $p)
                <tr class="hover:bg-lavender/5 transition">

                    {{-- Nama --}}
                    <td class="px-4 py-3 font-medium text-gray-700">
                        {{ $p->nama_pelanggan }}
                    </td>

                    {{-- No HP --}}
                    <td class="px-4 py-3 text-gray-600">
                        {{ $p->no_hp }}
                    </td>

                    {{-- Jurusan --}}
                    <td class="px-4 py-3">
                        <span class="bg-lime/20 text-navy px-3 py-1 rounded-full text-xs font-semibold">
                            {{ $p->jurusan }}
                        </span>
                    </td>

                    {{-- Tanggal --}}
                    <td class="px-4 py-3 text-gray-500">
                        {{ $p->tanggal_pemesanan }}
                    </td>

                    {{-- Status --}}
                    <td class="px-4 py-3 text-center">
                        <a href="/pemesanan/status/{{ $p->id_pemesanan }}"
                            class="px-4 py-1 rounded-full text-white text-xs font-semibold shadow
                           transition hover:scale-105
                           {{ $p->status == 'menunggu' ? 'bg-yellow-500 hover:bg-yellow-600' : 'bg-green-500 hover:bg-green-600' }}">

                            {{ ucfirst($p->status) }}

                        </a>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center p-6 text-gray-400">
                        Belum ada data pemesanan
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>
    </div>

</div>

@endsection