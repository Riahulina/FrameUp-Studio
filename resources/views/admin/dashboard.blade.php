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

    <div class="bg-white p-6 rounded-2xl shadow-lg">
        <h3 class="text-gray-500 text-sm">Total Pesanan</h3>
        <p class="text-3xl font-bold text-navy">
            {{ $total_pemesanan ?? 0 }}
        </p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-lg">
        <h3 class="text-gray-500 text-sm">Total Frame</h3>
        <p class="text-3xl font-bold text-navy">
            {{ $total_frame ?? 0 }}
        </p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-lg">
        <h3 class="text-gray-500 text-sm">Pendapatan</h3>
        <p class="text-3xl font-bold text-green-600">
            Rp {{ number_format($total_pendapatan ?? 0,0,',','.') }}
        </p>
    </div>

</div>

{{-- CHART --}}
<div class="bg-white rounded-2xl shadow-lg p-6">

    <div class="flex justify-between items-center mb-6">
        <h3 class="text-lg font-semibold text-gray-700">
            Grafik Pesanan
        </h3>

        <select id="filterBulan" class="border rounded px-3 py-1 text-sm">
            @for ($i = 1; $i <= 12; $i++)
                <option value="{{ $i }}" {{ now()->month == $i ? 'selected' : '' }}>
                {{ \Carbon\Carbon::create()->month($i)->translatedFormat('F') }}
                </option>
                @endfor
        </select>
    </div>

    <canvas id="chart" height="100"></canvas>

</div>

{{-- SCRIPT --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    let chartInstance = null;

    document.addEventListener("DOMContentLoaded", function() {

        const select = document.getElementById("filterBulan");

        if (!select) {
            console.error("Dropdown bulan tidak ditemukan");
            return;
        }

        loadChart(select.value);

        select.addEventListener("change", function() {
            loadChart(this.value);
        });

    });

    function loadChart(bulan) {

        fetch("{{ url('/admin/chart') }}?bulan=" + bulan)
            .then(response => {
                if (!response.ok) {
                    throw new Error("Response error");
                }
                return response.json();
            })
            .then(data => {

                console.log("DATA:", data); // debug

                const canvas = document.getElementById('chart');

                if (!canvas) {
                    console.error("Canvas chart tidak ditemukan");
                    return;
                }

                if (!data || data.length === 0) {
                    canvas.parentElement.innerHTML =
                        "<p class='text-gray-400 text-center py-10'>Belum ada data grafik</p>";
                    return;
                }

                const labels = data.map(item => item.tanggal);
                const totals = data.map(item => item.total);

                // destroy chart lama
                if (chartInstance) {
                    chartInstance.destroy();
                }

                // buat chart baru
                chartInstance = new Chart(canvas, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Pesanan',
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
                            legend: {
                                display: false
                            }
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

            })
            .catch(error => {
                console.error("ERROR:", error);
            });
    }
</script>

@endsection