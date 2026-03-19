@extends('layouts.app')

@section('title', 'Home')

@section('content')

{{-- Hero Section --}}
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    {{-- Background image --}}
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1585659722983-3a675dabf23d?w=1600&q=90"
             alt="Premium Plumbing"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-[#0B2C5E]/75"></div>
    </div>

    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
        <span class="inline-block bg-[#D4A017]/20 text-[#D4A017] text-sm font-semibold px-4 py-1.5 rounded-full mb-6 border border-[#D4A017]/30 tracking-wide uppercase">
            Trusted Since 2010
        </span>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight mb-6">
            Premium Plumbing<br>
            <span class="text-[#D4A017]">Products & Solutions</span>
        </h1>
        <p class="text-lg sm:text-xl text-white/80 max-w-2xl mx-auto mb-10">
            Supplying top-tier plumbing products to distributors and contractors across Saudi Arabia and the Gulf region.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/products"
               class="bg-[#D4A017] hover:bg-[#b8860b] text-white font-semibold px-8 py-3.5 rounded-full transition-all duration-200 hover:shadow-lg hover:scale-105">
                Browse Products
            </a>
            <a href="/contact"
               class="bg-white/10 hover:bg-white/20 text-white border border-white/30 font-semibold px-8 py-3.5 rounded-full transition-all duration-200 hover:shadow-lg">
                Contact Us
            </a>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce text-white/60">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </div>
</section>

{{-- Stats Bar --}}
<section class="bg-[#0B2C5E] py-12" x-data="statsCounter()">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center text-white">
            <div x-intersect="startCounting()">
                <div class="text-4xl font-extrabold text-[#D4A017]">
                    <span x-text="counts[0]">0</span>+
                </div>
                <div class="mt-1 text-white/70 font-medium">Warehouses</div>
            </div>
            <div>
                <div class="text-4xl font-extrabold text-[#D4A017]">
                    <span x-text="counts[1]">0</span>+
                </div>
                <div class="mt-1 text-white/70 font-medium">Cities</div>
            </div>
            <div>
                <div class="text-4xl font-extrabold text-[#D4A017]">
                    <span x-text="counts[2]">0</span>+
                </div>
                <div class="mt-1 text-white/70 font-medium">Distributors</div>
            </div>
            <div>
                <div class="text-4xl font-extrabold text-[#D4A017]">
                    <span x-text="counts[3]">0</span>+
                </div>
                <div class="mt-1 text-white/70 font-medium">Products</div>
            </div>
        </div>
    </div>
</section>

{{-- Featured Products --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="text-[#D4A017] font-semibold uppercase tracking-widest text-sm">Our Selection</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-[#0B2C5E] mt-2">Featured Products</h2>
            <p class="mt-3 text-gray-500 max-w-xl mx-auto">Discover our most popular premium plumbing products trusted by professionals.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($featured as $product)
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden group">
                <div class="overflow-hidden h-56">
                    <img src="{{ $product->image_url }}"
                         alt="{{ $product->name }}"
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                </div>
                <div class="p-6">
                    <span class="text-xs font-semibold text-[#1E6FBF] uppercase tracking-wider">{{ $product->brand }} · {{ $product->origin }}</span>
                    <h3 class="mt-2 text-lg font-bold text-[#0B2C5E]">{{ $product->name }}</h3>
                    <p class="mt-2 text-gray-500 text-sm line-clamp-2">{{ $product->description }}</p>
                    <a href="/products/{{ $product->slug }}"
                       class="mt-5 inline-flex items-center gap-2 bg-[#D4A017] hover:bg-[#b8860b] text-white font-semibold px-6 py-2.5 rounded-full transition-colors duration-200 text-sm">
                        View Details
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-12 text-center">
            <a href="/products"
               class="inline-flex items-center gap-2 bg-[#0B2C5E] hover:bg-[#1E6FBF] text-white font-semibold px-8 py-3.5 rounded-full transition-colors duration-200">
                View All Products
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>

<script>
function statsCounter() {
    return {
        counts: [0, 0, 0, 0],
        targets: [8, 100, 3500, 3000],
        started: false,
        startCounting() {
            if (this.started) return;
            this.started = true;
            this.targets.forEach((target, i) => {
                let start = 0;
                const step = target / 60;
                const timer = setInterval(() => {
                    start = Math.min(start + step, target);
                    this.counts[i] = Math.round(start).toLocaleString();
                    if (start >= target) clearInterval(timer);
                }, 25);
            });
        }
    }
}
</script>

@endsection
