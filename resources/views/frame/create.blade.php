<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Frame</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    navy: '#0E0E51',
                    lavender: '#D1C5F8',
                    pink: '#F7A8C2',
                    lime: '#E6F06A',
                    warm: '#786C6C',
                }
            }
        }
    }
    </script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

{{-- HERO --}}
<div class="bg-navy text-center py-10 shadow-lg">
    <h1 class="text-4xl font-bold text-lavender">
        Tambah <span class="italic text-pink">Frame</span>
    </h1>
    <p class="text-warm mt-2 text-sm">
        Tambahkan data frame baru ke sistem
    </p>
</div>

{{-- FORM --}}
<div class="flex justify-center px-4 py-10">

    <div class="bg-white w-full max-w-xl p-8 rounded-2xl shadow-xl">

        <form action="/frame/store" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Nama --}}
            <div class="mb-5">
                <label class="block text-gray-600 mb-1 text-sm">Nama Frame</label>
                <input type="text" name="nama_frame"
                    class="w-full border border-gray-300 p-3 rounded-xl focus:ring-2 focus:ring-lime outline-none transition"
                    placeholder="Masukkan nama frame" required>
            </div>

            {{-- Jurusan --}}
            <div class="mb-5">
                <label class="block text-gray-600 mb-1 text-sm">Jurusan</label>
                <input type="text" name="jurusan"
                    class="w-full border border-gray-300 p-3 rounded-xl focus:ring-2 focus:ring-lime outline-none transition"
                    placeholder="Contoh: RPL, TKJ, dll" required>
            </div>

            {{-- Gambar --}}
            <div class="mb-5">
                <label class="block text-gray-600 mb-1 text-sm">Upload Gambar</label>
                <input type="file" name="gambar_frame" id="gambar"
                    class="w-full border border-gray-300 p-2 rounded-xl bg-gray-50"
                    accept="image/*" onchange="previewImage()" required>

                <img id="preview" class="mt-3 w-32 rounded-lg hidden shadow">
            </div>

            {{-- Harga --}}
            <div class="mb-6">
                <label class="block text-gray-600 mb-1 text-sm">Harga</label>
                <input type="number" name="harga"
                    class="w-full border border-gray-300 p-3 rounded-xl focus:ring-2 focus:ring-lime outline-none transition"
                    placeholder="Masukkan harga" required>
            </div>

            {{-- BUTTON --}}
            <div class="flex gap-3">

                <a href="/frame"
                   class="w-1/2 text-center bg-gray-200 hover:bg-gray-300 text-gray-700 py-3 rounded-xl transition">
                    Kembali
                </a>

                <button type="submit"
                    class="w-1/2 bg-lime text-navy py-3 rounded-xl font-semibold hover:scale-105 transition shadow">
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>

{{-- SCRIPT PREVIEW --}}
<script>
function previewImage() {
    const file = document.getElementById('gambar').files[0];
    const preview = document.getElementById('preview');

    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.classList.remove('hidden');
    }
}
</script>

</body>
</html>