<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — alsbakh</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="w-full max-w-md px-4">
    {{-- Logo --}}
    <div class="text-center mb-8">
        <a href="/" class="inline-block">
            <span class="text-3xl font-extrabold text-[#0B2C5E]">al<span class="text-[#D4A017]">sbakh</span></span>
        </a>
        <p class="mt-2 text-gray-500 text-sm">Admin Dashboard</p>
    </div>

    {{-- Card --}}
    <div class="bg-white rounded-2xl shadow-xl p-8">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Sign in to your account</h2>

        @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 rounded-lg px-4 py-3 text-sm mb-5">
            {{ $errors->first() }}
        </div>
        @endif

        <form method="POST" action="/admin/login" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email address</label>
                <input id="email" name="email" type="email" autocomplete="email" required
                       value="{{ old('email') }}"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0B2C5E] focus:border-transparent transition-shadow"
                       placeholder="admin@alsbakh.com">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                <input id="password" name="password" type="password" autocomplete="current-password" required
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0B2C5E] focus:border-transparent transition-shadow"
                       placeholder="••••••••">
            </div>

            <button type="submit"
                    class="w-full bg-[#D4A017] hover:bg-[#b8860b] text-white font-semibold py-3 rounded-lg transition-colors duration-200 text-sm">
                Sign In
            </button>
        </form>
    </div>

    <p class="text-center text-xs text-gray-400 mt-6">
        &copy; {{ date('Y') }} alsbakh. All rights reserved.
    </p>
</div>

</body>
</html>
