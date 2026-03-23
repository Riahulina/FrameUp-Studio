<!DOCTYPE html>
<html>
<head>
    <title>Data Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="flex">

    <!-- SIDEBAR -->
    <div class="w-64 bg-blue-950 text-white min-h-screen p-6">
        <h2 class="text-2xl font-bold text-pink-400 mb-8">
            FrameUp Studio
        </h2>

        <ul class="space-y-4">
            <li><a href="/dashboard" class="block hover:text-pink-400">Dashboard</a></li>
            <li><a href="/frame" class="block hover:text-pink-400">Frame</a></li>
            <li><a href="/pemesanan" class="block hover:text-pink-400">Pemesanan</a></li>
            <li><a href="/admin/pembayaran" class="block text-pink-400 font-bold">Pembayaran</a></li>
        </ul>
    </div>

    <!-- CONTENT -->
    <div class="flex-1 p-6">

        <h1 class="text-3xl font-bold mb-6">Data Pembayaran</h1>

        <div class="bg-white p-4 rounded shadow overflow-x-auto">

            <table class="w-full text-center">
                <thead>
                    <tr class="border-b bg-gray-50">
                        <th class="p-2">Nama</th>
                        <th class="p-2">Metode</th>
                        <th class="p-2">Total</th>
                        <th class="p-2">Tanggal</th>
                        <th class="p-2">Bukti</th>
                        <th class="p-2">Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($data as $d)
                    <tr class="border-b hover:bg-gray-50">

                        <td class="p-2">
                            {{ $d->pemesanan->nama_pelanggan ?? '-' }}
                        </td>

                        <td class="p-2">{{ $d->metode_pembayaran }}</td>

                        <td class="p-2 text-green-600 font-bold">
                            Rp {{ number_format($d->total_bayar,0,',','.') }}
                        </td>

                        <td class="p-2">{{ $d->tanggal_bayar }}</td>

                        <!-- BUKTI -->
                        <td class="p-2">
                            @if($d->bukti)
                                <a href="{{ asset('storage/'.$d->bukti) }}" target="_blank">
                                    <img src="{{ asset('storage/'.$d->bukti) }}" class="w-16 mx-auto rounded">
                                </a>
                            @else
                                -
                            @endif
                        </td>

                        <!-- STATUS -->
                        <td class="p-2">
                            <a href="/admin/pembayaran/status/{{ $d->id }}"
                               class="px-3 py-1 rounded text-white
                               {{ $d->status_bayar == 'menunggu' ? 'bg-yellow-500' : 'bg-green-500' }}">

                                {{ $d->status_bayar }}

                            </a>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="p-4 text-gray-500">
                            Belum ada pembayaran
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>