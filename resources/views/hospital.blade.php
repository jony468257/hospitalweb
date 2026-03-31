<x-guest-layout>
    <!-- Hospital Hero Banner -->
    <section class="relative min-h-[450px] flex items-center overflow-hidden">
        <!-- Background with Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/hospital_hero_bg.png') }}" alt="{{ $hospital->name }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-black/95 via-black/70 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="max-w-3xl">
                <div class="flex items-center space-x-3 mb-6 animate-fade-in-up">
                    <span class="px-4 py-1.5 bg-medical-green text-white rounded-full text-[11px] font-black uppercase tracking-widest shadow-lg shadow-medical-green/20">
                        Verified Institution
                    </span>
                    <div class="flex items-center bg-white/10 backdrop-blur-md border border-white/20 px-3 py-1.5 rounded-full text-white">
                        <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <span class="ml-1.5 text-xs font-bold">4.9 (240+ Reviews)</span>
                    </div>
                </div>

                <h1 class="text-5xl md:text-6xl font-black text-white mb-6 tracking-tight leading-tight">
                    {{ $hospital->name }}
                </h1>
                
                <p class="text-lg md:text-xl text-slate-200 mb-10 max-w-2xl leading-relaxed font-medium">
                    {{ $hospital->description ?: 'Providing world-class healthcare services with extreme care and professional staff. Dedicated to your health and well-being at every step.' }}
                </p>
                
                <div class="flex flex-wrap gap-4">
                    <div class="flex items-center bg-white/10 backdrop-blur-md border border-white/20 px-5 py-3 rounded-2xl text-white">
                        <div class="w-10 h-10 bg-primary/20 rounded-xl flex items-center justify-center mr-3">
                            <svg class="w-6 h-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <p class="text-[10px] uppercase font-bold text-slate-400 tracking-widest">Location</p>
                            <p class="font-bold text-sm">{{ $hospital->address }}, {{ $hospital->thana->name ?? '' }}</p>
                        </div>
                    </div>
                    
                    @if($hospital->phone)
                    <div class="flex items-center bg-white/10 backdrop-blur-md border border-white/20 px-5 py-3 rounded-2xl text-white">
                        <div class="w-10 h-10 bg-medical-teal/20 rounded-xl flex items-center justify-center mr-3">
                            <svg class="w-6 h-6 text-medical-teal" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <p class="text-[10px] uppercase font-bold text-slate-400 tracking-widest">Contact</p>
                            <p class="font-bold text-sm">{{ $hospital->phone }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Grid -->
    <div class="bg-slate-50/50 py-16 -mt-10 relative z-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                
                <!-- Left: Services & Doctors (Col 8) -->
                <div class="lg:col-span-8 space-y-20">
                    
                    <!-- Services Section -->
                    <section id="services">
                        <div class="flex items-end justify-between mb-10 pb-4 border-b border-slate-200">
                            <div>
                                <h2 class="text-4xl font-black text-slate-900 leading-none mb-2">Healthcare <span class="text-primary italic">Services</span></h2>
                                <p class="text-muted font-medium">Explore the medical facilities and treatments we offer.</p>
                            </div>
                            <span class="text-[11px] font-black text-muted uppercase tracking-[0.2em] bg-white px-4 py-2 rounded-full border border-slate-100 shadow-sm">
                                {{ $hospital->services->count() }} Specialties
                            </span>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @forelse($hospital->services as $service)
                            <div class="group bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl hover:border-primary/20 transition-all duration-300 relative overflow-hidden">
                                <div class="absolute top-0 right-0 w-24 h-24 bg-primary/5 rounded-bl-full -mr-12 -mt-12 transition-all group-hover:bg-primary/10"></div>
                                
                                <div class="flex items-start justify-between relative z-10">
                                    <div class="flex items-start space-x-4">
                                        <div class="w-14 h-14 bg-primary/5 text-primary rounded-2xl flex items-center justify-center font-bold shadow-inner">
                                            <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a2 2 0 00-1.96 1.414l-.727 2.903a2 2 0 01-1.977 1.508H7.756a2 2 0 01-1.977-1.508l-.727-2.903a2 2 0 00-1.96-1.414l-2.387.477a2 2 0 00-1.022.547l2.387 2.387a2 2 0 002.828 0l2.387-2.387z"/></svg>
                                        </div>
                                        <div>
                                            <h4 class="text-xl font-black text-slate-800 mb-1 group-hover:text-primary transition-colors">{{ $service->name }}</h4>
                                            <p class="text-xs text-muted font-bold uppercase tracking-widest bg-slate-50 inline-block px-2 py-1 rounded">24/7 Availability</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-[10px] text-muted font-bold uppercase tracking-widest mb-1">Consultation Fee</p>
                                        <span class="text-2xl font-black text-primary">৳{{ number_format($service->price, 0) }}</span>
                                    </div>
                                </div>
                            </div>
                            @empty
                                <div class="col-span-2 p-32 bg-white rounded-3xl border-2 border-dashed border-slate-200 text-center">
                                    <div class="w-16 h-16 bg-slate-50 text-slate-300 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                                    </div>
                                    <p class="text-muted font-bold text-lg">No services listed yet.</p>
                                    <p class="text-small text-muted/60 mt-1">Please check back later or contact the hospital.</p>
                                </div>
                            @endforelse
                        </div>
                    </section>

                    <!-- Doctors Section -->
                    <section id="doctors">
                        <div class="flex items-end justify-between mb-10 pb-4 border-b border-slate-200">
                            <div>
                                <h2 class="text-4xl font-black text-slate-900 leading-none mb-2">Expert <span class="text-medical-teal italic">Doctors</span></h2>
                                <p class="text-muted font-medium">Meet our team of highly qualified medical professionals.</p>
                            </div>
                            <span class="text-[11px] font-black text-muted uppercase tracking-[0.2em] bg-white px-4 py-2 rounded-full border border-slate-100 shadow-sm">
                                {{ $hospital->doctors->count() }} Specialists
                            </span>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            @forelse($hospital->doctors as $doctor)
                            <div class="group bg-white p-8 rounded-3xl shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border border-slate-50 flex items-center space-x-6">
                                <div class="relative shrink-0">
                                    <div class="w-24 h-24 bg-medical-teal/10 rounded-2xl flex items-center justify-center text-medical-teal font-black text-4xl uppercase relative z-10 overflow-hidden ring-4 ring-medical-teal/5">
                                        {{ substr($doctor->name, 0, 1) }}
                                        <div class="absolute bottom-0 right-0 w-full h-1/3 bg-medical-teal/20 backdrop-blur-sm flex items-center justify-center">
                                            <span class="text-[10px] font-black tracking-tighter">MD</span>
                                        </div>
                                    </div>
                                    <div class="absolute -top-2 -right-2 w-6 h-6 bg-medical-green rounded-full border-4 border-white shadow-lg animate-pulse z-20"></div>
                                </div>
                                <div class="flex-grow">
                                    <h4 class="text-2xl font-black text-slate-800 mb-1 group-hover:text-medical-teal transition-colors">{{ $doctor->name }}</h4>
                                    <p class="text-sm text-muted font-bold mb-4 uppercase tracking-widest text-primary">{{ $doctor->specialization ?: 'General Specialist' }}</p>
                                    <div class="flex items-center space-x-2">
                                        <x-button variant="medical" size="sm" class="rounded-xl font-black text-[10px] uppercase tracking-widest">
                                            Book Appoint
                                        </x-button>
                                        <button class="w-10 h-10 bg-slate-50 rounded-xl flex items-center justify-center text-slate-400 hover:bg-primary/10 hover:text-primary transition-colors">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @empty
                                <div class="col-span-2 p-32 bg-white rounded-3xl border-2 border-dashed border-slate-200 text-center">
                                    <p class="text-muted font-bold text-lg">No doctors assigned yet.</p>
                                </div>
                            @endforelse
                        </div>
                    </section>

                </div>

                <!-- Right: Booking & Info (Col 4) -->
                <div class="lg:col-span-4 space-y-8">
                    
                    <!-- Sticky Booking Card -->
                    <div class="lg:sticky lg:top-24">
                        <div class="bg-primary p-8 rounded-3xl shadow-2xl shadow-primary/30 relative overflow-hidden group">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-bl-full -mr-16 -mt-16 transition-all group-hover:scale-125"></div>
                            
                            <h3 class="text-white text-3xl mb-4 font-black relative z-10">Instant <br><span class="text-sky-300">Appointment</span></h3>
                            <p class="text-white/80 text-sm mb-8 relative z-10 font-medium">Skip the queue and book your consultation in seconds with our certified specialists.</p>
                            
                            <div class="space-y-4 relative z-10">
                                <x-button variant="secondary" class="w-full font-black py-4 rounded-2xl shadow-lg hover:scale-[1.03] text-primary">
                                    Book Now (৳500 OFF)
                                </x-button>
                                <p class="text-center text-[10px] text-white/50 font-black uppercase tracking-[0.2em]">Trusted by 10k+ patients</p>
                            </div>
                        </div>

                        <!-- Facilities List -->
                        <div class="mt-8 bg-white p-8 rounded-3xl border border-slate-100 shadow-sm">
                            <h3 class="text-xl font-black text-slate-900 mb-6 flex items-center">
                                <svg class="w-6 h-6 mr-2 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                Premium Facilities
                            </h3>
                            <ul class="space-y-5">
                                @forelse($hospital->features as $feature)
                                <li class="flex items-center text-sm font-bold text-slate-700">
                                    <div class="w-8 h-8 rounded-xl bg-medical-green/10 flex items-center justify-center mr-4 shrink-0 transition-transform hover:scale-110">
                                        <svg class="w-4 h-4 text-medical-green" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                    </div>
                                    {{ $feature->name }}
                                </li>
                                @empty
                                <li class="text-muted italic text-small p-10 border border-dashed border-slate-100 rounded-2xl text-center">No special facilities listed.</li>
                                @endforelse
                            </ul>
                        </div>

                        <!-- Contact Card Dark -->
                        <div class="mt-8 bg-slate-900 text-white rounded-3xl p-8 relative overflow-hidden">
                            <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-primary/20 rounded-full blur-3xl"></div>
                            
                            <h3 class="text-xl font-black mb-8 border-b border-white/10 pb-4">Help & Support</h3>
                            
                            <div class="space-y-6 relative z-10">
                                <div>
                                    <p class="text-[10px] uppercase font-black text-sky-400 tracking-[0.2em] mb-2">Emergency Hotline</p>
                                    <p class="text-3xl font-black tracking-tight">+880 1234 567 890</p>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-white/5 rounded-xl flex items-center justify-center mr-4 border border-white/10">
                                        <svg class="w-5 h-5 text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                    </div>
                                    <div>
                                        <p class="text-[9px] uppercase font-bold text-slate-500 tracking-widest">Email Us</p>
                                        <p class="text-sm font-bold opacity-90">{{ Str::slug($hospital->name) }}@mediconnect.com</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-10">
                                <x-button variant="primary" class="w-full bg-sky-500 hover:bg-sky-400 text-slate-900 font-black rounded-2xl py-4 transition-all hover:tracking-wide">
                                    Get Directions
                                </x-button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

