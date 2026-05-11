@extends('layouts.app')

@section('title', 'About — FrameUp Studio')

@section('content')

{{-- Hero --}}
<section class="pt-36 pb-20 bg-navy relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-20 right-0 w-96 h-96 bg-lavender/8 blob-1 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-0 left-0 w-72 h-72 bg-pink/8 blob-2 rounded-full blur-3xl animate-float-slow"></div>
    </div>
    <div class="max-w-7xl mx-auto px-6 lg:px-10 relative z-10">
        <div class="max-w-3xl">
            <span class="font-mono text-lime/70 text-xs tracking-[0.3em] uppercase mb-6 block animate-fade-in">Our Story</span>
            <h1 class="font-display font-black text-6xl lg:text-8xl text-lavender leading-[0.85] mb-8 animate-slide-up">
                About<br><span class="italic text-pink">FrameUp</span>
            </h1>
            <p class="font-body text-warm text-lg leading-relaxed max-w-xl animate-slide-up delay-200">
                Born from a passion for visual storytelling, FrameUp Studio has been helping brands find their visual voice since 2019.
            </p>
        </div>
    </div>
</section>

{{-- Mission --}}
<section class="py-24 bg-cream">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="reveal">
                <span class="font-mono text-nude text-xs tracking-[0.3em] uppercase mb-4 block">Our Mission</span>
                <h2 class="font-display font-black text-4xl lg:text-5xl text-navy leading-tight mb-6">
                    Design That <span class="italic text-dusty">Speaks</span>
                </h2>
                <p class="font-body text-charcoal/70 text-base leading-relaxed mb-5">
                    We believe great design isn't just about how things look — it's about how they make people feel. Every project we take on is an opportunity to create something that connects on a deeper level.
                </p>
                <p class="font-body text-charcoal/70 text-base leading-relaxed">
                    Our multidisciplinary team brings together expertise in branding, photography, motion, and digital design to offer a holistic creative service under one roof.
                </p>
            </div>
            <div class="reveal delay-200 grid grid-cols-2 gap-4">
                @foreach([
                ['value'=>'120+','label'=>'Projects Completed','bg'=>'bg-lavender'],
                ['value'=>'40+', 'label'=>'Happy Clients', 'bg'=>'bg-pink'],
                ['value'=>'5+', 'label'=>'Years Experience', 'bg'=>'bg-lime'],
                ['value'=>'8', 'label'=>'Team Members', 'bg'=>'bg-green'],
                ] as $stat)
                <div class="{{ $stat['bg'] }} rounded-3xl p-8 text-center">
                    <div class="font-display font-black text-4xl text-navy mb-2">{{ $stat['value'] }}</div>
                    <div class="font-body text-charcoal/60 text-xs">{{ $stat['label'] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- Team --}}
