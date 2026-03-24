@extends('layouts.admin')

@section('content')

{{-- Hero --}}
<section class="pt-24 pb-12 bg-navy relative overflow-hidden rounded-2xl shadow-lg">
    <div class="max-w-7xl mx-auto px-6 lg:px-10 text-center">
        <span class="text-lime/70 text-xs tracking-[0.3em] uppercase mb-2 block">Admin Panel</span>

        <h1 class="text-5xl lg:text-5xl text-lavender mb-2 font-bold">
            Contact <span class="italic text-pink">Messages</span>
        </h1>

        <p class="text-warm text-lg max-w-2xl mx-auto">
            Berikut adalah daftar semua pesan dari pengunjung PhotoBox Studio.
        </p>
    </div>
</section>

{{-- Table --}}
<section class="py-16">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="overflow-x-auto">

            <table class="min-w-full bg-white border border-lavender/30 rounded-2xl shadow-lg">

                <thead class="bg-lavender/10 text-navy text-sm uppercase">
                    <tr>
                        <th class="px-4 py-3 text-left">Name</th>
                        <th class="px-4 py-3 text-left">Email</th>
                        <th class="px-4 py-3 text-left">Company</th>
                        <th class="px-4 py-3 text-left">Budget</th>
                        <th class="px-4 py-3 text-left">Services</th>
                        <th class="px-4 py-3 text-left">Message</th>
                        <th class="px-4 py-3 text-left">Rating</th>
                        <th class="px-4 py-3 text-left">Created</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-lavender/20">
                    @forelse($contacts as $c)
                        <tr class="hover:bg-lavender/5">
                            <td class="px-4 py-3">{{ $c->name }}</td>
                            <td class="px-4 py-3">{{ $c->email }}</td>
                            <td class="px-4 py-3">{{ $c->company ?? '-' }}</td>
                            <td class="px-4 py-3">{{ $c->budget ?? '-' }}</td>
                            <td class="px-4 py-3">{{ $c->services ? implode(', ', $c->services) : '-' }}</td>
                            <td class="px-4 py-3">{{ $c->message }}</td>
                            <td class="px-4 py-3">{{ $c->rating ?? '-' }}</td>
                            <td class="px-4 py-3">{{ $c->created_at->format('d M Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center p-4 text-gray-500">
                                Belum ada pesan
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>
</section>

@endsection