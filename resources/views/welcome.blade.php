<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MediConnect Search</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="antialiased bg-white text-gray-800 selection:bg-blue-100 selection:text-blue-900 flex flex-col min-h-screen">
    
    <!-- Top Navigation (Gmail, Images, Profile) -->
    <nav class="w-full flex justify-end items-center p-4 space-x-4 text-sm text-gray-700 absolute top-0 right-0">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="hover:underline">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="hover:underline">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="bg-blue-600 text-white px-6 py-2 rounded font-medium hover:bg-blue-700 transition">Sign in</a>
                @endif
            @endauth
        @endif
    </nav>

    <!-- Main Content Area -->
    <main class="flex-grow flex flex-col items-center justify-center w-full px-4" style="min-height: calc(100vh - 100px);">
        
        <!-- Logo -->
        <div class="mb-6 flex flex-col items-center justify-center">
            <div class="text-[5.5rem] leading-none font-bold tracking-tighter select-none">
                <span class="text-[#4285f4]">M</span><span class="text-[#ea4335]">e</span><span class="text-[#fbbc05]">d</span><span class="text-[#4285f4]">i</span><span class="text-[#34a853]">C</span><span class="text-[#ea4335]">o</span>
            </div>
            <span class="text-[#4285f4] text-lg font-semibold tracking-wide mt-1 self-end -mr-8">Search</span>
        </div>

        <!-- Search Box -->
        <div class="w-full max-w-[584px] relative group mt-2">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
            </div>
            <input type="text" class="w-full border border-gray-200 hover:shadow-[0_1px_6px_rgba(32,33,36,0.28)] focus:shadow-[0_1px_6px_rgba(32,33,36,0.28)] rounded-full py-3 pl-12 pr-12 text-base outline-none transition-shadow" placeholder="Search for doctors, hospitals, medicines...">
            <div class="absolute inset-y-0 right-0 pr-4 flex items-center cursor-pointer">
                <!-- Microphone Icon Fake -->
                <svg class="h-5 w-5 text-[#4285f4] hover:text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                </svg>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-wrap justify-center gap-3 mt-7">
            <button class="bg-[#f8f9fa] border border-[#f8f9fa] hover:border-[#dadce0] hover:shadow-sm text-sm text-[#3c4043] py-2 px-4 rounded outline-none focus:border-[#4285f4]">
                Medical Search
            </button>
            <button class="bg-[#f8f9fa] border border-[#f8f9fa] hover:border-[#dadce0] hover:shadow-sm text-sm text-[#3c4043] py-2 px-4 rounded outline-none focus:border-[#4285f4]">
                I'm Feeling Lucky
            </button>
        </div>

        <!-- Language Options -->
        <div class="mt-7 text-sm text-[#4d5156]">
            MediConnect offered in: <a href="#" class="text-[#1a0dab] hover:underline mx-1">বাংলা</a> <a href="#" class="text-[#1a0dab] hover:underline mx-1">हिन्दी</a>
        </div>

    </main>

    <!-- Footer Area -->
    <footer class="bg-[#f2f2f2] flex flex-col text-sm text-[#70757a] w-full absolute bottom-0">
        <div class="px-8 py-3.5 border-b border-[#dadce0]">
            Bangladesh
        </div>
        <div class="flex flex-col sm:flex-row justify-between px-8 py-3">
            <div class="flex flex-wrap justify-center sm:justify-start gap-x-7 gap-y-3 mb-4 sm:mb-0">
                <a href="#" class="hover:underline">About</a>
                <a href="#" class="hover:underline">Advertising</a>
                <a href="#" class="hover:underline">Business</a>
                <a href="#" class="hover:underline">How Search works</a>
            </div>
            <div class="flex flex-wrap justify-center sm:justify-end gap-x-7 gap-y-3">
                <a href="#" class="hover:underline">Privacy</a>
                <a href="#" class="hover:underline">Terms</a>
                <a href="#" class="hover:underline">Settings</a>
            </div>
        </div>
    </footer>

</body>
</html>
