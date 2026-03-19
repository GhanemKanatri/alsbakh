@extends('layouts.admin')

@section('title', 'Products')
@section('page-title', 'Products')

@section('content')

<div class="flex items-center justify-between mb-6 pt-2">
    <p class="text-gray-500 text-sm">{{ $products->count() }} product(s) total</p>
    <a href="/admin/products/create"
       class="inline-flex items-center gap-2 bg-[#D4A017] hover:bg-[#b8860b] text-white font-semibold px-5 py-2.5 rounded-lg transition-colors text-sm">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Add New Product
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    @if($products->isEmpty())
    <div class="py-16 text-center text-gray-400">
        <svg class="w-12 h-12 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
        </svg>
        <p>No products yet. <a href="/admin/products/create" class="text-[#D4A017] hover:underline">Add the first one.</a></p>
    </div>
    @else
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-200">
            <tr>
                <th class="text-left px-5 py-3.5 font-semibold text-gray-600">Image</th>
                <th class="text-left px-5 py-3.5 font-semibold text-gray-600">Name</th>
                <th class="text-left px-5 py-3.5 font-semibold text-gray-600">Brand</th>
                <th class="text-left px-5 py-3.5 font-semibold text-gray-600">Origin</th>
                <th class="text-center px-5 py-3.5 font-semibold text-gray-600">Featured</th>
                <th class="text-right px-5 py-3.5 font-semibold text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($products as $product)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-5 py-3">
                    <img src="{{ $product->image_url }}"
                         alt="{{ $product->name }}"
                         class="w-14 h-14 rounded-lg object-cover border border-gray-100">
                </td>
                <td class="px-5 py-3">
                    <p class="font-semibold text-gray-800">{{ $product->name }}</p>
                    <p class="text-xs text-gray-400 mt-0.5">{{ $product->slug }}</p>
                </td>
                <td class="px-5 py-3 text-gray-600">{{ $product->brand ?: '—' }}</td>
                <td class="px-5 py-3 text-gray-600">{{ $product->origin ?: '—' }}</td>
                <td class="px-5 py-3 text-center">
                    @if($product->is_featured)
                        <span class="inline-flex items-center gap-1 bg-green-100 text-green-700 text-xs font-medium px-2.5 py-1 rounded-full">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            Yes
                        </span>
                    @else
                        <span class="inline-block bg-gray-100 text-gray-400 text-xs font-medium px-2.5 py-1 rounded-full">No</span>
                    @endif
                </td>
                <td class="px-5 py-3 text-right">
                    <div class="flex items-center justify-end gap-2">
                        <a href="/admin/products/{{ $product->id }}/edit"
                           class="inline-flex items-center gap-1.5 bg-[#0B2C5E] hover:bg-[#1E6FBF] text-white text-xs font-medium px-3.5 py-1.5 rounded-lg transition-colors">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Edit
                        </a>
                        <form method="POST" action="/admin/products/{{ $product->id }}"
                              onsubmit="return confirm('Delete \'{{ addslashes($product->name) }}\'? This cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="inline-flex items-center gap-1.5 bg-red-600 hover:bg-red-700 text-white text-xs font-medium px-3.5 py-1.5 rounded-lg transition-colors">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

@endsection
