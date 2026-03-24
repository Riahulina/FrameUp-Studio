@extends('layouts.app')

@section('title', 'Contact — FrameUp Studio')

@section('content')

{{-- Hero --}}
<section class="pt-36 pb-16 bg-navy relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-10 right-0 w-96 h-96 bg-lavender/8 blob-1 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-0 left-20 w-64 h-64 bg-pink/8 blob-2 rounded-full blur-3xl animate-float-slow"></div>
    </div>
    <div class="max-w-7xl mx-auto px-6 lg:px-10 relative z-10">
        <span class="font-mono text-lime/70 text-xs tracking-[0.3em] uppercase mb-6 block animate-fade-in">Get In Touch</span>
        <h1 class="font-display font-black text-6xl lg:text-8xl text-lavender leading-[0.85] mb-6 animate-slide-up">
            Let's Build<br><span class="italic text-pink">Something</span><br>Beautiful
        </h1>
        <p class="font-body text-warm text-lg max-w-lg animate-slide-up delay-200">
            We'd love to hear about your project. Fill in the form below or reach out directly — we respond within 24 hours.
        </p>
    </div>
</section>

{{-- Contact Content --}}
<section class="py-16 bg-cream">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="grid lg:grid-cols-5 gap-10">

            {{-- Left: Info --}}
            <div class="lg:col-span-2 space-y-6 reveal">
                {{-- Info cards --}}
                @foreach([
                ['icon'=>'📍','title'=>'Studio Location','value'=>'daerah sekitaran polmed, Jalan Almamater No.1, Padang Bulan, Kec. Medan Baru, Kota Medan, Sumatera Utara 20155'],
                ['icon'=>'✉️','title'=>'Email Us', 'value'=>'hello@frameupstudio.com'],
                ['icon'=>'📞','title'=>'Call Us', 'value'=>' 0895 - 1298 - 4144 & 0813 - 6201 - 8434'],
                ['icon'=>'🕐','title'=>'Working Hours', 'value'=>'13.00 - 16.00 WIB atau menyesuaikan'],
                ] as $info)
                <div class="bg-lavender/20 border border-lavender/30 rounded-3xl p-6 flex items-start gap-4">
                    <span class="text-2xl">{{ $info['icon'] }}</span>
                    <div>
                        <div class="font-mono font-semibold text-navy text-sm mb-1">{{ $info['title'] }}</div>
                        <div class="font-body text-charcoal/60 text-sm leading-relaxed">{{ $info['value'] }}</div>
                    </div>
                </div>
                @endforeach

                {{-- Social links --}}
                <div class="bg-navy rounded-3xl p-8">
                    <div class="font-mono font-semibold text-lavender text-sm mb-5 tracking-wide">Follow Our Work</div>
                    <div class="flex gap-3">
                        @foreach(['Instagram','Behance','Dribbble','Twitter'] as $soc)
                        <a href="#"
                            class="flex-1 text-center font-mono text-lavender/50 text-xs border border-lavender/20 rounded-2xl py-3 hover:text-lime hover:border-lime/30 transition-all duration-200">
                            {{ $soc }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Right: Form --}}
            <div class="lg:col-span-3 reveal delay-200">
                <div class="bg-white rounded-3xl p-10 shadow-xl shadow-navy/10">
                    <h2 class="font-display font-bold text-2xl text-navy mb-8">Tell us about your project</h2>

                    <form action="{{ url('/contact') }}" method="POST" class="space-y-6">
                        @csrf

                        {{-- Row 1 --}}
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="font-mono text-charcoal text-xs tracking-wide uppercase block mb-2">Your Name *</label>
                                <input type="text" name="name" placeholder="Riah Ulina Hutasoit" required
                                    class="w-full bg-cream border border-grey/30 rounded-2xl px-5 py-4 font-body text-charcoal text-sm placeholder-grey/50 focus:outline-none focus:border-navy/50 focus:bg-white transition-all duration-200">
                            </div>
                            <div>
                                <label class="font-mono text-charcoal text-xs tracking-wide uppercase block mb-2">Email Address *</label>
                                <input type="email" name="email" placeholder="riah@gmail.com" required
                                    class="w-full bg-cream border border-grey/30 rounded-2xl px-5 py-4 font-body text-charcoal text-sm placeholder-grey/50 focus:outline-none focus:border-navy/50 focus:bg-white transition-all duration-200">
                            </div>
                        </div>

                        {{-- Row 2 --}}
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="font-mono text-charcoal text-xs tracking-wide uppercase block mb-2">Major/Prodi</label>
                                <input type="text" name="company" placeholder="Your Major/Prodi"
                                    class="w-full bg-cream border border-grey/30 rounded-2xl px-5 py-4 font-body text-charcoal text-sm placeholder-grey/50 focus:outline-none focus:border-navy/50 focus:bg-white transition-all duration-200">
                            </div>
                            <div>
                                <label class="font-mono text-charcoal text-xs tracking-wide uppercase block mb-2">Budget Range</label>
                                <select name="budget"
                                    class="w-full bg-cream border border-grey/30 rounded-2xl px-5 py-4 font-body text-charcoal text-sm focus:outline-none focus:border-navy/50 focus:bg-white transition-all duration-200 appearance-none cursor-pointer">
                                    <option value="" disabled selected>Select a range</option>
                                    <option>Under Rp 15.000</option>
                                    <option>Rp 15.000 – 25.000</option>
                                    <option>Rp 20.000 – 50.000 </option>
                                    <option>Rp 50.000 ++</option>
                                </select>
                            </div>
                        </div>

                        {{-- Services --}}
                        <div>
                            <label class="font-mono text-charcoal text-xs tracking-wide uppercase block mb-3">Service(s) Needed</label>
                            <div class="flex flex-wrap gap-2">
                                @foreach([
                                'Photo Shoot',
                                'Photo Editing / Retouch',
                                'Print & Framing',
                                'Event Coverage',
                                'Product Photography',
                                'Wedding / Pre-wedding',
                                'Not sure yet'
                                ] as $svc)
                                <label class="cursor-pointer">
                                    <input type="checkbox" name="services[]" value="{{ $svc }}" class="sr-only peer">
                                    <span class="font-mono text-xs border border-grey/30 rounded-full px-4 py-2 text-charcoal/60
                                         peer-checked:bg-navy peer-checked:text-lavender peer-checked:border-navy
                                         hover:border-navy/40 transition-all duration-200 inline-block">
                                        {{ $svc }}
                                    </span>
                                </label>
                                @endforeach
                            </div>
                        </div>

                        {{-- Message --}}
                        <div>
                            <label class="font-mono text-charcoal text-xs tracking-wide uppercase block mb-2">Tell Us More Our Massage *</label>
                            <textarea name="message" rows="5" placeholder="Describe your project, goals, timeline, and anything else that's helpful..." required
                                class="w-full bg-cream border border-grey/30 rounded-2xl px-5 py-4 font-body text-charcoal text-sm placeholder-grey/50 focus:outline-none focus:border-navy/50 focus:bg-white transition-all duration-200 resize-none"></textarea>
                        </div>

                        {{-- Rating Survey --}}
                        <div>
                            <label class="font-mono text-charcoal text-xs tracking-wide uppercase block mb-2">Rate your expectations *</label>
                            <select name="rating" required
                                class="w-full border border-grey/30 rounded-2xl px-4 py-2 font-body text-charcoal text-sm focus:outline-none focus:border-navy/50 focus:bg-white transition-all duration-200 cursor-pointer">
                                <option value="" disabled selected>Choose rating</option>
                                <option value="1">1 - Poor</option>
                                <option value="2">2 - Fair</option>
                                <option value="3">3 - Good</option>
                                <option value="4">4 - Very Good</option>
                                <option value="5">5 - Excellent</option>
                            </select>
                        </div>

                        {{-- Submit --}}
                        <button type="submit"
                            class="w-full flex items-center justify-center gap-3 bg-navy text-lavender font-mono font-semibold text-sm py-5 rounded-2xl hover:bg-navy/90 hover:gap-5 active:scale-[0.98] transition-all duration-300 group">
                            Send Message
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                        </button>

                        <p class="font-body text-warm/60 text-xs text-center mt-2">
                            We respond to all inquiries within 24 business hours.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- FAQ --}}
