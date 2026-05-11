@extends('layouts.app')

@section('title', 'Services — FrameUp Photobox')

@section('content')

{{-- Hero --}}
<section class="pt-36 pb-20 bg-navy relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-10 right-0 w-80 h-80 bg-pink/8 blob-1 rounded-full blur-3xl animate-float"></div>
    </div>
    <div class="max-w-7xl mx-auto px-6 lg:px-10 relative z-10">
        <span class="font-mono text-lime/70 text-xs tracking-[0.3em] uppercase mb-6 block">
            Our Services
        </span>
        <h1 class="font-display font-black text-6xl lg:text-8xl text-lavender leading-[0.85] mb-8">
            Photobox<br><span class="italic text-pink">Experiences</span>
        </h1>
        <p class="font-body text-warm text-lg max-w-xl">
            Capture moments, create memories — we bring fun, stylish, and unforgettable photobooth experiences to your events.
        </p>
    </div>
</section>

{{-- Services Detail --}}
<section class="py-24 bg-cream">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        @php
        $services = [
        [
        'icon' => '📸',
        'num' => '01',
        'title' => 'Wedding Photobox',
        'tagline' => 'Make your big day unforgettable.',
        'desc' => 'Add a fun and interactive experience to your wedding. Guests can capture candid moments and take home instant memories.',
        'list' => [
        'Unlimited Photo Sessions',
        'Custom Wedding Frame',
        'Instant Print',
        'Digital Gallery',
        'On-site Crew'
        ],
        'bg' => 'bg-lavender',
        'delay' => 'delay-0',
        ],
        [
        'icon' => '🎉',
        'num' => '02',
        'title' => 'Event Photobox',
        'tagline' => 'Perfect for every celebration.',
        'desc' => 'From birthdays to corporate events, our photobox brings energy and excitement to every occasion.',
        'list' => [
        'Custom Overlay Design',
        'Fun Props & Backdrop',
        'Boomerang / GIF',
        'Instant Sharing',
        'Unlimited Prints'
        ],
        'bg' => 'bg-pink',
        'delay' => 'delay-100',
        ],
        [
        'icon' => '🏢',
        'num' => '03',
        'title' => 'Corporate Branding',
        'tagline' => 'Promote your brand creatively.',
        'desc' => 'Boost brand awareness with branded photobox experiences tailored for your company events and activations.',
        'list' => [
        'Logo Integration',
        'Custom UI Screen',
        'Lead Capture',
        'Brand Activation Setup',
        'Analytics Report'
        ],
        'bg' => 'bg-blush',
        'delay' => 'delay-200',
        ],
        [
        'icon' => '🎭',
        'num' => '04',
        'title' => 'Themed Photobox',
        'tagline' => 'Match your event vibe.',
        'desc' => 'We design photobox setups that match your event theme — aesthetic, fun, or elegant.',
        'list' => [
        'Custom Backdrop',
        'Themed Props',
        'Matching Photo Frame',
        'Lighting Setup',
        'Creative Direction'
        ],
        'bg' => 'bg-green',
        'delay' => 'delay-300',
        ],
        [
        'icon' => '📱',
        'num' => '05',
        'title' => 'Digital Photobox',
        'tagline' => 'Modern & shareable.',
        'desc' => 'Go paperless with digital-only photobooth experiences that guests can instantly share on social media.',
        'list' => [
        'QR Download',
        'Instant Sharing',
        'GIF & Boomerang',
        'Online Gallery',
        'Cloud Storage'
        ],
        'bg' => 'bg-cream',
        'delay' => 'delay-400',
        ],
        [
        'icon' => '✨',
        'num' => '06',
        'title' => 'VIP Setup',
        'tagline' => 'Premium experience.',
        'desc' => 'Luxury photobox setup with high-end design, perfect for exclusive events and high-profile clients.',
        'list' => [
        'Premium Backdrop',
        'DSLR Camera Setup',
        'Studio Lighting',
        'Custom Branding',
        'Priority Service'
        ],
        'bg' => 'bg-lavender',
        'delay' => 'delay-500',
        ],
        ];
        @endphp

        <div class="space-y-8">
            @foreach($services as $svc)
            <div class="reveal {{ $svc['delay'] }} card-hover group {{ $svc['bg'] }} rounded-3xl p-10 lg:p-14">
                <div class="grid lg:grid-cols-2 gap-10 items-center">
                    <div>
                        <div class="flex items-center gap-4 mb-6">
                            <span class="text-4xl">{{ $svc['icon'] }}</span>
                            <span class="font-mono text-navy/30 font-black text-5xl">{{ $svc['num'] }}</span>
                        </div>
                        <h3 class="font-display font-black text-3xl lg:text-4xl text-navy mb-2">
                            {{ $svc['title'] }}
                        </h3>
                        <p class="font-mono text-navy/50 text-sm italic mb-5">
                            {{ $svc['tagline'] }}
                        </p>
                        <p class="font-body text-charcoal/70 text-sm leading-relaxed">
                            {{ $svc['desc'] }}
                        </p>
                        <a href="{{ url('/contact') }}"
                            class="mt-8 inline-flex items-center gap-2 bg-navy text-lavender font-mono font-semibold text-sm px-6 py-3 rounded-full hover:bg-navy/80 transition-all duration-300 group-hover:bg-lime group-hover:text-navy">
                            Book Now →
                        </a>
                    </div>
                    <div>
                        <div class="font-mono text-navy/50 text-xs tracking-widest uppercase mb-4">
                            What's included:
                        </div>
                        <ul class="space-y-3">
                            @foreach($svc['list'] as $item)
                            <li class="flex items-center gap-3 font-body text-charcoal text-sm">
                                <span class="w-5 h-5 bg-navy/10 rounded-full flex items-center justify-center text-navy text-xs font-bold shrink-0">✓</span>
                                {{ $item }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Pricing --}}
<section class="py-20 bg-navy text-center">
    <div class="max-w-2xl mx-auto px-6">
        <span class="font-mono text-lime/70 text-xs tracking-[0.3em] uppercase mb-4 block">
            Pricing
        </span>
        <h2 class="font-display font-black text-4xl text-lavender mb-6">
            Flexible <span class="italic text-pink">Packages</span>
        </h2>
        <p class="font-body text-warm mb-10 leading-relaxed">
            Choose from our customizable packages based on your event needs. Contact us to get the best deal for your special moment.
        </p>
        <a href="{{ url('/works') }}"
            class="inline-flex items-center gap-2 bg-lime text-navy font-mono font-bold px-8 py-4 rounded-full hover:bg-lime/90 hover:scale-105 transition-all duration-300 shadow-xl shadow-lime/20">
            Get Price List →
        </a>
    </div>
</section>

@endsection