<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative overflow-hidden">
            
            <!-- Animated Background Blobs for Glass Effect -->
            <div class="absolute top-0 left-0 w-full h-full -z-10" style="background-color: #f3f4f6;">
                <div class="absolute top-0 left-1/4 w-96 h-96 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
                <div class="absolute top-0 right-1/4 w-96 h-96 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
                <div class="absolute -bottom-8 left-20 w-96 h-96 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
            </div>

            <div>
                <a href="/">
                    <img src="{{ asset('build/assets/image/logo.png') }}" alt="Logo" style="max-width: 150px; height: auto;">
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-lg overflow-hidden sm:rounded-lg glass-card" style="border-top: 5px solid rgba(255,255,255,0.5);">
                {{ $slot }}
            </div>
        </div>
        
        <!-- Custom Styles for Auth Pages to match Portfolio Theme & Glassmorphism -->
        <style>
            .glass-card {
                background: rgba(255, 255, 255, 0.25);
                box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
                border-radius: 10px;
                border: 1px solid rgba(255, 255, 255, 0.18);
            }
            
            /* Override primary button color to match portfolio Teal */
            button[type="submit"], .inline-flex.items-center.px-4.py-2.bg-gray-800 {
                background-color: #34b7a7 !important;
                transition: background-color 0.3s;
                opacity: 0.9;
            }
            button[type="submit"]:hover, .inline-flex.items-center.px-4.py-2.bg-gray-800:hover {
                background-color: #2a9b8f !important;
                opacity: 1;
                transform: scale(1.02);
            }
            /* Focus rings and input styles for glass */
            input:focus, button:focus {
                --tw-ring-color: #34b7a7 !important;
                border-color: #34b7a7 !important;
            }
            input {
                background: rgba(255, 255, 255, 0.9) !important; /* Slightly transparent input */
            }

            /* Animations for background */
            @keyframes blob {
                0% { transform: translate(0px, 0px) scale(1); }
                33% { transform: translate(30px, -50px) scale(1.1); }
                66% { transform: translate(-20px, 20px) scale(0.9); }
                100% { transform: translate(0px, 0px) scale(1); }
            }
            .animate-blob {
                animation: blob 7s infinite;
            }
            .animation-delay-2000 {
                animation-delay: 2s;
            }
            .animation-delay-4000 {
                animation-delay: 4s;
            }
        </style>
    </body>
</html>
