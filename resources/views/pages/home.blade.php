@extends('layouts.app')

@section('title', 'FrameUp Studio — Creative Design & Visual Storytelling')

@section('content')

{{-- ============================================================
     HERO SECTION
============================================================ --}}
<section class="relative min-h-screen bg-navy flex items-center overflow-hidden pt-20">

    {{-- Background blobs --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-1/4 -left-32 w-96 h-96 bg-lavender/10 blob-1 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-1/4 -right-32 w-96 h-96 bg-pink/10 blob-2 rounded-full blur-3xl animate-float-slow"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-lavender/3 rounded-full blur-[100px]"></div>
    </div>
    <div class="max-w-7xl mx-auto px-6 lg:px-10 relative z-10 w-full">
        <div class="grid lg:grid-cols-2 gap-12 items-center min-h-[calc(100vh-5rem)]">

            {{-- Left: Text --}}
            <div class="flex flex-col justify-center py-20 lg:py-0">
                <div class="inline-flex items-center gap-2 bg-lavender/10 border border-lavender/20 rounded-full px-4 py-2 mb-8 w-fit animate-fade-in">
                    <div class="w-2 h-2 bg-lime rounded-full animate-pulse"></div>
                    <span class="font-mono text-lavender/80 text-xs tracking-widest uppercase">Available for Projects</span>
                </div>

                <h1 class="font-display font-black text-5xl sm:text-6xl lg:text-7xl xl:text-8xl leading-[0.9] text-lavender mb-6 animate-slide-up">
                    We Frame<br>
                    <span class="italic text-pink">Your</span><br>
                    <span class="text-gradient">Vision</span>
                </h1>

                <p class="font-body text-warm text-base lg:text-lg leading-relaxed max-w-md mb-10 animate-slide-up delay-200">
                    FrameUp Studio is a creative design house specializing in brand identity, visual storytelling, and digital experiences that leave lasting impressions.
                </p>

                <div class="flex flex-wrap gap-4 animate-slide-up delay-300">
                    <a href="{{ url('/works') }}"
                       class="group inline-flex items-center gap-2 bg-lime text-navy font-mono font-bold text-sm px-7 py-4 rounded-full hover:bg-lime/90 hover:gap-4 transition-all duration-300 shadow-xl shadow-lime/20">
                        View Our Work
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="{{ url('/about') }}"
                       class="inline-flex items-center gap-2 border border-lavender/30 text-lavender font-mono text-sm px-7 py-4 rounded-full hover:bg-lavender/10 hover:border-lavender/60 transition-all duration-300">
                        Tell Me More
                    </a>
                </div>
            </div>

            {{-- Right: Photo Collage Visual --}}
            <div class="hidden lg:flex items-center justify-center relative">

                {{-- Ambient glow behind photos --}}
                <div class="absolute w-96 h-96 bg-lavender/10 rounded-full blur-[60px] pointer-events-none"></div>
                <div class="absolute -top-8 right-0 w-40 h-40 bg-pink/15 rounded-full blur-[40px] pointer-events-none"></div>

                {{-- 2×2 Photo Grid --}}
                <div class="relative grid grid-cols-2 gap-3 w-[22rem]">

                    {{-- Photo 1 — top left, tilted slightly left --}}
                    <div class="photo-card relative overflow-hidden rounded-2xl aspect-[4/5] shadow-2xl shadow-navy/50
                                rotate-[-2deg] hover:rotate-0 hover:scale-105
                                transition-all duration-500 ease-out cursor-pointer group">
                        <img src="{{ asset('/work/1.png') }}"
                            alt="Studio event"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                            onerror="this.closest('.photo-card').classList.add('photo-fallback')">
                        <div class="absolute inset-0 bg-gradient-to-t from-navy/60 via-transparent to-transparent
                                    opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        {{-- Shine overlay --}}
                        <div class="absolute inset-0 bg-gradient-to-br from-white/8 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>

                    {{-- Photo 2 — top right, tilted slightly right --}}
                    <div class="photo-card relative overflow-hidden rounded-2xl aspect-[4/5] shadow-2xl shadow-navy/50
                                rotate-[2.5deg] translate-y-3 hover:rotate-0 hover:translate-y-0 hover:scale-105
                                transition-all duration-500 ease-out cursor-pointer group">
                        <img src="{{ asset('/work/2.png') }}"
                            alt="Team photo"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                            onerror="this.closest('.photo-card').classList.add('photo-fallback')">
                        <div class="absolute inset-0 bg-gradient-to-t from-navy/60 via-transparent to-transparent
                                    opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="absolute inset-0 bg-gradient-to-br from-white/8 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>

                    {{-- Photo 3 — bottom left, slight right tilt --}}
                    <div class="photo-card relative overflow-hidden rounded-2xl aspect-[4/5] shadow-2xl shadow-navy/50
                                rotate-[1.5deg] -translate-y-2 hover:rotate-0 hover:translate-y-0 hover:scale-105
                                transition-all duration-500 ease-out cursor-pointer group">
                        <img src="{{ asset('/work/3.png') }}"
                            alt="Workshop"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                            onerror="this.closest('.photo-card').classList.add('photo-fallback')">
                        <div class="absolute inset-0 bg-gradient-to-t from-navy/60 via-transparent to-transparent
                                    opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="absolute inset-0 bg-gradient-to-br from-white/8 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>

                    {{-- Photo 4 — bottom right, slight left tilt --}}
                    <div class="photo-card relative overflow-hidden rounded-2xl aspect-[4/5] shadow-2xl shadow-navy/50
                                rotate-[-1.5deg] hover:rotate-0 hover:scale-105
                                transition-all duration-500 ease-out cursor-pointer group">
                        <img src="{{ asset('/work/1.png') }}"
                            alt="Presentation"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                            onerror="this.closest('.photo-card').classList.add('photo-fallback')">
                        <div class="absolute inset-0 bg-gradient-to-t from-navy/60 via-transparent to-transparent
                                    opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="absolute inset-0 bg-gradient-to-br from-white/8 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>

                </div>

                {{-- Floating badge — top right --}}
                <div class="absolute -top-4 -right-4 bg-navy border border-lavender/20 rounded-2xl px-4 py-3 animate-float shadow-xl shadow-navy/50">
                    <div class="font-display font-bold text-lavender text-xl leading-none">98%</div>
                    <div class="font-body text-warm text-xs mt-0.5">Satisfaction</div>
                </div>

                {{-- Decorative dots --}}
                <div class="absolute -left-8 top-1/2 -translate-y-1/2 flex flex-col gap-2 pointer-events-none">
                    <div class="w-1.5 h-1.5 bg-lavender/30 rounded-full"></div>
                    <div class="w-1.5 h-1.5 bg-lavender/20 rounded-full"></div>
                    <div class="w-1.5 h-1.5 bg-lavender/10 rounded-full"></div>
                </div>

            </div>

            {{-- Fallback style for broken images --}}
            <style>
            .photo-fallback {
                background: linear-gradient(135deg, rgba(209,197,248,0.15) 0%, rgba(249,168,212,0.15) 100%);
                border: 1px solid rgba(209,197,248,0.15);
            }
            .photo-fallback img { display: none; }
            </style>

        </div>
    </div>
</section>


{{-- ============================================================
     MARQUEE / TICKER SECTION
============================================================ --}}
<section class="py-5 bg-pink overflow-hidden">
    <div class="marquee-track">
        @php $items2 = ['Brand Identity ✦', 'Photography ✦', 'Motion Design ✦', 'UI/UX ✦', 'Illustration ✦', 'Art Direction ✦', 'Print Design ✦', 'Web Design ✦']; @endphp
        @foreach(array_merge($items2, $items2) as $item)
            <span class="font-display font-bold text-navy text-xl mx-8 whitespace-nowrap italic">{{ $item }}</span>
        @endforeach
    </div>
</section>


{{-- ============================================================
     ABOUT / INTRO SECTION
============================================================ --}}
<section class="py-24 bg-cream relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute -top-20 -right-20 w-64 h-64 bg-lavender/20 blob-3 rounded-full blur-2xl"></div>
        <div class="absolute -bottom-10 -left-10 w-48 h-48 bg-pink/20 blob-1 rounded-full blur-2xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-10 relative z-10">
        <div class="grid lg:grid-cols-2 gap-16 items-center">

            {{-- Left: Visual grid --}}
            <div class="grid grid-cols-2 gap-4 reveal">
                <div class="col-span-2 bg-navy rounded-3xl p-8 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-lavender/10 blob-1 rounded-full blur-2xl"></div>
                    <div class="font-display font-black text-4xl text-lavender mb-2">Since <span class="text-pink italic">2019</span></div>
                    <p class="font-body text-warm text-sm">Crafting visual stories that connect brands with people around the world.</p>
                    <div class="mt-6 flex gap-3">
                        <div class="w-8 h-8 bg-lime rounded-full"></div>
                        <div class="w-8 h-8 bg-pink rounded-full"></div>
                        <div class="w-8 h-8 bg-lavender rounded-full"></div>
                    </div>
                </div>
                <div class="bg-lavender rounded-3xl p-6">
                    <div class="font-display font-black text-3xl text-navy mb-1">120<span class="text-pink">+</span></div>
                    <div class="font-body text-charcoal/60 text-xs">Projects Completed</div>
                </div>
                <div class="bg-pink rounded-3xl p-6">
                    <div class="font-display font-black text-3xl text-navy mb-1">40<span class="text-navy/60">+</span></div>
                    <div class="font-body text-charcoal/60 text-xs">Happy Clients</div>
                </div>
            </div>

            {{-- Right: Text --}}
            <div class="reveal delay-200">
                <span class="font-mono text-nude text-xs tracking-[0.3em] uppercase mb-4 block">About the Studio</span>
                <h2 class="font-display font-black text-4xl lg:text-5xl text-navy leading-tight mb-6">
                    Where Ideas<br>
                    Find Their <span class="italic text-dusty">Frame</span>
                </h2>
                <p class="font-body text-charcoal/70 text-base leading-relaxed mb-6">
                    FrameUp Studio is a Jakarta-based creative design studio founded on the belief that great design is more than aesthetics — it's a language that communicates your brand's deepest values.
                </p>
                <p class="font-body text-charcoal/70 text-base leading-relaxed mb-8">
                    We partner with startups, established brands, and creative businesses to build visual identities that stand the test of time and screens.
                </p>
                <a href="{{ url('/about') }}"
                   class="group inline-flex items-center gap-2 font-mono font-semibold text-navy text-sm border-2 border-navy rounded-full px-6 py-3 hover:bg-navy hover:text-lavender transition-all duration-300">
                    Our Story
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>


{{-- ============================================================
     SERVICES SECTION
============================================================ --}}
<section class="py-24 bg-navy relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-96 h-96 bg-lavender/5 rounded-full blur-[80px]"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-10 relative z-10">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-16">
            <div class="reveal">
                <span class="font-mono text-lime/70 text-xs tracking-[0.3em] uppercase mb-4 block">What We Do</span>
                <h2 class="font-display font-black text-4xl lg:text-5xl text-lavender leading-tight">
                    Our <span class="italic text-pink">Services</span>
                </h2>
            </div>
            <a href="{{ url('/services') }}"
               class="reveal delay-200 font-mono text-lavender/60 text-sm hover:text-lime flex items-center gap-2 transition-colors duration-200">
                View All Services →
            </a>
        </div>

        @php
            $services = [
                ['icon'=>'🎨','title'=>'Brand Identity',    'desc'=>'Logos, color systems, typography, and complete brand guidelines that make you memorable.',     'num'=>'01','delay'=>'delay-0'],
                ['icon'=>'📸','title'=>'Photography',       'desc'=>'Product, editorial, and lifestyle photography that captures your brand\'s authentic story.',    'num'=>'02','delay'=>'delay-100'],
                ['icon'=>'💻','title'=>'UI/UX Design',      'desc'=>'User-centered digital interfaces with intuitive experiences and stunning visual polish.',       'num'=>'03','delay'=>'delay-200'],
                ['icon'=>'🎬','title'=>'Motion Graphics',   'desc'=>'Animated logos, explainer videos, and social content that grab attention and spark emotion.',   'num'=>'04','delay'=>'delay-300'],
                ['icon'=>'🖨️','title'=>'Print & Packaging', 'desc'=>'Packaging design, stationery, and print materials that feel as good as they look.',            'num'=>'05','delay'=>'delay-400'],
                ['icon'=>'🌐','title'=>'Web Design',        'desc'=>'Beautiful, responsive websites built to convert visitors into loyal brand advocates.',         'num'=>'06','delay'=>'delay-500'],
            ];
        @endphp
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($services as $svc)
                <div class="card-hover reveal {{ $svc['delay'] }} group cursor-pointer">
                    <div class="bg-lavender/5 border border-lavender/10 rounded-3xl p-8 h-full hover:bg-lavender/10 hover:border-lavender/25 transition-all duration-300">
                        <div class="flex items-start justify-between mb-6">
                            <span class="text-3xl">{{ $svc['icon'] }}</span>
                            <span class="font-mono text-lavender/20 text-3xl font-black group-hover:text-lavender/40 transition-colors duration-300">{{ $svc['num'] }}</span>
                        </div>
                        <h3 class="font-display font-bold text-xl text-lavender mb-3 group-hover:text-lime transition-colors duration-300">{{ $svc['title'] }}</h3>
                        <p class="font-body text-warm text-sm leading-relaxed">{{ $svc['desc'] }}</p>
                        <div class="mt-6 flex items-center gap-2 text-lavender/40 group-hover:text-lime group-hover:gap-4 transition-all duration-300">
                            <span class="font-mono text-xs">Learn more</span>
                            <span>→</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ============================================================
     WORKS / PORTFOLIO — INFINITE EDITORIAL CAROUSEL
============================================================ --}}

