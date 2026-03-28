<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $hospital->name }} | MediConnect</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; }
    </style>
</head>
<body class="antialiased text-gray-800 selection:bg-blue-100 selection:text-blue-900 flex flex-col min-h-screen">
    
    <!-- Top Nav -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold tracking-tighter select-none">
                <span class="text-[#4285f4]">M</span><span class="text-[#ea4335]">e</span><span class="text-[#fbbc05]">d</span><span class="text-[#4285f4]">i</span><span class="text-[#34a853]">C</span><span class="text-[#ea4335]">o</span>
            </a>
            <nav class="space-x-4 text-sm font-medium">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-gray-600 hover:text-blue-600">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600">Login</a>
                    @endauth
                @endif
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">
        <!-- Hospital Header -->
        <div class="bg-white rounded-xl shadow-sm p-8 mb-8 border border-gray-100">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-2">{{ $hospital->name }}</h1>
            <p class="text-lg text-gray-500 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                {{ $hospital->address }}, {{ $hospital->thana->name ?? 'Unknown Area' }}
            </p>
            @if($hospital->phone)
            <div class="inline-flex items-center px-4 py-2 bg-blue-50 text-blue-700 rounded-full font-medium">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                {{ $hospital->phone }}
            </div>
            @endif
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column: Details & Services -->
            <div class="lg:col-span-2 space-y-8">
                
                @if($hospital->description)
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">About Hospital</h2>
                    <p class="text-gray-600 leading-relaxed">{{ $hospital->description }}</p>
                </div>
                @endif

                <!-- Services & Costs -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        Services & Costs
                    </h2>
                    @if($hospital->services->count() > 0)
                        <ul class="divide-y divide-gray-100">
                            @foreach($hospital->services as $service)
                            <li class="py-4 flex justify-between items-center hover:bg-gray-50 px-2 rounded -mx-2 transition-colors">
                                <span class="text-gray-800 font-medium">{{ $service->name }}</span>
                                <span class="bg-green-100 text-green-800 font-semibold px-3 py-1 rounded-full whitespace-nowrap">৳ {{ number_format($service->price, 2) }}</span>
                            </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500 italic">No services listed yet.</p>
                    @endif
                </div>

                <!-- Doctors List -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        Available Doctors
                    </h2>
                    @if($hospital->doctors->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($hospital->doctors as $doctor)
                            <div class="border border-gray-100 bg-gray-50 rounded-lg p-4 flex items-center space-x-4">
                                <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center font-bold text-xl uppercase">
                                    {{ substr($doctor->name, 0, 1) }}
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900">{{ $doctor->name }}</h3>
                                    <p class="text-sm text-gray-500">{{ $doctor->specialization ?? 'General Physician' }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 italic">No doctors assigned yet.</p>
                    @endif
                </div>

            </div>

            <!-- Right Column: Features Sticky -->
            <div class="lg:col-span-1">
                <div class="bg-blue-50 rounded-xl p-6 border border-blue-100 sticky top-24">
                    <h2 class="text-xl font-bold text-blue-900 mb-4">Key Features</h2>
                    @if($hospital->features->count() > 0)
                        <ul class="space-y-3">
                            @foreach($hospital->features as $feature)
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-blue-500 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                <span class="text-blue-800 font-medium">{{ $feature->name }}</span>
                            </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-blue-600 italic text-sm">No special features listed.</p>
                    @endif
                </div>
            </div>

        </div>
    </main>
</body>
</html>
