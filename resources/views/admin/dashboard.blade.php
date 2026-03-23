<!DOCTYPE html>
<html>

<head>
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-100">

    <div class="flex">

        <!-- SIDEBAR -->
        <div class="w-64 bg-blue-950 text-white min-h-screen p-6">

            <h2 class="text-2xl font-bold text-pink-400 mb-8">
                FrameUp Studio
            </h2>

            <ul class="space-y-4">

                <ul class="space-y-4">

                    <li><a href="/dashboard" class="block hover:text-pink-400">Dashboard</a></li>

                    <li><a href="/frame" class="block hover:text-pink-400">Frame</a></li>

                    <li><a href="/pemesanan" class="block hover:text-pink-400">Pemesanan</a></li>

                    <li><a href="/pembayaran" class="block hover:text-pink-400">Pembayaran</a></li>

                    <li><a href="/detail-pemesanan" class="block hover:text-pink-400">Detail</a></li>

                    <li><a href="/survey" class="block hover:text-pink-400">Survey ⭐</a></li>

                </ul>
            </ul>
        </div>

        <!-- CONTENT -->
        <div class="flex-1 p-6">

            <h1 class="text-3xl font-bold mb-6">Dashboard Admin</h1>

            <!-- CARD -->
            <div class="grid grid-cols-3 gap-4 mb-6">

                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-gray-500">Total Pesanan</h3>
                    <p class="text-2xl font-bold">{{ $total_pemesanan }}</p>
                </div>

                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-gray-500">Total Frame</h3>
                    <p class="text-2xl font-bold">{{ $total_frame }}</p>
                </div>

                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-gray-500">Pendapatan</h3>
                    <p class="text-2xl font-bold text-green-600">
                        Rp {{ number_format($total_pendapatan,0,',','.') }}
                    </p>
                </div>

            </div>

            <!-- CHART -->
            <div class="bg-white p-4 rounded shadow mb-6">
                <h3 class="mb-4 font-semibold">Grafik Pendapatan</h3>
                <canvas id="chart"></canvas>
            </div>

            <!-- TABLE -->
            <div class="bg-white p-4 rounded shadow">
                <h3 class="mb-4 font-semibold">Pesanan Terbaru</h3>

                <table class="w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left p-2">Nama</th>
                            <th class="text-left p-2">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pesanan_terbaru as $p)
                        <tr class="border-b">
                            <td class="p-2">{{ $p->nama_pelanggan }}</td>
                            <td class="p-2">{{ $p->created_at }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="text-center p-4 text-gray-500">
                                Belum ada data
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

    </div>

    <!-- CHART SCRIPT -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const rawData = JSON.parse('{!! json_encode($chart) !!}');

            if (!rawData || rawData.length === 0) {
                document.getElementById('chart').parentElement.innerHTML =
                    "<p class='text-gray-500 text-center'>Belum ada data grafik</p>";
                return;
            }

            const labels = rawData.map(item => item.tanggal);
            const totals = rawData.map(item => item.total);

            new Chart(document.getElementById('chart'), {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Pendapatan',
                        data: totals,
                        tension: 0.4,
                        borderWidth: 2,
                        pointRadius: 3
                    }]
                }
            });

        });
    </script>

</body>

</html>