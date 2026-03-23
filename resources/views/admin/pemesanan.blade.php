<!DOCTYPE html>
<html>

<head>
    <title>Data Pemesanan</title>
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
                <li><a href="/pemesanan" class="block text-pink-400 font-bold">Pemesanan</a></li>
            </ul>
        </div>

        <!-- CONTENT -->
        <div class="flex-1 p-6">

            <h1 class="text-3xl font-bold mb-6">Data Pemesanan</h1>

            <div class="bg-white p-4 rounded shadow">
                <table class="w-full text-center">

                    <thead>
                        <tr class="border-b bg-gray-50">
                            <th class="p-2">Nama</th>
                            <th class="p-2">No HP</th>
                            <th class="p-2">Jurusan</th>
                            <th class="p-2">Tanggal</th>
                            <th class="p-2">Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($data as $p)
                        <tr class="border-b hover:bg-gray-50">

                            <td class="p-2">{{ $p->nama_pelanggan }}</td>
                            <td class="p-2">{{ $p->no_hp }}</td>
                            <td class="p-2">{{ $p->jurusan }}</td>
                            <td class="p-2">{{ $p->tanggal_pemesanan }}</td>

                            <td class="p-2">

                                <a href="/pemesanan/status/{{ $p->id_pemesanan }}"
                                    class="px-3 py-1 rounded text-white inline-block
                                    {{ $p->status == 'menunggu' ? 'bg-yellow-500' : 'bg-green-500' }}">
                                    {{ $p->status }}

                                </a>

                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-4 text-gray-500">
                                Belum ada data pemesanan
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