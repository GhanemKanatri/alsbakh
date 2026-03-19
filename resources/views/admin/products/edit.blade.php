@extends('layouts.admin')

@section('title', 'Edit Product')
@section('page-title', 'Edit Product')

@section('content')

<div class="max-w-2xl pt-2" x-data="{
    imageUrl: '{{ old('image_url', $product->image_url) }}',
}">

    <div class="mb-5">
        <a href="/admin/products" class="inline-flex items-center gap-1.5 text-sm text-gray-500 hover:text-gray-800 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Back to Products
        </a>
    </div>

    <form method="POST" action="/admin/products/{{ $product->id }}" class="bg-white rounded-xl shadow-sm border border-gray-200 p-7 space-y-6">
        @csrf
        @method('PUT')

        {{-- Name --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1.5">Product Name <span class="text-red-500">*</span></label>
            <input type="text" name="name" required
                   value="{{ old('name', $product->name) }}"
                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0B2C5E] focus:border-transparent">
        </div>

        {{-- Description --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1.5">Description</label>
            <textarea name="description" rows="3"
                      class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0B2C5E] focus:border-transparent resize-none">{{ old('description', $product->description) }}</textarea>
        </div>

        {{-- Image URL --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1.5">Image URL <span class="text-red-500">*</span></label>
            <input type="url" name="image_url" x-model="imageUrl" required
                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0B2C5E] focus:border-transparent">
            <div x-show="imageUrl" class="mt-3">
                <img :src="imageUrl" alt="Preview" class="h-36 rounded-lg object-cover border border-gray-200">
            </div>
        </div>

        {{-- Brand & Origin --}}
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Brand</label>
                <input type="text" name="brand"
                       value="{{ old('brand', $product->brand) }}"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0B2C5E] focus:border-transparent">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Origin</label>
                <input type="text" name="origin"
                       value="{{ old('origin', $product->origin) }}"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0B2C5E] focus:border-transparent">
            </div>
        </div>

        {{-- Slug --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1.5">Slug <span class="text-red-500">*</span></label>
            <input type="text" name="slug" required
                   value="{{ old('slug', $product->slug) }}"
                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0B2C5E] focus:border-transparent font-mono">
            <p class="text-xs text-gray-400 mt-1">URL: /products/{{ $product->slug }}</p>
        </div>

        {{-- Is Featured --}}
        <div class="flex items-center gap-3">
            <input type="checkbox" name="is_featured" id="is_featured" value="1"
                   {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}
                   class="w-4 h-4 rounded border-gray-300 text-[#0B2C5E] focus:ring-[#0B2C5E]">
            <label for="is_featured" class="text-sm font-medium text-gray-700">Feature this product on the homepage</label>
        </div>

        {{-- Actions --}}
        <div class="flex items-center gap-3 pt-2 border-t border-gray-100">
            <button type="submit"
                    class="bg-[#D4A017] hover:bg-[#b8860b] text-white font-semibold px-6 py-2.5 rounded-lg transition-colors text-sm">
                Update Product
            </button>
            <a href="/admin/products"
               class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium px-6 py-2.5 rounded-lg transition-colors text-sm">
                Cancel
            </a>
        </div>
    </form>

    {{-- Delete section --}}
    <div class="mt-6 bg-white rounded-xl shadow-sm border border-red-100 p-6">
        <h3 class="text-sm font-semibold text-red-700 mb-2">Danger Zone</h3>
        <p class="text-sm text-gray-500 mb-4">Permanently delete this product. This action cannot be undone.</p>
        <form method="POST" action="/admin/products/{{ $product->id }}"
              onsubmit="return confirm('Delete \'{{ addslashes($product->name) }}\'? This cannot be undone.')">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white font-semibold px-5 py-2.5 rounded-lg transition-colors text-sm">
                Delete This Product
            </button>
        </form>
    </div>

</div>

@endsection
