<!DOCTYPE html>
<html>
<head>
    <title>Struk Frame Up</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            font-size: 12px;
            color: #333;
        }

        .container {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo {
            width: 80px;
            margin-bottom: 10px;
        }

        .title {
            font-size: 18px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .info {
            margin-bottom: 15px;
        }

        .info p {
            margin: 2px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table th {
            background: #f3f3f3;
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        table td {
            padding: 8px;
            border-bottom: 1px dashed #ccc;
        }

        .text-right {
            text-align: right;
        }

        .total {
            margin-top: 10px;
            font-size: 14px;
            font-weight: bold;
            text-align: right;
        }

        .status {
            margin-top: 5px;
            font-style: italic;
            text-align: right;
        }

        .footer {
            margin-top: 25px;
            text-align: center;
            font-size: 11px;
            color: #777;
        }

        .line {
            border-top: 1px dashed #aaa;
            margin: 15px 0;
        }
    </style>
</head>
<body>

<div class="container">

    <!-- HEADER -->
    <div class="header">
        <!-- 🔥 TARUH LOGO DI public/images/logo.png -->
        <img src="{{ public_path('images/logo.png') }}" class="logo">

        <div class="title">FRAME UP STUDIO</div>
        <div>Struk Pembayaran</div>
    </div>

    <div class="line"></div>

    <!-- INFO -->
    <div class="info">
        <p><b>Nama:</b> {{ $pemesanan->nama_pelanggan }}</p>
        <p><b>Tanggal:</b> {{ $pembayaran->tanggal_bayar ?? '-' }}</p>
        <p><b>ID Pesanan:</b> {{ $pemesanan->id_pemesanan }}</p>
    </div>

    <!-- TABLE -->
    @php $total = 0; @endphp

    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th class="text-right">Qty</th>
                <th class="text-right">Harga</th>
                <th class="text-right">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pemesanan->details as $item)
                @php
                    $harga = $item->frame->harga;
                    $qty = $item->qty;
                    $subtotal = $harga * $qty;
                    $total += $subtotal;
                @endphp
                <tr>
                    <td>{{ $item->frame->nama_frame }}</td>
                    <td class="text-right">{{ $qty }}</td>
                    <td class="text-right">Rp {{ number_format($harga,0,',','.') }}</td>
                    <td class="text-right">Rp {{ number_format($subtotal,0,',','.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- TOTAL -->
    <div class="total">
        Total: Rp {{ number_format($total,0,',','.') }}
    </div>

    <div class="status">
        Status: {{ $pembayaran->status_bayar ?? '-' }}
    </div>

    <div class="line"></div>

    <!-- FOOTER -->
    <div class="footer">
        Terima kasih telah menggunakan layanan Frame Up Studio 📸 <br>
        Simpan struk ini sebagai bukti pembayaran
    </div>

</div>

</body>
</html>