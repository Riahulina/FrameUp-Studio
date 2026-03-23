<!DOCTYPE html>
<html>
<head>
    <title>Frame</title>
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
            <li><a href="/frame" class="block text-pink-400 font-bold">Frame</a></li>
        </ul>
    </div>

    <!-- CONTENT -->
    <div class="flex-1 p-6">

        <h1 class="text-3xl font-bold mb-6">Data Frame</h1>

        <!-- ALERT -->
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- BUTTON TAMBAH -->
        <a href="/frame/create"
           class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
            + Tambah Frame
        </a>

        <!-- TABLE -->
        <div class="bg-white p-4 rounded shadow">
            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th class="p-2">Gambar</th>
                        <th class="p-2">Nama</th>
                        <th class="p-2">Jurusan</th>
                        <th class="p-2">Harga</th>
                        <th class="p-2">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($frames as $f)
                    <tr class="border-b text-center">

                        <td class="p-2">
                            <img src="{{ asset($f->gambar_frame) }}" class="w-20 mx-auto">
                        </td>

                        <td class="p-2">{{ $f->nama_frame }}</td>
                        <td class="p-2">{{ $f->jurusan }}</td>
                        <td class="p-2">Rp {{ number_format($f->harga,0,',','.') }}</td>

                        <td class="p-2">
                            <a href="/frame/delete/{{ $f->id }}"
                               class="bg-red-500 text-white px-3 py-1 rounded"
                               onclick="return confirm('Yakin hapus?')">
                               Hapus
                            </a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>

</div>

</body>
</html>