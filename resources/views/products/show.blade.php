@extends('layouts.app')

@section('title', $product->name)

@section('content')

{{-- Breadcrumb --}}
<section class="bg-[#0B2C5E] py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-sm text-white/60 mb-3">
            <a href="/" class="hover:text-white transition-colors">Home</a>
            <span class="mx-2">/</span>
            <a href="/products" class="hover:text-white transition-colors">Products</a>
            <span class="mx-2">/</span>
            <span class="text-[#D4A017]">{{ $product->name }}</span>
        </nav>
        <h1 class="text-3xl font-extrabold text-white">{{ $product->name }}</h1>
    </div>
</section>

{{-- Product Detail --}}
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-12">

            {{-- Left: Image (60%) --}}
            <div class="lg:w-3/5">
                <div class="rounded-2xl overflow-hidden shadow-xl group">
                    <img src="{{ $product->image_url }}"
                         alt="{{ $product->name }}"
                         class="w-full h-80 sm:h-[480px] object-cover transition-transform duration-700 group-hover:scale-105">
                </div>

                {{-- Related products --}}
                @if($related->isNotEmpty())
                <div class="mt-10">
                    <h2 class="text-xl font-bold text-[#0B2C5E] mb-5">Related Products</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                        @foreach ($related as $rel)
                        <a href="/products/{{ $rel->slug }}" class="group bg-white rounded-xl shadow hover:shadow-lg transition-all duration-300 overflow-hidden">
                            <div class="overflow-hidden h-36">
                                <img src="{{ $rel->image_url }}"
                                     alt="{{ $rel->name }}"
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            </div>
                            <div class="p-3">
                                <p class="text-xs text-[#1E6FBF] font-semibold uppercase">{{ $rel->brand }}</p>
                                <p class="text-sm font-bold text-[#0B2C5E] mt-1 leading-snug">{{ $rel->name }}</p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            {{-- Right: Details (40%) --}}
            <div class="lg:w-2/5">
                <div class="sticky top-24">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="bg-[#0B2C5E]/10 text-[#0B2C5E] text-xs font-semibold px-3 py-1 rounded-full uppercase tracking-wider">{{ $product->brand }}</span>
                        <span class="bg-gray-100 text-gray-600 text-xs font-medium px-3 py-1 rounded-full">{{ $product->origin }}</span>
                    </div>

                    <h1 class="text-3xl font-extrabold text-[#0B2C5E] leading-tight">{{ $product->name }}</h1>

                    <p class="mt-5 text-gray-600 leading-relaxed">{{ $product->description }}</p>

                    <div class="mt-6 space-y-3">
                        <div class="flex items-center gap-3 text-sm text-gray-700">
                            <svg class="w-5 h-5 text-[#D4A017] shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Brand: <strong>{{ $product->brand }}</strong>
                        </div>
                        <div class="flex items-center gap-3 text-sm text-gray-700">
                            <svg class="w-5 h-5 text-[#D4A017] shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Origin: <strong>{{ $product->origin }}</strong>
                        </div>
                        <div class="flex items-center gap-3 text-sm text-gray-700">
                            <svg class="w-5 h-5 text-[#D4A017] shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Professional grade quality
                        </div>
                        <div class="flex items-center gap-3 text-sm text-gray-700">
                            <svg class="w-5 h-5 text-[#D4A017] shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Certified &amp; tested
                        </div>
                    </div>

                    <div class="mt-8 flex flex-col sm:flex-row gap-3">
                        <a href="https://wa.me/966570619556?text=I'm%20interested%20in%20{{ urlencode($product->name) }}"
                           target="_blank"
                           class="flex items-center justify-center gap-2 bg-[#D4A017] hover:bg-[#b8860b] text-white font-semibold px-6 py-3 rounded-full transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            Request Quote
                        </a>
                        <button disabled
                                class="flex items-center justify-center gap-2 bg-gray-100 text-gray-400 font-semibold px-6 py-3 rounded-full cursor-not-allowed text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Download Catalog
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
