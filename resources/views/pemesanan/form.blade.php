@extends('layouts.app')

@section('title', 'Form Pemesanan — FrameUp Studio')

@section('content')
<section class="py-20 bg-navy min-h-screen flex items-center justify-center">
    <div class="w-full max-w-lg px-6">

        <h2 class="font-display font-black text-3xl text-lavender text-center mb-4">
            Form <span class="italic text-pink">Pemesanan</span>
        </h2>
        <p class="text-center text-warm text-sm mb-6">Isi data untuk memesan frame favoritmu</p>

        @if(session('success'))
        <div class="mb-4 text-green-400 font-bold text-center">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ url('/pemesanan') }}" method="POST" class="space-y-4">
            @csrf

            <input type="text" name="nama" placeholder="Nama Lengkap"
                class="w-full bg-navy border border-lavender/20 text-lavender rounded-xl px-4 py-3
                       focus:border-lime focus:ring-1 focus:ring-lime outline-none transition" required>

            <input type="text" name="no_hp" placeholder="No HP / WhatsApp"
                class="w-full bg-navy border border-lavender/20 text-lavender rounded-xl px-4 py-3
                       focus:border-lime focus:ring-1 focus:ring-lime outline-none transition" required>

            <select name="jurusan"
                class="w-full bg-navy border border-lavender/20 text-lavender rounded-xl px-4 py-3
                       focus:border-lime focus:ring-1 focus:ring-lime outline-none" required>
                <option value="">Pilih Jurusan</option>
                <option>Teknik Informatika</option>
                <option>Sistem Informasi</option>
                <option>Akuntansi</option>
            </select>

            <select name="frame"
                class="w-full bg-navy border border-lavender/20 text-lavender rounded-xl px-4 py-3
                       focus:border-lime focus:ring-1 focus:ring-lime outline-none" required>
                <option value="">Pilih Frame</option>
                @foreach($frames as $frame)
                <option value="{{ $frame->id_frame }}">{{ $frame->nama_frame }}</option>
                @endforeach
            </select>

            <input type="date" name="tanggal"
                class="w-full bg-navy border border-lavender/20 text-lavender rounded-xl px-4 py-3
                       focus:border-lime focus:ring-1 focus:ring-lime outline-none" required>

            <button type="submit"
                class="w-full bg-lime text-navy font-bold py-3 rounded-full hover:scale-105 hover:shadow-xl hover:shadow-lime/30 transition-all duration-300">
                Kirim Pemesanan →
            </button>
        </form>
    </div>
</section>
@endsection