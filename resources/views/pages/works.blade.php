@extends('layouts.app')

@section('title', 'Works — FrameUp Studio')

@section('content')

{{-- HERO --}}
<section class="pt-36 pb-20 bg-navy relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-10 left-0 w-80 h-80 bg-lavender/8 blob-3 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-10 relative z-10">
        <span class="font-mono text-lime/70 text-xs tracking-[0.3em] uppercase mb-6 block">
            Portfolio
        </span>

        <h1 class="font-display font-black text-6xl lg:text-8xl text-lavender leading-[0.85] mb-8">
            Selected<br><span class="italic text-pink">Works</span>
        </h1>

        <p class="font-body text-warm text-lg max-w-xl">
            A curated collection of projects we're proud to have been part of.
        </p>
    </div>
</section>

{{-- WORKS GRID --}}
<section class="py-16 bg-navy">
    <div class="max-w-6xl mx-auto px-6 lg:px-10">

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">

            @forelse($frames as $frame)
            <div class="group">

                <div class="bg-cream rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition duration-300 max-w-xs mx-auto">

                    {{-- IMAGE --}}
                    <div class="h-56 bg-white flex items-center justify-center p-3">
                        <img src="{{ asset($frame->gambar_frame) }}"
                            class="max-w-full max-h-full object-contain group-hover:scale-105 transition duration-500">
                    </div>

                    {{-- CONTENT --}}
                    <div class="p-4">

                        {{-- TAG + YEAR --}}
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-[11px] px-3 py-1 rounded-full bg-navy/10 text-navy font-mono">
                                {{ $frame->jurusan }}
                            </span>

                            <span class="text-[11px] text-gray-400">
                                {{ optional($frame->created_at)->format('Y') ?? '-' }}
                            </span>
                        </div>

                        {{-- TITLE --}}
                        <h3 class="text-lg font-bold text-navy group-hover:text-pink transition">
                            {{ $frame->nama_frame }}
                        </h3>

                        {{-- PRICE --}}
                        <p class="text-sm text-green-600 mt-1 font-semibold">
                            Rp {{ number_format($frame->harga,0,',','.') }}
                        </p>

                        {{-- BUTTON --}}
                        <a href="{{ url('/pemesanan/create?frame_id='.$frame->id_frame) }}"
                            class="mt-4 block text-center bg-lime text-navy font-bold py-2 rounded-lg hover:scale-105 transition">
                            Pesan Sekarang
                        </a>

                    </div>

                </div>

            </div>
            @empty

            <div class="col-span-3 text-center text-gray-400 py-20">
                Belum ada data frame
            </div>

            @endforelse

        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20 bg-navy text-center border-t border-lavender/10">
    <div class="max-w-2xl mx-auto px-6">

        <h2 class="font-display font-black text-4xl text-lavender mb-4">
            Like what you <span class="italic text-pink">see?</span>
        </h2>

        <p class="font-body text-warm mb-8">
            Let's create something extraordinary together.
        </p>

        <a href="{{ url('/pemesanan/create') }}"
            class="inline-flex items-center gap-2 bg-lime text-navy font-bold px-8 py-4 rounded-full hover:scale-105 transition shadow-lg">
            Pesan Sekarang →
        </a>

    </div>
</section>

@endsection