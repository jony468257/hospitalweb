<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'MediConnect') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-secondary bg-slate-950">
        <!-- Full-screen Medical Image Background -->
        <div class="fixed inset-0 z-0">
            <img 
                src="https://images.unsplash.com/photo-1631217868264-e5b90bb7e133?auto=format&fit=crop&w=2091&q=80" 
                alt="Medical Background"
                class="w-full h-full object-cover select-none"
            >
            <!-- Deep dark overlay -->
            <div class="absolute inset-0 bg-[#020409]/80"></div>
        </div>

        <!-- Centered Modal Container -->
        <div class="relative z-10 min-h-screen flex items-center justify-center px-4 py-16">
            <div class="relative w-full">
                <!-- Back to Home -->
                <div class="flex justify-center mb-6">
                    <a href="/" class="flex items-center gap-2 text-white/40 hover:text-white transition-colors group text-xs font-bold uppercase tracking-widest">
                        <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                        Back to Portal
                    </a>
                </div>

                {{ $slot }}
            </div>
        </div>
    </body>
</html>
