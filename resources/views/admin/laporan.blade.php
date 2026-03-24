@extends('layouts.admin')

@section('content')

{{-- HERO --}}
<section class="pt-20 pb-10 bg-navy rounded-2xl shadow-lg mb-8 text-center">
    <h1 class="text-4xl font-bold text-lavender">
        Laporan <span class="italic text-pink">Overview</span>
    </h1>
<br>
    <a href="/laporan/download"
   class="bg-green-500 text-white px-4 py-2 rounded-lg shadow hover:bg-green-600 transition">
   ⬇️ Download PDF
</a>
</section>

{{-- ========================= --}}
{{--  PENDAPATAN HARIAN --}}
{{-- ========================= --}}
<h2 class="text-xl font-bold mb-4">📅 Pendapatan Harian</h2>

<div class="grid md:grid-cols-3 gap-6 mb-8">

    {{-- HARI INI --}}
    <div class="bg-lime p-6 rounded-2xl shadow">
        <p class="text-sm text-navy">Hari Ini</p>
        <h2 class="text-2xl font-bold text-navy">
            Rp {{ number_format($pendapatanHariIni,0,',','.') }}
        </h2>
    </div>

    {{-- KEMARIN --}}
    <div class="bg-lavender p-6 rounded-2xl shadow">
        <p class="text-sm text-navy">Kemarin</p>
        <h2 class="text-2xl font-bold text-navy">
            Rp {{ number_format($pendapatanKemarin,0,',','.') }}
        </h2>
    </div>

    {{-- PERUBAHAN --}}
    <div class="p-6 rounded-2xl shadow 
        {{ $selisih >= 0 ? 'bg-lime' : 'bg-pink' }}">

        <p class="text-sm text-navy">Perubahan</p>

        <h2 class="text-2xl font-bold text-navy">
            Rp {{ number_format($selisih,0,',','.') }}
        </h2>

        <p class="text-xs mt-1">
            {{ $selisih >= 0 ? 'Naik 📈' : 'Turun 📉' }}
        </p>
    </div>

</div>

{{-- ========================= --}}
{{--  SECTION PESANAN --}}
{{-- ========================= --}}
<h2 class="text-xl font-bold mb-4">📦 Data Pesanan</h2>

<div class="grid md:grid-cols-3 gap-6 mb-6">

    <div class="bg-white p-6 rounded-2xl shadow">
        <p>Total Pesanan</p>
        <h2 class="text-2xl font-bold">{{ $totalPesanan }}</h2>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow">
        <p>Menunggu</p>
        <h2 class="text-2xl font-bold text-yellow-500">{{ $pesananMenunggu }}</h2>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow">
        <p>Selesai</p>
        <h2 class="text-2xl font-bold text-green-600">{{ $pesananSelesai }}</h2>
    </div>

</div>

<div class="bg-white rounded-2xl shadow p-6 mb-10 text-center">
    <h3 class="mb-4 font-semibold">Statistik Pesanan</h3>

    <div style="width:250px;height:250px;margin:auto;">
        <canvas id="chartPesanan"></canvas>
    </div>
</div>


{{-- ========================= --}}
{{--  SECTION PEMBAYARAN --}}
{{-- ========================= --}}
<h2 class="text-xl font-bold mb-4">💳 Data Pembayaran</h2>

<div class="grid md:grid-cols-3 gap-6 mb-6">

    {{-- 💰 SUDAH MASUK --}}
    <div class="bg-white p-6 rounded-2xl shadow">
        <p>Pendapatan Lunas</p>
        <h2 class="text-2xl font-bold text-green-600">
            Rp {{ number_format($pendapatanLunas,0,',','.') }}
        </h2>
    </div>

    {{-- ⏳ MENUNGGU --}}
    <div class="bg-white p-6 rounded-2xl shadow">
        <p>Menunggu Konfirmasi</p>
        <h2 class="text-2xl font-bold text-yellow-500">
            Rp {{ number_format($pendapatanPending,0,',','.') }}
        </h2>
    </div>

    {{-- 🔥 TOTAL POTENSI --}}
    <div class="bg-white p-6 rounded-2xl shadow">
        <p>Total Pendapatan Masuk</p>
        <h2 class="text-2xl font-bold text-blue-600">
            Rp {{ number_format($totalPotensi,0,',','.') }}
        </h2>
    </div>

</div>

<div class="bg-white rounded-2xl shadow p-6 text-center">
    <h3 class="mb-4 font-semibold">Statistik Pembayaran</h3>

    <div style="width:250px;height:250px;margin:auto;">
        <canvas id="chartPembayaran"></canvas>
    </div>
</div>




{{-- CHART JS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

{{-- DATA --}}
<script id="data-laporan" type="application/json">
{!! json_encode([
    'pesananSelesai' => $pesananSelesai ?? 0,
    'pesananMenunggu' => $pesananMenunggu ?? 0,
    'pembayaranLunas' => $pembayaranLunas ?? 0,
    'pembayaranPending' => $pembayaranPending ?? 0,
]) !!}
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {

    const data = JSON.parse(document.getElementById('data-laporan').textContent);

    // 📦 PESANAN
    new Chart(document.getElementById('chartPesanan'), {
        type: 'doughnut',
        data: {
            labels: ['Selesai', 'Menunggu'],
            datasets: [{
                data: [data.pesananSelesai, data.pesananMenunggu],
                backgroundColor: ['#22c55e', '#eab308']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    // 💳 PEMBAYARAN
    new Chart(document.getElementById('chartPembayaran'), {
        type: 'doughnut',
        data: {
            labels: ['Lunas', 'Menunggu'],
            datasets: [{
                data: [data.pembayaranLunas, data.pembayaranPending],
                backgroundColor: ['#16a34a', '#f59e0b']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

});
</script>

@endsection