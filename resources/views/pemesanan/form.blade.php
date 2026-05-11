@extends('layouts.app')

@section('title', 'Form Pemesanan — FrameUp Studio')

@section('content')
<section class="py-20 bg-navy min-h-screen flex items-center justify-center">
    <div class="w-full max-w-lg px-6">

        <h2 class="font-display font-black text-3xl text-lavender text-center mb-4">
            Form <span class="italic text-pink">Pemesanan</span>
        </h2>

        <p class="text-center text-warm text-sm mb-6">
            Isi data untuk memesan frame favoritmu
        </p>

        {{-- ALERT --}}
        @if(session('success'))
        <div class="mb-4 text-green-400 font-bold text-center">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="text-red-400 text-center mb-4">
            {{ session('error') }}
        </div>
        @endif

        <form action="{{ route('pemesanan.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- NAMA --}}
            <input type="text" name="nama" placeholder="Nama Lengkap"
                class="w-full bg-navy border border-lavender/20 text-lavender rounded-xl px-4 py-3" required>

            {{-- NO HP --}}
            <input type="text" name="no_hp" placeholder="No HP / WhatsApp"
                class="w-full bg-navy border border-lavender/20 text-lavender rounded-xl px-4 py-3" required>

            {{-- JURUSAN --}}
            <select name="jurusan_select" id="jurusanSelect"
                class="w-full bg-navy border border-lavender/20 text-lavender rounded-xl px-4 py-3">
                <option value="">Pilih Jurusan</option>
                <option>Teknik Komputer dan Informatika</option>
                <option>Akuntansi</option>
                <option>Teknik Sipil</option>
                <option>Teknik Mesin</option>
                <option value="lainnya">Lainnya...</option>
            </select>

            <input type="text" name="jurusan_manual" id="jurusanManual"
                placeholder="Isi jurusan jika tidak ada"
                class="w-full mt-2 bg-navy border border-lavender/20 text-lavender rounded-xl px-4 py-3 hidden">

            {{-- ================= FRAME ================= --}}
            <div class="bg-navy border border-lavender/20 rounded-xl p-4">
                <p class="text-sm text-warm mb-3">Pilih Frame</p>

                {{-- AUTO MODE --}}
                @if(isset($selectedFrame) && $selectedFrame)

                <div class="border border-lime rounded-xl p-4 text-center bg-lime/10">

                    <p class="text-lime font-bold mb-2">Frame Terpilih</p>

                    <p class="text-lg font-semibold text-lavender">
                        {{ $selectedFrame->nama_frame }}
                    </p>

                    <p class="text-sm text-green-400 mb-2">
                        Rp {{ number_format($selectedFrame->harga,0,',','.') }}
                    </p>

                    {{-- 🔥 FIX DI SINI --}}
                    <input type="hidden" name="frame[]" value="{{ $selectedFrame->id_frame }}">

                    <input type="number"
                        name="qty[{{ $selectedFrame->id_frame }}]"
                        value="1" min="1"
                        class="w-full mt-2 border rounded px-2 text-black">

                    <button type="button" onclick="switchManual()"
                        class="mt-3 text-xs text-pink underline">
                        Pilih frame lain
                    </button>

                </div>

                {{-- MANUAL MODE --}}
                @else

                <div class="flex items-center gap-2">

                    <button type="button" onclick="prevFrame()"
                        class="px-3 py-1 bg-lime text-navy rounded">‹</button>

                    <div class="overflow-hidden w-full">
                        <div id="frameSlider" class="flex transition-all duration-300">

                            @foreach($frames as $frame)
                            <div class="w-1/3 flex-shrink-0 p-2">
                                <div class="border border-lavender/20 rounded-xl p-3 text-center">

                                    {{-- 🔥 FIX DI SINI --}}
                                    <input type="checkbox" name="frame[]" value="{{ $frame->id_frame }}">

                                    <p class="text-sm mt-2">{{ $frame->nama_frame }}</p>

                                    <input type="number"
                                        name="qty[{{ $frame->id_frame }}]"
                                        min="1" value="1"
                                        class="w-full mt-2 border rounded px-2 text-black">
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>

                    <button type="button" onclick="nextFrame()"
                        class="px-3 py-1 bg-lime text-navy rounded">›</button>

                </div>

                @endif

            </div>

            {{-- TANGGAL --}}
            <input type="date" name="tanggal"
                class="w-full bg-navy border border-lavender/20 text-lavender rounded-xl px-4 py-3" required>

            {{-- BUTTON --}}
            <button type="submit"
                class="w-full bg-lime text-navy font-bold py-3 rounded-full hover:scale-105 transition">
                Kirim Pemesanan →
            </button>

        </form>
    </div>
</section>

{{-- SCRIPT --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const select = document.getElementById('jurusanSelect');
        const manual = document.getElementById('jurusanManual');

        select.addEventListener('change', function() {
            manual.classList.toggle('hidden', this.value !== 'lainnya');
        });
    });

    let currentIndex = 0;
    const visibleItems = 3;

    function updateSlider() {
        const slider = document.getElementById('frameSlider');
        if (!slider) return;
        const itemWidth = slider.children[0].offsetWidth;
        slider.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
    }

    function nextFrame() {
        const slider = document.getElementById('frameSlider');
        if (!slider) return;

        const totalItems = slider.children.length;
        if (currentIndex < totalItems - visibleItems) {
            currentIndex++;
            updateSlider();
        }
    }

    function prevFrame() {
        if (currentIndex > 0) {
            currentIndex--;
            updateSlider();
        }
    }

    function switchManual() {
        window.location.href = "/pemesanan/create";
    }
</script>
@endsection