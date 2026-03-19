<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — alsbakh Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-100 min-h-screen" x-data="{ sidebarOpen: true }">

<div class="flex min-h-screen">

    {{-- Sidebar --}}
    <aside class="w-64 bg-[#0B2C5E] text-white flex flex-col shrink-0 min-h-screen">
        {{-- Logo --}}
        <div class="h-16 flex items-center px-6 border-b border-white/10">
            <a href="/admin/products" class="text-xl font-extrabold tracking-tight">
                al<span class="text-[#D4A017]">sbakh</span>
                <span class="text-white/50 font-normal text-sm ml-1">Admin</span>
            </a>
        </div>

        {{-- Nav --}}
        <nav class="flex-1 py-6 px-4 space-y-1">
            <p class="text-white/40 text-xs uppercase tracking-widest px-3 mb-3">Catalog</p>
            <a href="/admin/products"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-medium transition-colors duration-150
                      {{ request()->is('admin/products*') ? 'bg-white/15 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
                Products
            </a>
        </nav>

        {{-- Bottom: view site --}}
        <div class="px-4 pb-6">
            <a href="/" target="_blank"
               class="flex items-center gap-2 px-3 py-2.5 rounded-lg text-white/50 hover:text-white hover:bg-white/10 transition-colors text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                View Website
            </a>
        </div>
    </aside>

    {{-- Main --}}
    <div class="flex-1 flex flex-col overflow-hidden">

        {{-- Topbar --}}
        <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6 shrink-0">
            <h1 class="font-semibold text-gray-800 text-lg">@yield('page-title', 'Dashboard')</h1>
            <div class="flex items-center gap-4">
                <span class="text-sm text-gray-500">{{ auth()->user()->email }}</span>
                <form method="POST" action="/admin/logout">
                    @csrf
                    <button type="submit"
                            class="text-sm bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium px-4 py-2 rounded-lg transition-colors">
                        Logout
                    </button>
                </form>
            </div>
        </header>

        {{-- Flash messages --}}
        <div class="px-6 pt-4">
            @if(session('success'))
            <div x-data="{ show: true }" x-show="show" x-transition
                 class="flex items-center justify-between bg-green-50 border border-green-200 text-green-800 rounded-lg px-4 py-3 text-sm mb-4">
                <span>{{ session('success') }}</span>
                <button @click="show = false" class="text-green-600 hover:text-green-800 ml-4">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            @endif
            @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-800 rounded-lg px-4 py-3 text-sm mb-4">
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>

        {{-- Content --}}
        <main class="flex-1 overflow-y-auto px-6 pb-8">
            @yield('content')
        </main>

    </div>
</div>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
