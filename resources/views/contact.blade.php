@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')

{{-- Page Header --}}
<section class="bg-[#0B2C5E] py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
        <h1 class="text-4xl font-extrabold">Contact Us</h1>
        <p class="mt-3 text-white/70 text-lg">We're here to help. Reach out via WhatsApp or email.</p>
        <nav class="mt-4 text-sm text-white/50">
            <a href="/" class="hover:text-white transition-colors">Home</a>
            <span class="mx-2">/</span>
            <span class="text-[#D4A017]">Contact</span>
        </nav>
    </div>
</section>

{{-- Contact Buttons --}}
<section class="py-16 bg-gray-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-14">
            {{-- WhatsApp --}}
            <a href="https://wa.me/966570619556" target="_blank"
               class="flex flex-col items-center justify-center gap-4 bg-white rounded-2xl shadow-lg hover:shadow-2xl p-10 border-2 border-transparent hover:border-green-500 transition-all duration-300 group">
                <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-200">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                </div>
                <div class="text-center">
                    <p class="font-bold text-[#0B2C5E] text-xl">WhatsApp</p>
                    <p class="text-gray-500 text-sm mt-1">+966 57 061 9556</p>
                    <span class="mt-3 inline-block bg-[#D4A017] text-white text-sm font-semibold px-5 py-2 rounded-full">Chat Now</span>
                </div>
            </a>

            {{-- Email --}}
            <a href="mailto:info@almubarmij.com"
               class="flex flex-col items-center justify-center gap-4 bg-white rounded-2xl shadow-lg hover:shadow-2xl p-10 border-2 border-transparent hover:border-[#1E6FBF] transition-all duration-300 group">
                <div class="w-16 h-16 bg-[#0B2C5E] rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-200">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                    </svg>
                </div>
                <div class="text-center">
                    <p class="font-bold text-[#0B2C5E] text-xl">Email</p>
                    <p class="text-gray-500 text-sm mt-1">info@almubarmij.com</p>
                    <span class="mt-3 inline-block bg-[#D4A017] text-white text-sm font-semibold px-5 py-2 rounded-full">Send Email</span>
                </div>
            </a>
        </div>

        {{-- Company Info --}}
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
            <h2 class="text-2xl font-bold text-[#0B2C5E] mb-6">Company Information</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 bg-[#0B2C5E]/10 rounded-lg flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-[#0B2C5E]" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800 text-sm">Address</p>
                        <p class="text-gray-500 text-sm mt-1">Riyadh, Saudi Arabia<br>Industrial District</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 bg-[#0B2C5E]/10 rounded-lg flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-[#0B2C5E]" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800 text-sm">Working Hours</p>
                        <p class="text-gray-500 text-sm mt-1">Sat–Thu: 8am–6pm<br>Fri: Closed</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 bg-[#0B2C5E]/10 rounded-lg flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-[#0B2C5E]" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800 text-sm">Phone</p>
                        <p class="text-gray-500 text-sm mt-1">+966 57 061 9556</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Google Maps --}}
        <div class="rounded-2xl overflow-hidden shadow-lg">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3624.5!2d46.7219!3d24.6877!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjTCsDQxJzE1LjciTiA0NsKwNDMnMTguOCJF!5e0!3m2!1sen!2ssa!4v1234567890"
                width="100%"
                height="350"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                class="w-full">
            </iframe>
        </div>
    </div>
</section>

@endsection
