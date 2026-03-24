<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - FrameUp</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    navy: '#0E0E51',
                    lavender: '#D1C5F8',
                    pink: '#F7A8C2',
                    lime: '#E6F06A',
                    warm: '#786C6C',
                }
            }
        }
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="flex bg-gray-100 min-h-screen">

    {{-- Sidebar --}}
    <aside class="w-64 bg-navy text-lavender p-6 relative shadow-xl">

        <div class="mb-10">
            <h1 class="text-xl font-bold">FrameUp</h1>
            <span class="text-lime text-xs">STUDIO</span>
        </div>

        <nav class="space-y-3">
            <a href="/dashboard" class="block p-3 rounded-lg hover:bg-lavender/10 hover:text-lime">🏠 Dashboard</a>
            <a href="/frame" class="block p-3 rounded-lg hover:bg-lavender/10 hover:text-lime">🖼️ Frames</a>
            <a href="/pemesanan" class="block p-3 rounded-lg hover:bg-lavender/10 hover:text-lime">🛒 Pemesanan</a>
            <a href="/pembayaran" class="block p-3 rounded-lg hover:bg-lavender/10 hover:text-lime">💳 Pembayaran</a>
            <a href="/contacts" class="block p-3 rounded-lg hover:bg-lavender/10 hover:text-lime">📞 Contacts</a>
            <a href="/laporan" class="block p-3 rounded-lg hover:bg-lavender/10 hover:text-lime">📊 Laporan</a>
            
        </nav>

        <div class="absolute bottom-6 text-xs text-warm/70">
            © {{ date('Y') }} FrameUp
        </div>

    </aside>

    {{-- Content --}}
    <main class="flex-1 p-6">
        @yield('content')
    </main>

</body>
</html>