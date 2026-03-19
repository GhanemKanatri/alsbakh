<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'alsbakh') — Premium Plumbing Products</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-white text-gray-900" x-data="{ mobileOpen: false, scrolled: false }" @scroll.window="scrolled = window.scrollY > 20">

    {{-- Sticky Navbar --}}
    <header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
            :class="scrolled ? 'bg-[#0B2C5E]/95 backdrop-blur-md shadow-lg' : 'bg-[#0B2C5E]'">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                {{-- Logo --}}
                <a href="/" class="flex items-center gap-2">
                    <span class="text-2xl font-extrabold text-white tracking-tight">al<span class="text-[#D4A017]">sbakh</span></span>
                </a>

                {{-- Desktop Nav --}}
                <div class="hidden md:flex items-center gap-8">
                    <a href="/" class="text-white/90 hover:text-[#D4A017] font-medium transition-colors duration-200 {{ request()->is('/') ? 'text-[#D4A017]' : '' }}">Home</a>

                    {{-- Products Dropdown --}}
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" @click.away="open = false"
                                class="flex items-center gap-1 text-white/90 hover:text-[#D4A017] font-medium transition-colors duration-200 {{ request()->is('products*') ? 'text-[#D4A017]' : '' }}">
                            Products
                            <svg class="w-4 h-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-150"
                             x-transition:enter-start="opacity-0 translate-y-1"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100 translate-y-0"
                             x-transition:leave-end="opacity-0 translate-y-1"
                             class="absolute top-full mt-2 w-48 bg-white rounded-xl shadow-xl border border-gray-100 py-2">
                            <a href="/products" class="block px-4 py-2 text-gray-700 hover:bg-gray-50 hover:text-[#1E6FBF] font-medium">All Products</a>
                        </div>
                    </div>

                    <a href="/contact" class="text-white/90 hover:text-[#D4A017] font-medium transition-colors duration-200 {{ request()->is('contact') ? 'text-[#D4A017]' : '' }}">Contact</a>
                    <a href="/contact" class="bg-[#D4A017] hover:bg-[#b8860b] text-white font-semibold px-5 py-2 rounded-full transition-colors duration-200">
                        Get a Quote
                    </a>
                </div>

                {{-- Mobile hamburger --}}
                <button @click="mobileOpen = !mobileOpen" class="md:hidden text-white p-2 rounded-lg hover:bg-white/10">
                    <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            {{-- Mobile menu --}}
            <div x-show="mobileOpen" x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-2"
                 class="md:hidden pb-4 border-t border-white/20 mt-2 pt-4 space-y-1">
                <a href="/" class="block px-3 py-2 text-white/90 hover:text-[#D4A017] font-medium rounded-lg hover:bg-white/10">Home</a>
                <a href="/products" class="block px-3 py-2 text-white/90 hover:text-[#D4A017] font-medium rounded-lg hover:bg-white/10">Products</a>
                <a href="/contact" class="block px-3 py-2 text-white/90 hover:text-[#D4A017] font-medium rounded-lg hover:bg-white/10">Contact</a>
                <a href="/contact" class="block mt-2 bg-[#D4A017] hover:bg-[#b8860b] text-white font-semibold px-5 py-2 rounded-full text-center transition-colors duration-200">Get a Quote</a>
            </div>
        </nav>
    </header>

    {{-- Page content --}}
    <main class="pt-16">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-[#0B2C5E] text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                {{-- Brand --}}
                <div>
                    <span class="text-2xl font-extrabold tracking-tight">al<span class="text-[#D4A017]">sbakh</span></span>
                    <p class="mt-3 text-white/70 text-sm leading-relaxed">
                        Premium plumbing products for residential and commercial projects. Quality brands, competitive prices.
                    </p>
                </div>

                {{-- Links --}}
                <div>
                    <h3 class="font-semibold text-[#D4A017] mb-3">Quick Links</h3>
                    <ul class="space-y-2 text-sm text-white/70">
                        <li><a href="/" class="hover:text-white transition-colors">Home</a></li>
                        <li><a href="/products" class="hover:text-white transition-colors">Products</a></li>
                        <li><a href="/contact" class="hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>

                {{-- Contact --}}
                <div>
                    <h3 class="font-semibold text-[#D4A017] mb-3">Contact</h3>
                    <ul class="space-y-2 text-sm text-white/70">
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/></svg>
                            +966 57 061 9556
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/></svg>
                            info@almubarmij.com
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                            Riyadh, Saudi Arabia
                        </li>
                    </ul>
                </div>
            </div>

            <div class="mt-10 pt-6 border-t border-white/20 text-center text-sm text-white/50">
                &copy; {{ date('Y') }} alsbakh. All rights reserved.
            </div>
        </div>
    </footer>

    {{-- WhatsApp floating button --}}
    <a href="https://wa.me/966570619556" target="_blank"
       class="fixed bottom-6 right-6 z-50 bg-green-500 hover:bg-green-600 text-white rounded-full w-14 h-14 flex items-center justify-center shadow-lg transition-transform duration-200 hover:scale-110"
       title="Chat on WhatsApp">
        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
    </a>

    {{-- Alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
