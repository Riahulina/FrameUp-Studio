<!DOCTYPE html>
<html>

<head>
    <title>Struk FrameUp</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            padding: 30px;
            color: #333;
        }

        .container {
            max-width: 500px;
            margin: auto;
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            border: 1px solid #ddd;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .header img {
            width: 80px;
            margin-bottom: 5px;
        }

        .title {
            font-size: 16px;
            font-weight: bold;
            color: #0E0E51;
        }

        .subtitle {
            font-size: 12px;
            color: #786C6C;
        }

        .line {
            border-top: 1px dashed #aaa;
            margin: 10px 0;
        }

        .info {
            font-size: 12px;
            margin-bottom: 10px;
        }

        .info b {
            color: #0E0E51;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        thead {
            background: #D1C5F8;
            color: #0E0E51;
        }

        th,
        td {
            padding: 8px;
            border-bottom: 1px dashed #ccc;
        }

        th {
            text-align: left;
        }

        td.text-right {
            text-align: right;
        }

        .total {
            text-align: right;
            margin-top: 10px;
            font-weight: bold;
            color: #0E0E51;
        }

        .status {
            text-align: right;
            font-size: 11px;
            color: #786C6C;
        }

        .footer {
            text-align: center;
            margin-top: 15px;
            font-size: 11px;
            color: #786C6C;
        }

        .thanks {
            color: #F7A8C2;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- HEADER -->
        <div class="header">
            <img src="{{ public_path('images/logo.png') }}">
            <div class="title">FRAME UP STUDIO</div>
            <div class="subtitle">Struk Pembayaran</div>
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
                    <th style="text-align:right;">Qty</th>
                    <th style="text-align:right;">Harga</th>
                    <th style="text-align:right;">Subtotal</th>
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
            Status: {{ $pembayaran->status_bayar ?? 'menunggu' }}
        </div>

        <div class="line"></div>

        <!-- FOOTER -->
        <div class="footer">
            <div class="thanks">Terima kasih yaaa </div>
            Simpan struk ini sebagai bukti pembayaran
        </div>

    </div>

</body>

</html>