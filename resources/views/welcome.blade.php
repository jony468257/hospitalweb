<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MediConnect | Find Trusted Medical Care</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Outfit:300,400,500,600,700,800&display=swap" rel="stylesheet" />
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Outfit', sans-serif; scroll-behavior: smooth; }
        .glass-nav { background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(12px); border-bottom: 1px solid rgba(0, 0, 0, 0.05); }
        .hero-pattern { background-image: radial-gradient(#38bdf8 0.5px, transparent 0.5px), radial-gradient(#38bdf8 0.5px, #ffffff 0.5px); background-size: 20px 20px; background-position: 0 0,10px 10px; opacity: 0.1; }
        .gradient-text { background: linear-gradient(135deg, #0ea5e9, #2dd4bf); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; }
        .btn-premium { background: linear-gradient(135deg, #0ea5e9, #0284c7); transition: all 0.3s ease; }
        .btn-premium:hover { transform: translateY(-2px); box-shadow: 0 10px 15px -3px rgba(14, 165, 233, 0.3); }
    </style>
</head>
<body class="antialiased bg-[#fcfdfe] text-gray-900 selection:bg-sky-100 selection:text-sky-900 flex flex-col min-h-screen">
    
    <!-- Professional Navigation -->
    <nav class="fixed top-0 w-full z-[100] glass-nav">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            <div class="flex items-center space-x-2 text-sky-600 font-bold text-2xl tracking-tighter">
                <i data-lucide="shield-check" class="w-8 h-8"></i>
                <span>MediConnect</span>
            </div>
            <div class="hidden lg:flex items-center space-x-8 text-sm font-semibold text-gray-600">
                <a href="#specialties" class="hover:text-sky-600 transition">Specialties</a>
                <a href="#hospitals" class="hover:text-sky-600 transition">Hospitals</a>
                <a href="#pharmacies" class="hover:text-sky-600 transition">Pharmacies</a>
                <a href="#" class="text-orange-500 flex items-center"><i data-lucide="zap" class="w-4 h-4 mr-1"></i> Emergency</a>
            </div>
            <div class="flex items-center space-x-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn-premium text-white px-6 py-2.5 rounded-full text-sm font-bold shadow-lg">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sky-600 font-bold text-sm">Login</a>
                    <a href="{{ route('register') }}" class="btn-premium text-white px-6 py-2.5 rounded-full text-sm font-bold shadow-lg">Join Network</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Professional Hero Section -->
    <section class="pt-32 pb-20 relative overflow-hidden">
        <div class="absolute inset-0 hero-pattern pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center relative z-10">
            <!-- Left: Content -->
            <div class="space-y-8">
                <div class="inline-flex items-center space-x-2 px-4 py-1.5 bg-sky-50 text-sky-600 rounded-full text-xs font-bold uppercase tracking-widest border border-sky-100">
                    <span class="relative flex h-2 w-2">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-2 w-2 bg-sky-500"></span>
                    </span>
                    <span>24/7 Verified Care Network</span>
                </div>
                <h1 class="text-6xl md:text-7xl font-extrabold leading-[1.1] tracking-tight text-slate-900">
                    Find the <span class="gradient-text">Right Care</span><br>at the Right Time.
                </h1>
                <p class="text-xl text-slate-500 max-w-lg leading-relaxed">
                    Access Bangladesh's most extensive medical directory. Instantly find hospitals, compare pricing, and connect with top specialists.
                </p>

                <!-- Professional Multi-Search Bar -->
                <div class="bg-white p-2 rounded-3xl shadow-2xl shadow-sky-100 border border-slate-100 flex flex-col md:flex-row items-center gap-2">
                    <div class="flex-grow flex items-center pl-4 w-full">
                        <i data-lucide="search" class="w-5 h-5 text-slate-400 mr-2"></i>
                        <input type="text" class="w-full bg-transparent border-none focus:ring-0 py-4 text-slate-800 placeholder-slate-400 font-medium" placeholder="Condition or Specialty">
                    </div>
                    <div class="hidden md:flex items-center px-4 border-l border-slate-100 min-w-[200px]">
                        <i data-lucide="map-pin" class="w-5 h-5 text-sky-500 mr-2"></i>
                        <input type="text" class="w-full bg-transparent border-none focus:ring-0 text-slate-600 font-medium whitespace-nowrap" placeholder="Location" value="Dhaka, BD">
                    </div>
                    <button class="bg-slate-900 text-white px-10 py-4 rounded-2xl font-bold hover:bg-slate-800 transition-all w-full md:w-auto">
                        Find Care
                    </button>
                </div>

                <div class="flex items-center space-x-8 pt-4">
                    <div class="flex flex-col">
                        <span class="text-2xl font-bold text-slate-900">2,500+</span>
                        <span class="text-xs font-bold text-slate-400 uppercase tracking-tighter">Hospitals</span>
                    </div>
                    <div class="w-px h-10 bg-slate-200"></div>
                    <div class="flex flex-col">
                        <span class="text-2xl font-bold text-slate-900">10k+</span>
                        <span class="text-xs font-bold text-slate-400 uppercase tracking-tighter">Verified Doctors</span>
                    </div>
                    <div class="w-px h-10 bg-slate-200"></div>
                    <div class="flex flex-col">
                        <span class="text-2xl font-bold text-slate-900">1.2M</span>
                        <span class="text-xs font-bold text-slate-400 uppercase tracking-tighter">Happy Patients</span>
                    </div>
                </div>
            </div>

            <!-- Right: Hero Image Container (Professional Frame) -->
            <div class="relative">
                <div class="absolute -inset-4 bg-sky-200 rounded-[3rem] rotate-3 opacity-20 blur-2xl"></div>
                <div class="relative bg-white p-3 rounded-[3rem] shadow-2xl overflow-hidden border border-slate-100">
                    <img src="/images/hero-banner.png" alt="Medical Professional" class="rounded-[2.5rem] w-full h-auto object-cover aspect-[4/5] lg:aspect-auto">
                    <!-- Floating Trust Badge -->
                    <div class="absolute bottom-10 left-10 right-10 bg-white/80 backdrop-blur-md p-6 rounded-3xl border border-white/50 flex items-center justify-between shadow-xl">
                        <div class="flex items-center space-x-3">
                            <div class="bg-green-500 rounded-full p-2 text-white"><i data-lucide="check" class="w-5 h-5"></i></div>
                            <div>
                                <h3 class="font-bold text-slate-900 leading-none">Instant Help</h3>
                                <p class="text-[10px] text-slate-500 font-bold uppercase mt-1">Response time: 2 mins</p>
                            </div>
                        </div>
                        <button class="bg-sky-100 text-sky-600 px-4 py-2 rounded-xl text-xs font-bold">Contact Now</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Specialties Grid -->
    <section id="specialties" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
                <div class="max-w-xl">
                    <h2 class="text-4xl font-bold text-slate-900 mb-4">Book by <span class="text-sky-600">Specialty</span></h2>
                    <p class="text-slate-500 leading-relaxed font-medium text-lg">Connect with renowned experts across 20+ departments, ready to provide elite care for your specific needs.</p>
                </div>
                <a href="#" class="text-sky-600 font-bold flex items-center hover:translate-x-2 transition-transform">See all specialties <i data-lucide="arrow-right" class="ml-2 w-5 h-5"></i></a>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $specialties = [
                        ['icon' => 'heart', 'name' => 'Cardiology', 'color' => 'red'],
                        ['icon' => 'baby', 'name' => 'Pediatrics', 'color' => 'sky'],
                        ['icon' => 'brain', 'name' => 'Neurology', 'color' => 'purple'],
                        ['icon' => 'scissors', 'name' => 'Surgery', 'color' => 'indigo'],
                        ['icon' => 'microscope', 'name' => 'Diagnostics', 'color' => 'emerald'],
                        ['icon' => 'pill', 'name' => 'Pharmacies', 'color' => 'orange'],
                        ['icon' => 'ambulance', 'name' => 'Emergency', 'color' => 'rose'],
                        ['icon' => 'eye', 'name' => 'Ophthalmology', 'color' => 'teal'],
                    ];
                @endphp
                @foreach($specialties as $s)
                <a href="#" class="group flex flex-col items-center p-8 bg-slate-50 rounded-3xl border border-transparent hover:border-{{ $s['color'] }}-200 hover:bg-white hover:shadow-xl hover:shadow-{{ $s['color'] }}-50 transition-all duration-500">
                    <div class="w-16 h-16 bg-{{ $s['color'] }}-100 text-{{ $s['color'] }}-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500">
                        <i data-lucide="{{ $s['icon'] }}" class="w-8 h-8"></i>
                    </div>
                    <span class="font-bold text-slate-900 text-lg">{{ $s['name'] }}</span>
                    <span class="text-[10px] uppercase font-bold text-slate-400 mt-2 tracking-widest">Available Now</span>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Top Hospitals / Discovery Section -->
    <section id="hospitals" class="py-24 bg-slate-50/50">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-4xl font-bold text-slate-900 mb-12 text-center">Top Rated <span class="text-sky-600">Health Centers</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Static Demos for Public Clarity -->
                @for($i=1; $i<=3; $i++)
                <div class="bg-white rounded-3xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-2xl transition-all duration-500 group">
                    <div class="relative h-64 bg-slate-200">
                        <!-- Placeholder for hospital image -->
                        <div class="absolute inset-0 bg-slate-800 flex items-center justify-center text-white/20 font-bold text-4xl">Image Mock</div>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold flex items-center text-slate-900">
                            <i data-lucide="star" class="w-3 h-3 text-yellow-400 fill-yellow-400 mr-1"></i> 4.9 (2k+ Reviews)
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-extrabold text-slate-900 mb-2">Central Medical Center</h3>
                        <p class="text-slate-500 text-sm mb-6 flex items-center">
                            <i data-lucide="map-pin" class="w-4 h-4 mr-1 text-sky-500"></i> Dhanmondi, Dhaka - 1205
                        </p>
                        <div class="flex flex-wrap gap-2 mb-8">
                            <span class="px-3 py-1 bg-sky-50 text-sky-600 text-[10px] font-bold rounded-lg uppercase">ICU Available</span>
                            <span class="px-3 py-1 bg-emerald-50 text-emerald-600 text-[10px] font-bold rounded-lg uppercase">24/7 Oxygen</span>
                        </div>
                        <button class="w-full bg-slate-50 group-hover:bg-sky-600 group-hover:text-white py-4 rounded-2xl text-slate-900 font-bold transition-all duration-300">View Services</button>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-24 bg-slate-900 text-white overflow-hidden relative">
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div>
                    <h2 class="text-5xl font-bold mb-8 leading-tight">Elite Care is Just a <span class="text-sky-400">Search Away</span>.</h2>
                    <ul class="space-y-8">
                        <li class="flex items-start space-x-6">
                            <div class="bg-sky-500/20 p-4 rounded-2xl text-sky-400"><i data-lucide="verified" class="w-8 h-8"></i></div>
                            <div>
                                <h4 class="text-xl font-bold mb-2">100% Verified Partners</h4>
                                <p class="text-slate-400 leading-relaxed font-medium text-lg">We personally visit and verify every hospital and clinic listed on our platform for your safety.</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-6">
                            <div class="bg-sky-500/20 p-4 rounded-2xl text-sky-400"><i data-lucide="dollar-sign" class="w-8 h-8"></i></div>
                            <div>
                                <h4 class="text-xl font-bold mb-2">Transparent Pricing</h4>
                                <p class="text-slate-400 leading-relaxed font-medium text-lg">No hidden charges. Compare ICU rates, bed costs, and consultation fees instantly.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="relative">
                    <div class="bg-sky-900/30 p-12 rounded-[4rem] border border-sky-800/50 backdrop-blur-3xl">
                        <div class="text-center mb-10">
                            <div class="text-4xl font-bold mb-2">Ready to list your Hospital?</div>
                            <p class="text-slate-400 font-medium">Join 2,500+ clinics getting patients every day.</p>
                        </div>
                        <a href="{{ route('register') }}" class="block w-full bg-sky-500 hover:bg-sky-400 py-6 rounded-3xl text-center text-slate-900 font-bold text-xl transition-all shadow-2xl shadow-sky-900">Partner with Us Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Professional Footer -->
    <footer class="bg-white pt-24 pb-12 border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-20">
                <div class="col-span-1 md:col-span-1">
                    <div class="flex items-center space-x-2 text-sky-600 font-bold text-2xl mb-8">
                        <i data-lucide="shield-check" class="w-8 h-8"></i>
                        <span>MediConnect</span>
                    </div>
                    <p class="text-slate-500 font-medium leading-relaxed mb-8">Bangladesh's most trusted hospital directory and healthcare search platform.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-slate-50 rounded-xl flex items-center justify-center text-slate-400 hover:text-sky-600 transition"><i data-lucide="facebook" class="w-5 h-5"></i></a>
                        <a href="#" class="w-10 h-10 bg-slate-50 rounded-xl flex items-center justify-center text-slate-400 hover:text-sky-600 transition"><i data-lucide="twitter" class="w-5 h-5"></i></a>
                        <a href="#" class="w-10 h-10 bg-slate-50 rounded-xl flex items-center justify-center text-slate-400 hover:text-sky-600 transition"><i data-lucide="instagram" class="w-5 h-5"></i></a>
                    </div>
                </div>
                <div>
                    <h5 class="font-bold text-slate-900 mb-8 uppercase text-xs tracking-widest">Main Services</h5>
                    <ul class="space-y-4 text-slate-500 font-bold text-sm">
                        <li><a href="#" class="hover:text-sky-600 transition">Find a Hospital</a></li>
                        <li><a href="#" class="hover:text-sky-600 transition">Emergency ICU</a></li>
                        <li><a href="#" class="hover:text-sky-600 transition">Medicine Shops</a></li>
                        <li><a href="#" class="hover:text-sky-600 transition">Diagnostics</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-bold text-slate-900 mb-8 uppercase text-xs tracking-widest">Company</h5>
                    <ul class="space-y-4 text-slate-500 font-bold text-sm">
                        <li><a href="#" class="hover:text-sky-600 transition">About Company</a></li>
                        <li><a href="#" class="hover:text-sky-600 transition">Our Vision</a></li>
                        <li><a href="#" class="hover:text-sky-600 transition">Contact Us</a></li>
                        <li><a href="#" class="hover:text-sky-600 transition">Careers</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-bold text-slate-900 mb-8 uppercase text-xs tracking-widest">Support</h5>
                    <ul class="space-y-4 text-slate-500 font-bold text-sm">
                        <li><a href="#" class="hover:text-sky-600 transition">Help Center</a></li>
                        <li><a href="#" class="hover:text-sky-600 transition">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-sky-600 transition">Terms of Use</a></li>
                    </ul>
                </div>
            </div>
            <div class="text-center text-slate-400 text-xs font-bold border-t border-slate-50 pt-12">
                &copy; {{ date('Y') }} MEDICONNECT SEARCH. All Rights Reserved. DEVELOPED BY ADVANCED MEDICAL TECH DIV.
            </div>
        </div>
    </footer>

    <!-- Initialize Lucide Icons -->
    <script>
      lucide.createIcons();
    </script>
</body>
</html>