@php
    $works = [
        ['title'=>'Bloom Coffee Co.',   'cat'=>'Brand Identity',  'year'=>'2024', 'tags'=>['Branding','Strategy'],     'bg'=>'bg-pink/40',     'accent'=>'#F9A8D4', 'img'=>'work/1.png'],
        ['title'=>'Wander Magazine',    'cat'=>'Editorial Design','year'=>'2024', 'tags'=>['Print','Typography'],       'bg'=>'bg-navy/80',     'accent'=>'#D1C5F8', 'img'=>'work/2.png'],
        ['title'=>'Aura Skincare',      'cat'=>'Packaging',       'year'=>'2023', 'tags'=>['Branding','Print'],         'bg'=>'bg-cream',       'accent'=>'#E8C4B8', 'img'=>'work/3.png'],
        ['title'=>'Mosaic App',         'cat'=>'UI/UX Design',    'year'=>'2023', 'tags'=>['UI/UX','Web'],              'bg'=>'bg-blush',       'accent'=>'#F0D0C8', 'img'=>'work/4.png'],
        ['title'=>'Terra Architecture', 'cat'=>'Web Design',      'year'=>'2023', 'tags'=>['Web','Branding'],           'bg'=>'bg-green/50',    'accent'=>'#A3C4A8', 'img'=>'work/5.png'],
        ['title'=>'Kita Foods',         'cat'=>'Brand Identity',  'year'=>'2022', 'tags'=>['Branding','Photography'],   'bg'=>'bg-dusty/40',    'accent'=>'#C4A882', 'img'=>'work/6.png'],
        ['title'=>'Pulse Studio',       'cat'=>'Motion Graphics', 'year'=>'2022', 'tags'=>['Motion','Art Direction'],   'bg'=>'bg-lavender/60', 'accent'=>'#B8A8E8', 'img'=>'work/7.png'],
    ];
    $total = count($works);
