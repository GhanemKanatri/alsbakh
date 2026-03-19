@extends('layouts.app')

@section('title', 'Products')

@section('content')

{{-- Page Header --}}
<section class="bg-[#0B2C5E] py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
        <h1 class="text-4xl font-extrabold">Our Products</h1>
        <p class="mt-3 text-white/70 text-lg">Premium plumbing solutions from world-class brands</p>
        <nav class="mt-4 text-sm text-white/50">
            <a href="/" class="hover:text-white transition-colors">Home</a>
            <span class="mx-2">/</span>
            <span class="text-[#D4A017]">Products</span>
        </nav>
    </div>
</section>

{{-- Products Grid --}}
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($products->isEmpty())
            <p class="text-center text-gray-500">No products available yet.</p>
        @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($products as $product)
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden group">
                <div class="overflow-hidden h-56">
                    <img src="{{ $product->image_url }}"
                         alt="{{ $product->name }}"
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-xs font-semibold text-[#1E6FBF] uppercase tracking-wider">{{ $product->brand }}</span>
                        <span class="text-gray-300">·</span>
                        <span class="text-xs text-gray-400">{{ $product->origin }}</span>
                    </div>
                    <h3 class="text-lg font-bold text-[#0B2C5E]">{{ $product->name }}</h3>
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
        @endif
    </div>
</section>

@endsection