<section class="py-20 bg-navy">
    <div class="max-w-3xl mx-auto px-6 lg:px-10">
        <div class="text-center mb-12 reveal">
            <span class="font-mono text-lime/70 text-xs tracking-[0.3em] uppercase mb-4 block">FAQ</span>
            <h2 class="font-display font-black text-3xl lg:text-4xl text-lavender">Common <span class="italic text-pink">Questions</span></h2>
        </div>
        @php
        $faqs = [
        ['q'=>'Berapa harga foto per frame di FrameUp Studio?', 'd'=>'Harga foto di FrameUp Studio mulai dari Rp5.000 per frame. Cocok untuk mahasiswa yang ingin foto bareng teman dengan harga terjangkau.', 'delay'=>'delay-0'],
        ['q'=>'Apakah hasil foto langsung jadi?', 'd'=>'Nah untuk hasil foto itu tidak di cetak yaa, jadi setelah foto selesai dipilih, hasil foto akan langsung dikirim oleh admin.', 'delay'=>'delay-100'],
        ['q'=>'Apakah bisa foto ramai-ramai?', 'd'=>'Tentu bisa. Fotobooth kami bisa digunakan untuk foto bersama teman, pasangan, atau kelompok kecil.', 'delay'=>'delay-200'],
        ['q'=>'Apakah bisa untuk acara kampus?', 'd'=>'Ya, FrameUp Studio juga bisa melayani acara kampus, organisasi, atau event khusus dengan konsep fotobooth.', 'delay'=>'delay-300'],
        ['q'=>'Di mana lokasi FrameUp Studio?', 'd'=>'FrameUp Studio berada di sekitar Politeknik Negeri Medan (Polmed) sehingga mudah dijangkau oleh mahasiswa.', 'delay'=>'delay-400'],
        ];
        @endphp
        <div class="space-y-4">
            @foreach($faqs as $faq)
            <div class="reveal {{ $faq['delay'] }} bg-lavender/5 border border-lavender/10 rounded-2xl overflow-hidden">
                <details class="group">
                    <summary class="font-body font-medium text-lavender text-sm px-7 py-5 cursor-pointer list-none flex justify-between items-center hover:text-lime transition-colors duration-200">
                        {{ $faq['q'] }}
                        <span class="ml-4 shrink-0 text-lavender/40 group-open:rotate-45 transition-transform duration-300 text-xl font-light">+</span>
                    </summary>
                    <div class="px-7 pb-6 font-body text-warm text-sm leading-relaxed border-t border-lavender/10">
                        <div class="pt-4">{{ $faq['d'] }}</div>
                    </div>
                </details>
            </div>
            @endforeach
        </div>
    </div>
</section>

@if(session('success'))
<script>
document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session("success") }}',
        confirmButtonText: 'OK',
        confirmButtonColor: '#22c55e'
    });
});
</script>
@endif

@endsection