@extends('layouts.admin')

@section('content')

{{-- HERO --}}
<section class="pt-24 pb-12 bg-navy relative overflow-hidden rounded-2xl shadow-lg mb-10">
    <div class="max-w-7xl mx-auto px-6 text-center">

        <span class="text-lime/70 text-xs tracking-[0.3em] uppercase mb-2 block">
            Admin Panel
        </span>

        <h1 class="text-5xl lg:text-6xl text-lavender font-bold mb-2">
            Frame <span class="italic text-pink">Management</span>
        </h1>

        <p class="text-warm text-lg max-w-xl mx-auto">
            Kelola semua data frame yang tersedia di FrameUp Studio.
        </p>
    </div>
</section>

{{-- ALERT --}}
@if(session('success'))
<div class="bg-green-100 text-green-700 p-3 rounded-lg mb-6 shadow">
    {{ session('success') }}
</div>
@endif

{{-- ACTION --}}
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl text-center lg:text-3xl text-lavender font-bold mb-2">
        Daftar <span class="italic text-pink">Frame</span></h2>

    <a href="/frame/create"
        class="bg-lime text-navy px-4 py-2 rounded-xl shadow hover:scale-105 transition">
        + Tambah Frame
    </a>
</div>

{{-- TABLE CARD --}}
<div class="bg-white rounded-2xl shadow-lg overflow-hidden">

    <table class="w-full text-sm">

        {{-- HEAD --}}
        <thead class="bg-lavender/10 text-navy uppercase text-xs tracking-wider">
            <tr>
                <th class="px-4 py-3 text-left">Preview</th>
                <th class="px-4 py-3 text-left">Nama</th>
                <th class="px-4 py-3 text-left">Jurusan</th>
                <th class="px-4 py-3 text-left">Harga</th>
                <th class="px-4 py-3 text-center">Aksi</th>
            </tr>
        </thead>

        {{-- BODY --}}
        <tbody class="divide-y divide-lavender/20">

            @forelse($frames as $f)
            <tr class="hover:bg-lavender/5 transition">

                {{-- IMAGE --}}
                <td class="px-4 py-3">
                    <img src="{{ asset($f->gambar_frame) }}"
                        class="w-16 h-16 object-cover rounded-lg shadow">
                </td>

                {{-- DATA --}}
                <td class="px-4 py-3 font-medium text-gray-700">
                    {{ $f->nama_frame }}
                </td>

                <td class="px-4 py-3 text-gray-600">
                    {{ $f->jurusan }}
                </td>

                <td class="px-4 py-3 text-green-600 font-semibold">
                    Rp {{ number_format($f->harga,0,',','.') }}
                </td>

                {{-- ACTION --}}
                <td class="px-4 py-3 text-center space-x-2">

                    <a href="/frame/delete/{{ $f->id_frame }}"
                        class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition"
                        onclick="return confirm('Yakin hapus?')">
                        Hapus
                    </a>

                </td>

            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center p-6 text-gray-400">
                    Belum ada data frame
                </td>
            </tr>
            @endforelse

        </tbody>

    </table>

</div>

@endsection