<section class="py-24 bg-navy">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="text-center mb-16 reveal">
            <span class="font-mono text-lime/70 text-xs tracking-[0.3em] uppercase mb-4 block">The People</span>
            <h2 class="font-display font-black text-4xl lg:text-5xl text-lavender">
                Meet the <span class="italic text-pink">Team</span>
            </h2>
        </div>

        @php
        $team = [
        // ===== BARIS ATAS =====
        ['name' => 'Riah Ulina', 'role' => 'Programmer', 'photo' => asset('images/riahulina2.png'), 'color' => 'bg-lavender/20', 'delay' => 'delay-0'],
        ['name' => 'Nicholas Aprino', 'role' => 'Operator 2', 'photo' => asset('images/niko3.png'), 'color' => 'bg-pink/20', 'delay' => 'delay-100'],
        ['name' => 'Nurul Inayah', 'role' => 'Admin', 'photo' => asset('images/inayah.png'), 'color' => 'bg-lime/20', 'delay' => 'delay-200'],
        // ===== BARIS BAWAH =====
        ['name' => 'Syafitri Uswatun', 'role' => 'Kasir', 'photo' => asset('images/uswa2.png'), 'color' => 'bg-green/20', 'delay' => 'delay-300'],
        ['name' => 'Dwika Br. Naibaho','role' => 'Operator 1', 'photo' => asset('images/dwi.png'), 'color' => 'bg-blush/20', 'delay' => 'delay-400'],
        ['name' => 'Dita Liana', 'role' => 'Editor', 'photo' => asset('images/dita.jpeg'), 'color' => 'bg-lavender/20', 'delay' => 'delay-500'],
        ];
        @endphp

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($team as $member)
            <div class="card-hover reveal {{ $member['delay'] }} text-center">
                <div class="{{ $member['color'] }} border border-lavender/10 rounded-3xl p-8">

                    {{-- FOTO: lingkaran profesional, ukuran seragam --}}
                    <div class="w-28 h-28 mx-auto mb-5 rounded-full overflow-hidden ring-2 ring-lavender/30 ring-offset-2 ring-offset-transparent shadow-xl">
                        <img
                            src="{{ $member['photo'] }}"
                            alt="{{ $member['name'] }}"
                            class="w-full h-full object-cover object-top"
                            style="aspect-ratio: 1 / 1;">
                    </div>

                    <div class="font-display font-bold text-lg text-lavender mb-1">
                        {{ $member['name'] }}
                    </div>
                    <div class="font-mono text-warm text-xs tracking-wider">
                        {{ $member['role'] }}
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Values --}}
<section class="py-24 bg-lavender">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="text-center mb-16 reveal">
            <span class="font-mono text-navy/50 text-xs tracking-[0.3em] uppercase mb-4 block">What We Stand For</span>
            <h2 class="font-display font-black text-4xl lg:text-5xl text-navy">Our <span class="italic text-dusty">Values</span></h2>
        </div>
        @php
        $values = [
        ['icon'=>'✦','title'=>'Intentionality','desc'=>'Every design decision is deliberate. We never place a pixel without purpose.', 'delay'=>'delay-0'],
        ['icon'=>'♥','title'=>'Empathy', 'desc'=>'We listen deeply to understand not just what you want, but why you want it.', 'delay'=>'delay-100'],
        ['icon'=>'◎','title'=>'Craft', 'desc'=>'We obsess over details. The space between letters matters. The curve of a shape matters.','delay'=>'delay-200'],
        ['icon'=>'↗','title'=>'Growth', 'desc'=>'We push boundaries — ours and yours — to create work that moves beyond the expected.', 'delay'=>'delay-300'],
        ['icon'=>'✿','title'=>'Joy', 'desc'=>'Design should be fun! We bring energy, humour, and delight to the creative process.', 'delay'=>'delay-400'],
        ['icon'=>'⬡','title'=>'Transparency', 'desc'=>'Open communication, clear timelines, and honest feedback — always.', 'delay'=>'delay-500'],
        ];
        @endphp
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($values as $v)
            <div class="reveal {{ $v['delay'] }} bg-navy/5 border border-navy/10 rounded-3xl p-8 hover:bg-navy/10 transition-colors duration-300 card-hover">
                <div class="font-display text-4xl text-navy/30 mb-4">{{ $v['icon'] }}</div>
                <h3 class="font-display font-bold text-xl text-navy mb-3">{{ $v['title'] }}</h3>
                <p class="font-body text-charcoal/60 text-sm leading-relaxed">{{ $v['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-24 bg-navy text-center">
    <div class="max-w-2xl mx-auto px-6 reveal">
        <h2 class="font-display font-black text-5xl text-lavender mb-6">
            Want to work <span class="italic text-pink">with us?</span>
        </h2>
        <p class="font-body text-warm mb-10">We're always excited to meet new clients and take on interesting challenges.</p>
        <a href="{{ url('/contact') }}"
            class="inline-flex items-center gap-2 bg-lime text-navy font-mono font-bold text-sm px-8 py-4 rounded-full hover:bg-lime/90 hover:scale-105 transition-all duration-300 shadow-xl shadow-lime/20">
            Get in Touch →
        </a>
    </div>
</section>

@endsection