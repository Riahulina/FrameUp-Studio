<footer class="bg-navy border-t border-lavender/10 relative overflow-hidden">

    {{-- Background decoration --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute bottom-0 left-0 w-72 h-72 bg-lavender/5 blob-1 rounded-full blur-3xl"></div>
        <div class="absolute top-0 right-0 w-56 h-56 bg-pink/5 blob-2 rounded-full blur-3xl"></div>
    </div>

    {{-- Marquee ticker --}}
    <div class="border-y border-lavender/10 py-4 overflow-hidden bg-lavender/5">
        <div class="marquee-track">
            @php
                $tickers = ['Branding', '✦', 'Photography', '✦', 'UI Design', '✦', 'Motion', '✦', 'FrameUp Studio', '✦', 'Creative Direction', '✦', 'Visual Identity', '✦', 'Web Design', '✦'];
            @endphp
            @foreach(array_merge($tickers, $tickers) as $tick)
                <span class="font-mono text-lavender/60 text-sm tracking-widest uppercase mx-6 whitespace-nowrap">{{ $tick }}</span>
            @endforeach
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-10 py-16 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-16">

            {{-- Brand Column --}}
            <div class="lg:col-span-2">
                <div class="flex items-center gap-3 mb-6">
                    <div class="relative w-12 h-12">
                        <div class="absolute inset-0 bg-lime rounded-xl rotate-6"></div>
                        <div class="absolute inset-0 bg-navy border border-lavender/30 rounded-xl flex items-center justify-center">
                            <span class="text-lavender font-display font-black text-xl">F</span>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-display font-bold text-lavender text-xl">FrameUp</span>
                        <span class="font-mono text-lime text-xs tracking-[0.3em] uppercase">Studio</span>
                    </div>
                </div>
                <p class="font-body text-warm text-sm leading-relaxed max-w-xs mb-6">
                    We craft memorable visual identities and digital experiences that make your brand impossible to ignore.
                </p>
                {{-- Social --}}
                <div class="flex gap-3">
                    @php
                        $socials = [
                            ['icon' => 'instagram', 'href' => '#', 'label' => 'Instagram'],
                            ['icon' => 'twitter',   'href' => '#', 'label' => 'Twitter'],
                            ['icon' => 'linkedin',  'href' => '#', 'label' => 'LinkedIn'],
                            ['icon' => 'behance',   'href' => '#', 'label' => 'Behance'],
                        ];
                    @endphp
                    @foreach($socials as $s)
                        <a href="{{ $s['href'] }}"
                           aria-label="{{ $s['label'] }}"
                           class="w-9 h-9 rounded-full border border-lavender/20 flex items-center justify-center text-lavender/60 hover:text-lime hover:border-lime/50 hover:bg-lime/5 transition-all duration-200">
                            @if($s['icon'] === 'instagram')
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            @elseif($s['icon'] === 'twitter')
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            @elseif($s['icon'] === 'linkedin')
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            @else
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M6.938 4.503c.702.423 1.766.957 3.457 1.488A11.333 11.333 0 0 1 12 6c.691 0 1.375.036 2.032.113 1.59-.508 2.678-1.006 3.42-1.505.382-.255.786-.577 1.052-.857.11-.115.223-.25.312-.38.064-.096.13-.219.165-.333.062-.218.049-.437-.005-.593-.052-.139-.156-.27-.345-.352-.33-.144-.75-.186-1.2-.133-.606.075-1.133.28-1.473.457a1.115 1.115 0 0 1-.167.075 11.51 11.51 0 0 0-3.792-.625 11.51 11.51 0 0 0-3.79.625 1.126 1.126 0 0 1-.171-.075 3.898 3.898 0 0 0-1.469-.457c-.45-.053-.872-.011-1.2.133-.19.082-.294.213-.346.352-.053.156-.066.375-.004.593.035.114.1.237.164.333.09.13.202.265.312.38.266.28.67.602 1.052.857zM12 7.12a9.923 9.923 0 0 0-2.666.36C8.98 7.765 8.6 8.1 8.6 8.1H7.2S6.24 9.34 6.24 11.4c0 1.09.297 2.155.774 3.106.4.8.84 1.42 1.136 1.806.287.37.47.572.47.572H8.61s.29.29.682.493c.266.139.559.232.859.232H9.147a2.8 2.8 0 0 1-.9-.143 3.06 3.06 0 0 1-.65-.352c-.17-.116-.29-.228-.29-.228s.64 2.074 3.693 2.074 3.693-2.074 3.693-2.074-.12.112-.29.228a3.06 3.06 0 0 1-.65.352 2.8 2.8 0 0 1-.9.143h-.004c.3 0 .593-.093.859-.232.391-.203.682-.493.682-.493h-.01s.183-.202.47-.572c.295-.387.735-1.006 1.136-1.806A7.668 7.668 0 0 0 17.76 11.4c0-2.06-.96-3.3-.96-3.3h-1.4s-.38-.335-.734-.62A9.923 9.923 0 0 0 12 7.12z"/></svg>
                            @endif
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Links --}}
            <div>
                <h4 class="font-mono font-semibold text-lavender text-sm tracking-wider uppercase mb-5">Services</h4>
                <ul class="space-y-3">
                    @foreach(['Brand Identity', 'UI/UX Design', 'Photography', 'Motion Graphics', 'Web Design', 'Print Design'] as $svc)
                        <li>
                            <a href="#" class="font-body text-warm text-sm hover:text-lavender transition-colors duration-200">
                                {{ $svc }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h4 class="font-mono font-semibold text-lavender text-sm tracking-wider uppercase mb-5">Company</h4>
                <ul class="space-y-3">
                    @foreach(['About Us', 'Our Work', 'Blog', 'Careers', 'Contact', 'Privacy Policy'] as $link)
                        <li>
                            <a href="#" class="font-body text-warm text-sm hover:text-lavender transition-colors duration-200">
                                {{ $link }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <div class="mt-8">
                    <h4 class="font-mono font-semibold text-lavender text-sm tracking-wider uppercase mb-3">Say Hello</h4>
                    <a href="mailto:hello@frameupstudio.com"
                       class="font-body text-lime text-sm hover:text-lime/80 transition-colors duration-200">
                        hello@frameupstudio.com
                    </a>
                </div>
            </div>
        </div>

        {{-- Bottom bar --}}
        <div class="border-t border-lavender/10 pt-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="font-body text-warm/60 text-xs">
                © {{ date('Y') }} FrameUp Studio. All rights reserved.
            </p>
            <div class="flex items-center gap-1">
                <span class="font-body text-warm/60 text-xs">Made with</span>
                <span class="text-pink text-sm">♥</span>
                <span class="font-body text-warm/60 text-xs">in Indonesia</span>
            </div>
            <div class="flex gap-6">
                <a href="#" class="font-mono text-warm/60 text-xs hover:text-lavender transition-colors duration-200">Terms</a>
                <a href="#" class="font-mono text-warm/60 text-xs hover:text-lavender transition-colors duration-200">Privacy</a>
                <a href="#" class="font-mono text-warm/60 text-xs hover:text-lavender transition-colors duration-200">Cookies</a>
            </div>
        </div>
    </div>
</footer>
