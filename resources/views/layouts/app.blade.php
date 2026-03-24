<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="FrameUp Studio - Creative Design & Visual Storytelling">
    <link rel="icon" href="/images/logo.png">

    <title>@yield('title', 'FrameUp Studio')</title>


    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: '#0E0E51',
                        lavender: '#D1C5F8',
                        pink: '#F7A8C2',
                        dusty: '#D88B9F',
                        cream: '#E3E1CD',
                        grey: '#A9A5AE',
                        lime: '#E6F06A',
                        green: '#DFF3A3',
                        blush: '#FAD6E3',
                        charcoal: '#4D434C',
                        warm: '#786C6C',
                        nude: '#A2867B',
                    },
                    fontFamily: {
                        display: ['Playfair Display', 'serif'],
                        body: ['DM Sans', 'sans-serif'],
                        mono: ['Space Grotesk', 'sans-serif'],
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'float-slow': 'float 9s ease-in-out infinite',
                        'spin-slow': 'spin 20s linear infinite',
                        'pulse-slow': 'pulse 4s ease-in-out infinite',
                        'slide-up': 'slideUp 0.8s ease forwards',
                        'fade-in': 'fadeIn 1s ease forwards',
                        'marquee': 'marquee 20s linear infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0px)'
                            },
                            '50%': {
                                transform: 'translateY(-20px)'
                            },
                        },
                        slideUp: {
                            from: {
                                opacity: '0',
                                transform: 'translateY(40px)'
                            },
                            to: {
                                opacity: '1',
                                transform: 'translateY(0)'
                            },
                        },
                        fadeIn: {
                            from: {
                                opacity: '0'
                            },
                            to: {
                                opacity: '1'
                            },
                        },
                        marquee: {
                            '0%': {
                                transform: 'translateX(0)'
                            },
                            '100%': {
                                transform: 'translateX(-50%)'
                            },
                        },
                    },
                }
            }
        }


        function openModal() {
            const modal = document.getElementById('modalPemesanan');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal() {
            const modal = document.getElementById('modalPemesanan');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    </script>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background-color: #0E0E51;
            color: #4D434C;
            overflow-x: hidden;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #0E0E51;
        }

        ::-webkit-scrollbar-thumb {
            background: #D1C5F8;
            border-radius: 3px;
        }

        /* Noise texture overlay */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 9999;
            opacity: 0.3;
        }

        /* Blob / organic shapes */
        .blob-1 {
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
        }

        .blob-2 {
            border-radius: 40% 60% 70% 30% / 40% 70% 30% 60%;
        }

        .blob-3 {
            border-radius: 70% 30% 50% 50% / 30% 60% 40% 70%;
        }

        /* Sticker style */
        .sticker {
            display: inline-block;
            transform: rotate(-3deg);
            filter: drop-shadow(2px 4px 8px rgba(0, 0, 0, 0.3));
            transition: transform 0.3s ease;
        }

        .sticker:hover {
            transform: rotate(2deg) scale(1.05);
        }

        /* Card hover */
        .card-hover {
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.4s ease;
        }

        .card-hover:hover {
            transform: translateY(-8px) rotate(0.5deg);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.3);
        }

        /* Nav link underline */
        .nav-link::after {
            content: '';
            display: block;
            width: 0;
            height: 2px;
            background: #E6F06A;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* Text gradient */
        .text-gradient {
            background: linear-gradient(135deg, #D1C5F8, #F7A8C2, #E6F06A);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Marquee */
        .marquee-track {
            display: flex;
            width: max-content;
            animation: marquee 25s linear infinite;
        }

        /* Mobile menu */
        #mobile-menu {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            max-height: 0;
            overflow: hidden;
        }

        #mobile-menu.open {
            max-height: 400px;
        }

        /* Reveal on scroll */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Cursor dot */
        .cursor-dot {
            width: 12px;
            height: 12px;
            background: #E6F06A;
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            z-index: 99999;
            transition: transform 0.1s ease;
            mix-blend-mode: difference;
        }

        .cursor-ring {
            width: 36px;
            height: 36px;
            border: 2px solid rgba(230, 240, 106, 0.5);
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            z-index: 99998;
            transition: all 0.15s ease;
            mix-blend-mode: difference;
        }

        @media (max-width: 768px) {

            .cursor-dot,
            .cursor-ring {
                display: none;
            }
        }


        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-fadeIn {
            animation: fadeIn .3s ease;
        }
    </style>

    @stack('head')
</head>

<body>

    {{-- Custom Cursor --}}
    <div class="cursor-dot" id="cursorDot"></div>
    <div class="cursor-ring" id="cursorRing"></div>

    {{-- Navigation --}}
    @include('components.navbar')

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')

    {{-- Scripts --}}
    <script>
        // Custom cursor
        const dot = document.getElementById('cursorDot');
        const ring = document.getElementById('cursorRing');
        let mx = 0,
            my = 0,
            rx = 0,
            ry = 0;

        document.addEventListener('mousemove', e => {
            mx = e.clientX;
            my = e.clientY;
            dot.style.left = mx - 6 + 'px';
            dot.style.top = my - 6 + 'px';
        });

        function animRing() {
            rx += (mx - rx - 18) * 0.12;
            ry += (my - ry - 18) * 0.12;
            ring.style.left = rx + 'px';
            ring.style.top = ry + 'px';
            requestAnimationFrame(animRing);
        }
        animRing();

        // Scroll reveal
        const reveals = document.querySelectorAll('.reveal');
        const observer = new IntersectionObserver(entries => {
            entries.forEach((entry, i) => {
                if (entry.isIntersecting) {
                    setTimeout(() => entry.target.classList.add('visible'), i * 100);
                }
            });
        }, {
            threshold: 0.1
        });
        reveals.forEach(el => observer.observe(el));

        // Mobile menu
        const menuBtn = document.getElementById('menuBtn');
        const mobileMenu = document.getElementById('mobile-menu');
        if (menuBtn) {
            menuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('open');
                menuBtn.querySelector('.bar1').classList.toggle('rotate-45');
                menuBtn.querySelector('.bar1').classList.toggle('translate-y-2');
                menuBtn.querySelector('.bar2').classList.toggle('opacity-0');
                menuBtn.querySelector('.bar3').classList.toggle('-rotate-45');
                menuBtn.querySelector('.bar3').classList.toggle('-translate-y-2');
            });
        }

        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('backdrop-blur-xl', 'bg-navy/90');
                navbar.classList.remove('bg-transparent');
            } else {
                navbar.classList.remove('backdrop-blur-xl', 'bg-navy/90');
                navbar.classList.add('bg-transparent');
            }
        });
    </script>

    @stack('scripts')
</body>

</html>