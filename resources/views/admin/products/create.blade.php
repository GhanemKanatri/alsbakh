@extends('layouts.admin')

@section('title', 'Add Product')
@section('page-title', 'Add New Product')

@section('content')

<div class="max-w-2xl pt-2" x-data="{
    name: '{{ old('name') }}',
    slug: '{{ old('slug') }}',
    imageUrl: '{{ old('image_url') }}',
    slugEdited: {{ old('slug') ? 'true' : 'false' }},
    generateSlug() {
        if (!this.slugEdited) {
            this.slug = this.name.toLowerCase()
                .replace(/\s+/g, '-')
                .replace(/[^a-z0-9-]/g, '')
                .replace(/-+/g, '-')
                .replace(/^-|-$/g, '');
        }
    }
}">

    <div class="mb-5">
        <a href="/admin/products" class="inline-flex items-center gap-1.5 text-sm text-gray-500 hover:text-gray-800 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Back to Products
        </a>
    </div>

    <form method="POST" action="/admin/products" class="bg-white rounded-xl shadow-sm border border-gray-200 p-7 space-y-6">
        @csrf

        {{-- Name --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1.5">Product Name <span class="text-red-500">*</span></label>
            <input type="text" name="name" x-model="name" x-on:input="generateSlug()" required
                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0B2C5E] focus:border-transparent"
                   placeholder="e.g. Premium Chrome Basin Mixer">
        </div>

        {{-- Description --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1.5">Description</label>
            <textarea name="description" rows="3"
                      class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0B2C5E] focus:border-transparent resize-none"
                      placeholder="Product description...">{{ old('description') }}</textarea>
        </div>

        {{-- Image URL --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1.5">Image URL <span class="text-red-500">*</span></label>
            <input type="url" name="image_url" x-model="imageUrl" required
                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0B2C5E] focus:border-transparent"
                   placeholder="https://images.unsplash.com/...">
            <div x-show="imageUrl" class="mt-3">
                <img :src="imageUrl" alt="Preview" class="h-36 rounded-lg object-cover border border-gray-200"
                     x-on:error="imageUrl = ''">
            </div>
        </div>

        {{-- Brand & Origin --}}
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Brand</label>
                <input type="text" name="brand" value="{{ old('brand') }}"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0B2C5E] focus:border-transparent"
                       placeholder="e.g. Grohe">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Origin</label>
                <input type="text" name="origin" value="{{ old('origin') }}"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0B2C5E] focus:border-transparent"
                       placeholder="e.g. Germany">
            </div>
        </div>

        {{-- Slug --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1.5">Slug <span class="text-red-500">*</span></label>
            <input type="text" name="slug" x-model="slug" x-on:input="slugEdited = true" required
                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0B2C5E] focus:border-transparent font-mono"
                   placeholder="auto-generated-from-name">
            <p class="text-xs text-gray-400 mt-1">Auto-generated from name. URL: /products/<span x-text="slug || 'your-slug'" class="font-medium"></span></p>
        </div>

        {{-- Is Featured --}}
        <div class="flex items-center gap-3">
            <input type="checkbox" name="is_featured" id="is_featured" value="1"
                   {{ old('is_featured') ? 'checked' : '' }}
                   class="w-4 h-4 rounded border-gray-300 text-[#0B2C5E] focus:ring-[#0B2C5E]">
            <label for="is_featured" class="text-sm font-medium text-gray-700">Feature this product on the homepage</label>
        </div>

        {{-- Actions --}}
        <div class="flex items-center gap-3 pt-2 border-t border-gray-100">
            <button type="submit"
                    class="bg-[#D4A017] hover:bg-[#b8860b] text-white font-semibold px-6 py-2.5 rounded-lg transition-colors text-sm">
                Add Product
            </button>
            <a href="/admin/products"
               class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium px-6 py-2.5 rounded-lg transition-colors text-sm">
                Cancel
            </a>
        </div>
    </form>
</div>

@endsection