@endphp

<section id="works-section" class="py-24 bg-lavender relative overflow-hidden">

    {{-- Ambient blobs --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute bottom-0 right-0 w-80 h-80 bg-pink/15 rounded-full blur-[80px]"></div>
        <div class="absolute top-0 left-1/3 w-64 h-64 bg-dusty/10 rounded-full blur-[60px]"></div>
    </div>

    {{-- ── Header ───────────────────────────────────────────── --}}
    <div class="max-w-7xl mx-auto px-6 lg:px-10 mb-14 relative z-10">
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8">

            <div class="reveal">
                <span class="font-mono text-navy/40 text-[10px] tracking-[0.4em] uppercase mb-3 block">Portfolio</span>
                <h2 class="font-display font-black text-5xl lg:text-6xl text-navy leading-[0.88]">
                    Selected<br><span class="italic text-dusty">Works</span>
                </h2>
            </div>

            <div class="flex items-center gap-5 reveal">
                {{-- Slide counter --}}
                <div class="flex items-baseline gap-1 mr-2">
                    <span id="works-current" class="font-display font-black text-4xl text-navy leading-none tabular-nums">01</span>
                    <span class="font-mono text-navy/30 text-sm">/</span>
                    <span class="font-mono text-navy/30 text-sm tabular-nums">{{ str_pad($total, 2, '0', STR_PAD_LEFT) }}</span>
                </div>

                {{-- Controls --}}
                <div class="flex gap-2">
                    <button id="works-prev" aria-label="Previous"
                            class="works-btn group relative w-12 h-12 rounded-full overflow-hidden
                                   border border-navy/20 hover:border-navy/60 transition-colors duration-300">
                        <span class="works-btn-fill absolute inset-0 bg-navy scale-0 rounded-full transition-transform duration-300 origin-center"></span>
                        <span class="relative z-10 font-mono text-navy group-hover:text-lavender transition-colors duration-300 text-lg leading-none">←</span>
                    </button>
                    <button id="works-next" aria-label="Next"
                            class="works-btn group relative w-12 h-12 rounded-full overflow-hidden
                                   border border-navy/20 hover:border-navy/60 transition-colors duration-300">
                        <span class="works-btn-fill absolute inset-0 bg-navy scale-0 rounded-full transition-transform duration-300 origin-center"></span>
                        <span class="relative z-10 font-mono text-navy group-hover:text-lavender transition-colors duration-300 text-lg leading-none">→</span>
                    </button>
                </div>

                <a href="{{ url('/works') }}"
                   class="hidden sm:inline-flex items-center gap-2 font-mono text-navy/50 text-xs tracking-wider uppercase
                          hover:text-navy border-b border-transparent hover:border-navy/40 pb-px transition-all duration-200">
                    View All
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M7 17L17 7M17 7H7M17 7v10"/>
                    </svg>
                </a>
            </div>
        </div>

        {{-- Thin progress line --}}
        <div class="mt-8 h-px bg-navy/10 rounded-full overflow-hidden">
            <div id="works-progress-bar"
                 class="h-full bg-navy/50 rounded-full origin-left works-progress-bar"
                 data-init-width="{{ round((1/$total)*100, 4) }}"></div>
        </div>
    </div>

    {{-- Carousel viewport --}}
    <div id="works-viewport"
         class="overflow-hidden cursor-grab active:cursor-grabbing select-none relative z-10"
         role="region" aria-label="Portfolio carousel">

        <div id="works-track" class="flex will-change-transform" style="gap: 1.25rem; padding-left: max(1.5rem, calc((100vw - 80rem) / 2 + 2.5rem));">

            @foreach($works as $i => $work)
                @php $hasImg = file_exists(public_path($work['img'])); @endphp

                <article class="works-slide group flex-none cursor-pointer"
                         style="width: clamp(220px, 52vw, 340px);"
                         data-index="{{ $i }}">

                    {{-- Card shell --}}
                    <div class="works-card relative rounded-[1.5rem] overflow-hidden
                                transition-all duration-500 ease-out
                                group-hover:shadow-[0_20px_50px_-10px_rgba(26,32,74,0.25)]"
                         style="aspect-ratio: 3/4;">

                        {{-- Background --}}
                        <div class="{{ $work['bg'] }} absolute inset-0 transition-transform duration-700 group-hover:scale-[1.02]"></div>

                        {{-- Photo --}}
                        @if($hasImg)
                            <img src="{{ asset($work['img']) }}" alt="{{ $work['title'] }}"
                                 class="absolute inset-0 w-full h-full object-cover
                                        transition-transform duration-700 ease-out group-hover:scale-[1.06]
                                        pointer-events-none">
                            <div class="absolute inset-0 bg-gradient-to-b from-navy/5 via-transparent to-navy/70
                                        group-hover:to-navy/50 transition-colors duration-500"></div>
                        @else
                            {{-- Decorative fallback --}}
                            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                                <div class="relative w-32 h-32 opacity-20">
                                    <div class="absolute inset-0 border-2 border-current rounded-full"></div>
                                    <div class="absolute inset-4 border border-current rotate-45 rounded-sm"></div>
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div class="w-3 h-3 bg-current rounded-full"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-navy/50"></div>
                        @endif

                        {{-- Top meta row --}}
                        <div class="absolute top-6 left-6 right-6 flex items-start justify-between">
                            {{-- Tags --}}
                            <div class="flex flex-wrap gap-1.5">
                                @foreach($work['tags'] as $tag)
                                    <span class="font-mono text-[10px] tracking-wider uppercase
                                                 bg-white/15 backdrop-blur-md text-white/80
                                                 px-2.5 py-1 rounded-full border border-white/10">
                                        {{ $tag }}
                                    </span>
                                @endforeach
                            </div>
                            {{-- Arrow icon --}}
                            <div class="w-9 h-9 rounded-full bg-white/10 backdrop-blur-md border border-white/15
                                        flex items-center justify-center
                                        opacity-0 scale-75 group-hover:opacity-100 group-hover:scale-100
                                        transition-all duration-300">
                                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M7 17L17 7M17 7H7M17 7v10"/>
                                </svg>
                            </div>
                        </div>

                        {{-- Large index number --}}
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2
                                    font-display font-black text-[8rem] leading-none
                                    text-white/5 select-none pointer-events-none
                                    transition-all duration-500 group-hover:text-white/8 group-hover:scale-110">
                            {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                        </div>

                        {{-- Bottom info panel --}}
                        <div class="absolute bottom-0 left-0 right-0 p-6
                                    translate-y-2 group-hover:translate-y-0
                                    transition-transform duration-400 ease-out">
                            <div class="flex items-end justify-between gap-3">
                                <div>
                                    <p class="font-mono text-white/50 text-[10px] tracking-[0.2em] uppercase mb-2">
                                        {{ $work['cat'] }} · {{ $work['year'] }}
                                    </p>
                                    <h3 class="font-display font-black text-white text-xl lg:text-2xl leading-tight">
                                        {{ $work['title'] }}
                                    </h3>
                                </div>
                                {{-- Accent dot --}}
                                <div class="w-3 h-3 rounded-full flex-none mb-1 ring-2 ring-white/20 ring-offset-2 ring-offset-transparent works-accent-dot"
                                     data-color="{{ $work['accent'] }}"></div>
                            </div>
                        </div>

                    </div>{{-- /card shell --}}
                </article>
            @endforeach

        </div>{{-- /track --}}
    </div>{{-- /viewport --}}

    {{-- Dot strip --}}
    <div id="works-dots" class="flex justify-center gap-1.5 mt-8 relative z-10">
        @foreach($works as $i => $work)
            <button class="works-dot h-1 rounded-full transition-all duration-300
                           {{ $i === 0 ? 'w-8 bg-navy/60' : 'w-2 bg-navy/20' }}"
                    data-index="{{ $i }}"
                    aria-label="Slide {{ $i + 1 }}"></button>
        @endforeach
    </div>

</section>


{{-- ============================================================
     PROCESS SECTION
============================================================ --}}
<section class="py-24 bg-navy relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="text-center mb-16 reveal">
            <span class="font-mono text-lime/70 text-xs tracking-[0.3em] uppercase mb-4 block">How We Work</span>
            <h2 class="font-display font-black text-4xl lg:text-5xl text-lavender">
                Our <span class="italic text-pink">Process</span>
            </h2>
        </div>

        @php
            $steps = [
                ['num'=>'01','icon'=>'🔍','title'=>'Discover','desc'=>'We dig deep into your brand, audience, and goals through research and workshops.','delay'=>'delay-0'],
                ['num'=>'02','icon'=>'✏️','title'=>'Define',  'desc'=>'Strategy, concept, and creative direction locked in before a single pixel is placed.','delay'=>'delay-150'],
                ['num'=>'03','icon'=>'🎨','title'=>'Design',  'desc'=>'Iterative design with collaborative feedback cycles to perfect every detail.','delay'=>'delay-300'],
                ['num'=>'04','icon'=>'🚀','title'=>'Deliver', 'desc'=>'Final files, guidelines, and ongoing support to make sure you\'re set for success.','delay'=>'delay-500'],
            ];
        @endphp
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($steps as $step)
                <div class="reveal {{ $step['delay'] }} text-center">
                    <div class="relative inline-block mb-6">
                        <div class="w-20 h-20 bg-lavender/10 border border-lavender/20 rounded-3xl flex items-center justify-center text-3xl mx-auto">
                            {{ $step['icon'] }}
                        </div>
                        <div class="absolute -top-2 -right-2 w-7 h-7 bg-lime rounded-full flex items-center justify-center">
                            <span class="font-mono font-bold text-navy text-xs">{{ $step['num'] }}</span>
                        </div>
                    </div>
                    <h3 class="font-display font-bold text-xl text-lavender mb-3">{{ $step['title'] }}</h3>
                    <p class="font-body text-warm text-sm leading-relaxed">{{ $step['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ============================================================
     TESTIMONIALS SECTION
============================================================ --}}
<section class="py-24 bg-pink relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 left-0 w-64 h-64 bg-blush/50 blob-1 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-64 h-64 bg-dusty/30 blob-2 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-10 relative z-10">
        <div class="text-center mb-16 reveal">
            <span class="font-mono text-navy/50 text-xs tracking-[0.3em] uppercase mb-4 block">Kind Words</span>
            <h2 class="font-display font-black text-4xl lg:text-5xl text-navy">
                What Clients <span class="italic text-dusty">Say</span>
            </h2>
        </div>

        @php
            $testimonials = [
                ['text'=>'FrameUp completely transformed how we present our brand. The new identity feels premium, modern, and exactly us. Our customers noticed immediately.','name'=>'Arini Putri',  'role'=>'Founder, Bloom Coffee Co.','rating'=>5,'delay'=>'delay-0'],
                ['text'=>'Working with FrameUp was a joy from start to finish. Their process is thorough, their creativity is boundless, and the results speak for themselves.','name'=>'Dimas Pratama','role'=>'Creative Director, Wander',  'rating'=>5,'delay'=>'delay-100'],
                ['text'=>'We\'ve worked with many studios before. FrameUp is different — they genuinely care about your vision and go the extra mile to bring it to life.',   'name'=>'Nadia Sari',   'role'=>'CEO, Aura Skincare',          'rating'=>5,'delay'=>'delay-200'],
            ];
        @endphp
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($testimonials as $t)
                <div class="card-hover reveal {{ $t['delay'] }} bg-navy/10 backdrop-blur-sm border border-navy/10 rounded-3xl p-8">
                    <div class="flex gap-1 mb-6">
                        @for($s = 0; $s < $t['rating']; $s++)
                            <span class="text-lime text-sm">★</span>
                        @endfor
                    </div>
                    <p class="font-body text-navy text-sm leading-relaxed mb-8 italic">"{{ $t['text'] }}"</p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-navy/20 rounded-full flex items-center justify-center font-display font-bold text-navy text-sm">
                            {{ strtoupper(substr($t['name'], 0, 1)) }}
                        </div>
                        <div>
                            <div class="font-mono font-semibold text-navy text-sm">{{ $t['name'] }}</div>
                            <div class="font-body text-navy/60 text-xs">{{ $t['role'] }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ============================================================
     CTA SECTION
============================================================ --}}
<section class="py-24 bg-navy relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_rgba(209,197,248,0.08)_0%,_transparent_70%)]"></div>
    </div>

    <div class="max-w-4xl mx-auto px-6 lg:px-10 text-center relative z-10">
        <div class="reveal">
            <div class="sticker inline-block bg-lime text-navy font-mono font-bold text-xs px-4 py-2 rounded-full mb-8">
                👋 Let's Work Together
            </div>
            <h2 class="font-display font-black text-5xl lg:text-7xl text-lavender leading-[0.9] mb-8">
                Ready to<br><span class="italic text-pink">Frame</span><br>your story?
            </h2>
            <p class="font-body text-warm text-base lg:text-lg leading-relaxed max-w-xl mx-auto mb-12">
                We'd love to hear about your project. Let's schedule a free discovery call and explore how we can bring your vision to life.
            </p>
            <div class="flex flex-wrap gap-4 justify-center">
                <a href="{{ url('/works') }}"
                   class="group inline-flex items-center gap-3 bg-lime text-navy font-mono font-bold text-base px-10 py-5 rounded-full hover:bg-lime/90 transition-all duration-300 shadow-2xl shadow-lime/20 hover:shadow-lime/30 hover:scale-105">
                    Start a Project
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
                <a href="mailto:hello@frameupstudio.com"
                   class="inline-flex items-center gap-2 border border-lavender/30 text-lavender font-mono text-base px-10 py-5 rounded-full hover:bg-lavender/10 hover:border-lavender/60 transition-all duration-300">
                    Email Us
                </a>
            </div>
        </div>
    </div>
</section>


{{-- ============================================================
     STYLES
============================================================ --}}
<style>
.works-btn:hover .works-btn-fill { transform: scale(2); }
.works-progress-bar { transition: width 0.5s cubic-bezier(0.25, 0.1, 0.25, 1); }
</style>


{{-- ============================================================
     CAROUSEL JAVASCRIPT
============================================================ --}}
<script>
(function () {
    'use strict';

    /* ─── Apply data-attributes ────────────────────────── */
    var pb = document.getElementById('works-progress-bar');
    if (pb) { pb.style.width = (pb.getAttribute('data-init-width') || '14.28') + '%'; }
    document.querySelectorAll('.works-accent-dot').forEach(function(el) {
        el.style.backgroundColor = el.getAttribute('data-color');
    });

    /* ─── Elements ─────────────────────────────────────── */
    var viewport    = document.getElementById('works-viewport');
    var track       = document.getElementById('works-track');
    var progressBar = document.getElementById('works-progress-bar');
    var currentEl   = document.getElementById('works-current');
    var btnPrev     = document.getElementById('works-prev');
    var btnNext     = document.getElementById('works-next');
    var dotEls      = document.querySelectorAll('.works-dot');

    if (!viewport || !track) return;

    /* ─── Clone untuk infinite loop ────────────────────── */
    var origSlides = Array.from(track.children);
    var TOTAL      = origSlides.length;
    var CLONES     = Math.min(4, TOTAL);

    origSlides.slice(-CLONES).map(function(n){ return n.cloneNode(true); }).forEach(function(c){ track.prepend(c); });
    origSlides.slice(0, CLONES).map(function(n){ return n.cloneNode(true); }).forEach(function(c){ track.append(c); });

    /* ─── State ────────────────────────────────────────── */
    var posIdx    = CLONES;
    var realIdx   = 0;
    var animating = false;
    var autoTimer = null;

    /* ─── Geometry ─────────────────────────────────────── */
    function gap() { return 20; }
    function slideW() {
        var s = track.children[0];
        return s ? s.getBoundingClientRect().width + gap() : 280;
    }
    function targetX(idx) { return idx * slideW(); }

    /* ─── Render ───────────────────────────────────────── */
    function applyTransform(x, animate) {
        track.style.transition = animate
            ? 'transform 0.55s cubic-bezier(0.16,1,0.3,1)'
            : 'none';
        track.style.transform = 'translateX(-' + x + 'px)';
    }

    function updateUI() {
        currentEl.textContent = String(realIdx + 1).padStart(2, '0');

        progressBar.style.width = ((realIdx + 1) / TOTAL * 100) + '%';

        dotEls.forEach(function(d, i) {
            var active = i === realIdx;
            d.classList.toggle('w-8',        active);
            d.classList.toggle('bg-navy/60', active);
            d.classList.toggle('w-2',        !active);
            d.classList.toggle('bg-navy/20', !active);
        });

        Array.from(track.children).forEach(function(slide, i) {
            var isActive = i === posIdx;
            slide.style.transform  = isActive ? 'scale(1)'   : 'scale(0.94)';
            slide.style.opacity    = isActive ? '1'          : '0.55';
            slide.style.transition = 'transform 0.55s cubic-bezier(0.16,1,0.3,1), opacity 0.55s ease';
            slide.style.filter     = isActive ? 'none'       : 'grayscale(20%)';
        });
    }

    /* ─── Navigate ─────────────────────────────────────── */
    function goTo(idx, animated) {
        if (animated === undefined) animated = true;
        if (animating) return;
        animating = true;
        posIdx = idx;
        applyTransform(targetX(posIdx), animated);
    }

    track.addEventListener('transitionend', function() {
        animating = false;

        if (posIdx >= CLONES + TOTAL) {
            posIdx  = CLONES;
            realIdx = 0;
            applyTransform(targetX(posIdx), false);
        } else if (posIdx < CLONES) {
            posIdx  = CLONES + TOTAL - 1;
            realIdx = TOTAL - 1;
            applyTransform(targetX(posIdx), false);
        } else {
            realIdx = posIdx - CLONES;
        }

        updateUI();
    });

    function next() { goTo(posIdx + 1); }
    function prev() { goTo(posIdx - 1); }

    /* ─── Buttons ──────────────────────────────────────── */
    btnNext.addEventListener('click', function() { next(); resetAuto(); });
    btnPrev.addEventListener('click', function() { prev(); resetAuto(); });

    /* ─── Dots ─────────────────────────────────────────── */
    dotEls.forEach(function(dot) {
        dot.addEventListener('click', function() {
            var target = parseInt(dot.dataset.index, 10);
            realIdx = target;
            goTo(CLONES + target);
            updateUI();
            resetAuto();
        });
    });

    /* ─── Drag ─────────────────────────────────────────── */
    var dragStart = null;
    var dragDelta = 0;
    var baseX     = 0;

    function dragBegin(x) {
        if (animating) return;
        dragStart = x;
        dragDelta = 0;
        baseX     = targetX(posIdx);
        track.style.transition = 'none';
        clearAuto();
    }

    function dragMove(x) {
        if (dragStart === null) return;
        dragDelta = x - dragStart;
        var resistance = Math.abs(dragDelta) > slideW() ? 0.25 : 1;
        track.style.transform = 'translateX(-' + (baseX - dragDelta * resistance) + 'px)';
    }

    function dragEnd() {
        if (dragStart === null) return;
        var d = dragDelta;
        dragStart = null;
        if      (d < -45) next();
        else if (d >  45) prev();
        else               goTo(posIdx);
        resetAuto();
    }

    /* Mouse */
    viewport.addEventListener('mousedown',  function(e) { e.preventDefault(); dragBegin(e.clientX); });
    window  .addEventListener('mousemove',  function(e) { dragMove(e.clientX); });
    window  .addEventListener('mouseup',    dragEnd);

    /* Touch */
    viewport.addEventListener('touchstart', function(e) { dragBegin(e.touches[0].clientX); }, { passive: true });
    viewport.addEventListener('touchmove',  function(e) { dragMove(e.touches[0].clientX); },  { passive: true });
    viewport.addEventListener('touchend',   dragEnd);

    /* ─── Auto-play ────────────────────────────────────── */
    function clearAuto() { if (autoTimer) { clearInterval(autoTimer); autoTimer = null; } }
    function resetAuto() { clearAuto(); autoTimer = setInterval(next, 4000); }

    viewport.addEventListener('mouseenter', clearAuto);
    viewport.addEventListener('mouseleave', resetAuto);
    document.addEventListener('visibilitychange', function() {
        if (document.hidden) { clearAuto(); } else { resetAuto(); }
    });

    /* ─── Keyboard ─────────────────────────────────────── */
    document.addEventListener('keydown', function(e) {
        var section = viewport.closest('section');
        if (!section || !section.matches(':hover')) return;
        if (e.key === 'ArrowRight') { next(); resetAuto(); }
        if (e.key === 'ArrowLeft')  { prev(); resetAuto(); }
    });

    /* ─── Resize ───────────────────────────────────────── */
    var resizeRaf;
    window.addEventListener('resize', function() {
        cancelAnimationFrame(resizeRaf);
        resizeRaf = requestAnimationFrame(function() {
            applyTransform(targetX(posIdx), false);
        });
    });

    /* ─── Init ─────────────────────────────────────────── */
    applyTransform(targetX(posIdx), false);
    updateUI();
    resetAuto();

})();
</script>

@endsection
