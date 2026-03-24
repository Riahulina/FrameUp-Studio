@extends('layouts.admin')

@section('content')

{{-- HERO --}}
<section class="pt-20 pb-10 bg-navy rounded-2xl shadow-lg mb-8 text-center">
    <span class="text-lime/70 text-xs tracking-[0.3em] uppercase block mb-2">
        Admin Panel
    </span>

    <h1 class="text-4xl lg:text-5xl font-bold text-lavender">
        Dashboard <span class="italic text-pink">Overview</span>
    </h1>

    <p class="text-warm mt-2">
        Ringkasan performa FrameUp Studio
    </p>
</section>

{{-- STATS --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

    {{-- CARD 1 --}}
    <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition group">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-gray-500 text-sm">Total Pesanan</h3>
            <span class="text-2xl">🛒</span>
        </div>

        <p class="text-3xl font-bold text-navy">
            {{ $total_pemesanan ?? 120 }}
        </p>

        <div class="mt-2 text-xs text-green-500">
            +12% dari bulan lalu
        </div>
    </div>

    {{-- CARD 2 --}}
    <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition group">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-gray-500 text-sm">Total Frame</h3>
            <span class="text-2xl">🖼️</span>
        </div>

        <p class="text-3xl font-bold text-navy">
            {{ $total_frame ?? 80 }}
        </p>

        <div class="mt-2 text-xs text-blue-500">
            Data tersedia
        </div>
    </div>

    {{-- CARD 3 --}}
    <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition group">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-gray-500 text-sm">Pendapatan</h3>
            <span class="text-2xl">💰</span>
        </div>

        <p class="text-3xl font-bold text-green-600">
            Rp {{ number_format($total_pendapatan ?? 5000000,0,',','.') }}
        </p>

        <div class="mt-2 text-xs text-green-500">
            Stabil meningkat
        </div>
    </div>

</div>

{{-- CHART CARD --}}
<div class="bg-white rounded-2xl shadow-lg p-6">

    <div class="flex justify-between items-center mb-6">
        <h3 class="text-lg font-semibold text-gray-700">
            Grafik Pendapatan
        </h3>

        <span class="text-xs text-gray-400">
            Bulanan
        </span>
    </div>

    <canvas id="chart" height="100"></canvas>

</div>

{{-- SCRIPT --}}
<script>
document.addEventListener("DOMContentLoaded", function() {

    const rawData = JSON.parse('@json($chart ?? [])');

    if (!rawData || rawData.length === 0) {
        document.getElementById('chart').parentElement.innerHTML =
            "<p class='text-gray-400 text-center py-10'>Belum ada data grafik</p>";
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
                borderColor: '#F7A8C2',
                backgroundColor: 'rgba(247,168,194,0.15)',
                fill: true,
                tension: 0.4,
                borderWidth: 3,
                pointRadius: 4,
                pointBackgroundColor: '#F7A8C2'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#eee'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

});
</script>

@endsection