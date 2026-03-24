<!DOCTYPE html>
<html>

<head>
    <title>Laporan FrameUp</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            padding: 25px;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #0E0E51;
            margin-bottom: 5px;
        }

        .subtitle {
            text-align: center;
            color: #786C6C;
            margin-bottom: 20px;
            font-size: 12px;
        }

        h2 {
            color: #0E0E51;
            text-align: center;
            margin-top: 25px;
            margin-bottom: 10px;
        }

        .card {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 8px;
            color: #0E0E51;
        }

        .lavender {
            background: #D1C5F8;
        }

        .pink {
            background: #F7A8C2;
        }

        .lime {
            background: #E6F06A;
        }

        .card-title {
            font-size: 11px;
            color: #786C6C;
        }

        .card-value {
            font-size: 16px;
            font-weight: bold;
            margin-top: 3px;
        }

        .divider {
            border-top: 1px dashed #aaa;
            margin: 15px 0;
        }

        .footer {
            text-align: center;
            margin-top: 25px;
            font-size: 11px;
            color: #786C6C;
        }
    </style>
</head>

<body>

    <!-- LOGO -->
    <div style="text-align: center; margin-bottom: 10px;">
        <img src="{{ public_path('images/logo.png') }}" style="width: 70px;">
    </div>

    <h1>Laporan FrameUp Studio</h1>
    <p class="subtitle">Ringkasan data pesanan & keuangan</p>

    <!-- ========================= -->
    <!-- 📅 PENDAPATAN HARIAN -->
    <!-- ========================= -->
    <h2>Pendapatan Harian</h2>

    <div class="card lime">
        <div class="card-title">Hari Ini</div>
        <div class="card-value">
            Rp {{ number_format($pendapatanHariIni,0,',','.') }}
        </div>
    </div>

    <div class="card lavender">
        <div class="card-title">Kemarin</div>
        <div class="card-value">
            Rp {{ number_format($pendapatanKemarin,0,',','.') }}
        </div>
    </div>

    <div class="card {{ $selisih >= 0 ? 'lime' : 'pink' }}">
        <div class="card-title">Perubahan</div>
        <div class="card-value">
            Rp {{ number_format($selisih,0,',','.') }}
        </div>
    </div>

    <div class="divider"></div>

    <!-- ========================= -->
    <!-- 📦 PESANAN -->
    <!-- ========================= -->
    <h2>Data Pesanan</h2>

    <div class="card lavender">
        <div class="card-title">Total Pesanan</div>
        <div class="card-value">{{ $totalPesanan }}</div>
    </div>

    <div class="card lime">
        <div class="card-title">Selesai</div>
        <div class="card-value">{{ $pesananSelesai }}</div>
    </div>

    <div class="card pink">
        <div class="card-title">Menunggu</div>
        <div class="card-value">{{ $pesananMenunggu }}</div>
    </div>

    <div class="divider"></div>

    <!-- ========================= -->
    <!-- 💳 PEMBAYARAN -->
    <!-- ========================= -->
    <h2>Data Pembayaran</h2>

    <div class="card lime">
        <div class="card-title">Pendapatan Masuk</div>
        <div class="card-value">
            Rp {{ number_format($pendapatanLunas,0,',','.') }}
        </div>
    </div>

    <div class="card pink">
        <div class="card-title">Belum Masuk</div>
        <div class="card-value">
            Rp {{ number_format($pendapatanPending,0,',','.') }}
        </div>
    </div>

    <div class="card lavender">
        <div class="card-title">Total Potensi</div>
        <div class="card-value">
            Rp {{ number_format($totalPotensi,0,',','.') }}
        </div>
    </div>

    <!-- FOOTER -->
    <div class="footer">
        © {{ date('Y') }} FrameUp Studio
    </div>

</body>

</html>