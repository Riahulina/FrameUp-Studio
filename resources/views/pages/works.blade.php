@extends('layouts.app')

@section('title', 'Works — FrameUp Studio')

@section('content')

{{-- Hero --}}
<section class="pt-36 pb-20 bg-navy relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-10 left-0 w-80 h-80 bg-lavender/8 blob-3 rounded-full blur-3xl animate-float-slow"></div>
    </div>
    <div class="max-w-7xl mx-auto px-6 lg:px-10 relative z-10">
        <span class="font-mono text-lime/70 text-xs tracking-[0.3em] uppercase mb-6 block animate-fade-in">Portfolio</span>
        <h1 class="font-display font-black text-6xl lg:text-8xl text-lavender leading-[0.85] mb-8 animate-slide-up">
            Selected<br><span class="italic text-pink">Works</span>
        </h1>
        <p class="font-body text-warm text-lg max-w-xl animate-slide-up delay-200">
            A curated collection of projects we're proud to have been part of.
        </p>
    </div>
</section>

{{-- Filter --}}
<section class="py-8 bg-navy border-b border-lavender/10 sticky top-20 z-40 backdrop-blur-xl">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="flex gap-3 overflow-x-auto pb-1 scrollbar-hide">
            @foreach(['All', 'Branding', 'Photography', 'UI/UX', 'Motion', 'Web', 'Print'] as $filter)
            <button class="font-mono text-xs px-5 py-2.5 rounded-full border transition-all duration-200 whitespace-nowrap
                               {{ $filter === 'All'
                                    ? 'bg-lime text-navy border-lime font-semibold'
                                    : 'border-lavender/20 text-lavender/60 hover:border-lavender/50 hover:text-lavender' }}">
                {{ $filter }}
            </button>
            @endforeach
        </div>
    </div>
</section>

{{-- Works Grid --}}
<section class="py-16 bg-navy">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($frames as $i => $frame)
            <a href="#" class="card-hover reveal group cursor-pointer">
                <div class="bg-cream rounded-3xl overflow-hidden aspect-[4/3] relative flex flex-col justify-between p-8 border border-lavender/5">

                    {{-- Decorative --}}
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute top-6 right-6 w-24 h-24 border-2 border-current rounded-full"></div>
                        <div class="absolute bottom-16 left-6 w-14 h-14 border border-current rotate-45"></div>
                        <div class="absolute top-1/2 left-1/2 w-32 h-32 bg-current rounded-full blur-2xl opacity-30"></div>
                    </div>

                    {{-- Number --}}
                    <div class="absolute top-5 right-8 font-display font-black text-7xl opacity-8 text-navy z-0">
                        {{ str_pad($i+1, 2, '0', STR_PAD_LEFT) }}
                    </div>

                    {{-- Top: Tags --}}
                    <div class="flex justify-between items-start relative z-10">
                        <span class="font-mono text-navy/50 text-xs border border-navy/20 rounded-full px-3 py-1 bg-navy/5">
                            {{ $frame->jurusan }}
                        </span>
                    </div>

                    {{-- Bottom: Title --}}
                    <div class="relative z-10">
                        <div class="font-mono text-white-300 text-xs uppercase tracking-widest mb-2">
                            {{ $frame->jurusan }} — {{ $frame->created_at->format('Y') }}
                        </div>
                        <div class="font-display font-bold text-navy text-2xl lg:text-3xl group-hover:text-charcoal transition-colors duration-300 leading-tight">
                            {{ $frame->nama_frame }}
                        </div>
                    </div>

                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20 bg-navy text-center border-t border-lavender/10">
    <div class="max-w-2xl mx-auto px-6 reveal">
        <h2 class="font-display font-black text-4xl text-lavender mb-4">Like what you <span class="italic text-pink">see?</span></h2>
        <p class="font-body text-warm mb-8">Let's create something extraordinary together.</p>

        {{-- Button to Pemesanan Page --}}
        <a href="{{ url('/pemesanan/create') }}"
            class="inline-flex items-center gap-2 bg-lime-400 text-white-300 font-mono font-bold px-8 py-4 rounded-full hover:scale-105 transition-all duration-300 shadow-xl shadow-lime-400/20">
            Pesan Sekarang →
        </a>
    </div>
</section>

@endsection