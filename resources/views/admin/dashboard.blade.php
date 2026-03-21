@extends('layouts.app')

@section('content')
<div class="p-6">

<br><br><br>

    <h1 class="text-5xl text-center font-white mb-6">Dashboard Admin</h1>

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

    <!-- PESANAN TERBARU -->
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
                @foreach($pesanan_terbaru as $p)
                <tr class="border-b">
                    <td class="p-2">{{ $p->nama_pelanggan }}</td>
                    <td class="p-2">{{ $p->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

<!-- CHART JS -->
<script>
document.addEventListener("DOMContentLoaded", function () {

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
                tension: 0.4
            }]
        }
    });

});
</script>
@endsection