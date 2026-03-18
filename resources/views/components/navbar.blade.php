<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 bg-transparent transition-all duration-500">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="flex items-center justify-between h-20">

            {{-- Logo --}}
            <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                <div class="relative w-12 h-12">
                    <img src="{{ asset('images/logo.png') }}" 
                        alt="FrameUp Logo"
                        class="w-full h-full object-contain">
                </div>
                <div class="flex flex-col leading-none">
                    <span class="font-display font-bold text-lavender text-lg">FrameUp</span>
                    <span class="font-mono text-lime text-xs tracking-[0.3em] uppercase">Studio</span>
                </div>
            </a>

            {{-- Desktop Nav --}}
            <div class="hidden md:flex items-center gap-10">
                @php
                    $navItems = [
                        ['label' => 'Home',     'href' => route('home')],
                        ['label' => 'About',    'href' => route('about')],
                        ['label' => 'Services', 'href' => route('services')],
                        ['label' => 'Works',    'href' => route('works')],
                        ['label' => 'Contact',  'href' => route('contact')],
                    ];
                @endphp
                @foreach($navItems as $item)
                    <a href="{{ $item['href'] }}"
                       class="nav-link font-body text-lavender/80 hover:text-lavender text-sm font-medium tracking-wide transition-colors duration-200">
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </div>

            {{-- CTA + Hamburger --}}
            <div class="flex items-center gap-4">
                <a href="{{ url('/pemesanan/create') }}" 
                   class="hidden md:inline-flex items-center gap-2 bg-lime text-navy font-mono font-semibold text-sm px-5 py-2.5 rounded-full hover:bg-lime/90 hover:scale-105 active:scale-95 transition-all duration-200 shadow-lg shadow-lime/20">
                    <span>Book Now</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>

                {{-- Mobile Hamburger --}}
                <button id="menuBtn" class="md:hidden flex flex-col gap-1.5 p-2" aria-label="Menu">
                    <span class="bar1 block w-6 h-0.5 bg-lavender transition-all duration-300 origin-center"></span>
                    <span class="bar2 block w-6 h-0.5 bg-lavender transition-all duration-300"></span>
                    <span class="bar3 block w-6 h-0.5 bg-lavender transition-all duration-300 origin-center"></span>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobile-menu" class="md:hidden bg-navy/95 backdrop-blur-xl border-t border-lavender/10">
        <div class="px-6 py-6 flex flex-col gap-4">
            @foreach($navItems as $item)
                <a href="{{ $item['href'] }}"
                   class="font-body text-lavender text-base font-medium py-2 border-b border-lavender/10 hover:text-lime transition-colors duration-200">
                    {{ $item['label'] }}
                </a>
            @endforeach
            <a href="{{ url('/contact') }}"
               class="mt-2 inline-flex justify-center items-center gap-2 bg-lime text-navy font-mono font-semibold text-sm px-5 py-3 rounded-full">
                Let's Talk →
            </a>
        </div>
    </div>
</nav>
