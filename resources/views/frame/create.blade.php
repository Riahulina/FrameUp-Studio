<!DOCTYPE html>
<html>
<head>
    <title>Tambah Frame</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="min-h-screen flex items-center justify-center">

    <div class="bg-white w-full max-w-lg p-8 rounded-2xl shadow-xl">

        <h1 class="text-3xl font-bold text-center text-blue-950 mb-6">
            Tambah Frame
        </h1>

        <form action="/frame/store" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- NAMA FRAME -->
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Nama Frame</label>
                <input type="text" name="nama_frame"
                    class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none"
                    placeholder="Masukkan nama frame" required>
            </div>

            <!-- JURUSAN -->
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Jurusan</label>
                <input type="text" name="jurusan"
                    class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none"
                    placeholder="Contoh: RPL, TKJ, dll" required>
            </div>

            <!-- GAMBAR -->
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Upload Gambar</label>
                <input type="file" name="gambar_frame"
                    class="w-full border border-gray-300 p-2 rounded-lg bg-gray-50"
                    accept="image/*" required>
            </div>

            <!-- HARGA -->
            <div class="mb-6">
                <label class="block text-gray-700 mb-1">Harga</label>
                <input type="number" name="harga"
                    class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none"
                    placeholder="Masukkan harga" required>
            </div>

            <!-- BUTTON -->
            <button type="submit"
                class="w-full bg-blue-950 hover:bg-blue-800 text-white py-3 rounded-lg font-semibold transition">
                Simpan Frame
            </button>

        </form>

    </div>

</div>

</body>
</html>