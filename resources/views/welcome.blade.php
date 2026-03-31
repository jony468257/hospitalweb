<x-guest-layout>
    <!-- Hero Section -->
    <section class="relative pt-8 pb-12 overflow-hidden bg-white">
        <!-- Background Decoration -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full -z-10 opacity-30">
            <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-primary/10 rounded-full blur-[120px] animate-pulse"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-medical-teal/10 rounded-full blur-[120px] animate-pulse" style="animation-delay: 2s;"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-4xl mx-auto mb-10">
                <div class="inline-flex items-center space-x-2 px-4 py-2 bg-primary/5 text-primary rounded-full text-small font-bold mb-6 border border-primary/10 tracking-wide uppercase">
                    <span class="flex h-8 w-8 rounded-full bg-primary/20 items-center justify-center">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/></svg>
                    </span>
                    <span>100% Verified Healthcare Network</span>
                </div>
                <h1 class="text-h1 md:text-[56px] font-extrabold text-secondary leading-[1.1] mb-6 tracking-tight">
                    Your Health, Our Priority. <br>
                    <span class="text-primary italic">Find the Best Care</span> Near You.
                </h1>
                <p class="text-body md:text-lg text-muted max-w-2xl mx-auto mb-10 leading-relaxed">
                    Instantly connect with top-rated hospitals, world-class specialists, and trusted pharmacies across the country. All in one place.
                </p>

                <!-- Premium Search Bar -->
                <div x-data="{ category: 'hospital' }" class="bg-white p-2 rounded-card shadow-card border border-slate-100 max-w-3xl mx-auto relative z-20">
                    <div class="flex flex-col md:flex-row items-stretch gap-2">
                        <div class="flex-1 relative">
                            <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <input type="text" 
                                   class="block w-full pl-12 pr-4 py-4 bg-slate-50 border-none rounded-card focus:ring-2 focus:ring-primary/20 text-body" 
                                   :placeholder="'Search for ' + category + '...'">
                        </div>
                        <div class="flex items-center space-x-2 md:border-l md:pl-2 border-slate-100">
                            <select x-model="category" class="bg-transparent border-none focus:ring-0 text-body font-bold text-secondary cursor-pointer">
                                <option value="hospital">Hospital</option>
                                <option value="doctor">Doctor</option>
                                <option value="medicine">Medicine</option>
                            </select>
                        </div>
                        <x-button variant="primary" class="md:px-8 py-4 font-bold shadow-xl shadow-primary/20">
                            Search
                        </x-button>
                    </div>
                </div>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 py-8 border-t border-slate-100 bg-white/50 rounded-card backdrop-blur-sm">
                <div class="text-center px-4 border-r border-slate-100">
                    <div class="text-h1 font-bold text-secondary mb-1 tracking-tighter">500+</div>
                    <div class="text-small font-bold text-muted uppercase tracking-widest">Hospitals</div>
                </div>
                <div class="text-center px-4 md:border-r border-slate-100">
                    <div class="text-h1 font-bold text-secondary mb-1 tracking-tighter">2.5k</div>
                    <div class="text-small font-bold text-muted uppercase tracking-widest">Doctors</div>
                </div>
                <div class="text-center px-4 border-r border-slate-100">
                    <div class="text-h1 font-bold text-secondary mb-1 tracking-tighter">1.2k</div>
                    <div class="text-small font-bold text-muted uppercase tracking-widest">Pharmacies</div>
                </div>
                <div class="text-center px-4">
                    <div class="text-h1 font-bold text-secondary mb-1 tracking-tighter">50k+</div>
                    <div class="text-small font-bold text-muted uppercase tracking-widest">Appointments</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Sections -->
    <div class="bg-slate-50/50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            
            <!-- Featured Hospitals -->
            <section id="hospitals">
                <div class="flex items-end justify-between mb-8">
                    <div>
                        <h2 class="text-h1 text-secondary mb-2">Featured <span class="text-primary tracking-tight font-extrabold italic">Hospitals</span></h2>
                        <p class="text-body text-muted leading-relaxed max-w-xl">World-class medical facilities equipped with the latest technology and top-tier staff.</p>
                    </div>
                    <a href="{{ route('public.hospital.index') }}" class="text-primary font-bold flex items-center group">
                        Browse All <svg class="ml-4 w-5 h-5 group-hover:translate-x-4 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @for($i=1; $i<=3; $i++)
                    <x-card class="p-0 border-none group">
                        <div class="relative h-64 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1587350859728-117622bc736d?auto=format&fit=crop&q=80&w=800" alt="Hospital" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute top-4 right-4 px-3 py-1 bg-white/90 backdrop-blur rounded-full text-small font-bold flex items-center shadow-sm">
                                <svg class="w-4 h-4 text-yellow-500 mr-1 fill-yellow-500" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg> 4.9
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-h2 text-secondary mb-2">Green Life Medical College</h3>
                            <p class="text-small text-muted mb-4 flex items-center">
                                <svg class="w-4 h-4 mr-1 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg> Dhanmondi, Dhaka
                            </p>
                            <div class="flex flex-wrap gap-2 mb-6">
                                <span class="px-2 py-1 bg-primary/5 text-primary text-[10px] uppercase font-extrabold rounded-full tracking-wider">ICU - 24/7</span>
                                <span class="px-2 py-1 bg-medical-teal/5 text-medical-teal text-[10px] uppercase font-extrabold rounded-full tracking-wider">Diagnostics</span>
                            </div>
                            <x-button variant="outline" class="w-full py-3">View Details</x-button>
                        </div>
                    </x-card>
                    @endfor
                </div>
            </section>

            <!-- Top Doctors -->
            <section id="doctors">
                <div class="flex items-end justify-between mb-8">
                    <div>
                        <h2 class="text-h1 text-secondary mb-2">Top <span class="text-medical-teal tracking-tight font-extrabold italic">Doctors</span></h2>
                        <p class="text-body text-muted leading-relaxed max-w-xl">Consult with specialist doctors from various fields of medicine and surgery.</p>
                    </div>
                    <a href="{{ route('public.doctor.index') }}" class="text-medical-teal font-bold flex items-center group">
                        See All Doctors <svg class="ml-4 w-5 h-5 group-hover:translate-x-4 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @for($i=1; $i<=4; $i++)
                    <x-card class="text-center group p-8">
                        <div class="relative w-32 h-32 mx-auto mb-5">
                            <img src="https://i.pravatar.cc/300?img={{ $i+10 }}" alt="Doctor" class="w-full h-full rounded-full object-cover border-4 border-slate-50 group-hover:border-medical-teal/30 transition-colors">
                            <div class="absolute bottom-0 right-0 w-8 h-8 bg-medical-green rounded-full border-2 border-white shadow-sm"></div>
                        </div>
                        <h3 class="text-h2 text-secondary mb-1">Dr. Sarah Johnson</h3>
                        <p class="text-small font-bold text-medical-teal uppercase tracking-widest mb-4">Senior Cardiologist</p>
                        <p class="text-small text-muted mb-5 italic">MBBS, FCPS (Cardiology), <br>15+ Years Experience</p>
                        <x-button variant="outline" size="sm" class="w-full">Book Now</x-button>
                    </x-card>
                    @endfor
                </div>
            </section>

            <!-- Popular Medicine Shops -->
            <section id="pharmacies">
                <div class="flex items-end justify-between mb-8">
                    <div>
                        <h2 class="text-h1 text-secondary mb-2">Medicine <span class="text-medical-red tracking-tight font-extrabold italic">Marketplace</span></h2>
                        <p class="text-body text-muted leading-relaxed max-w-xl">Order authentic medicines and healthcare products from licensed pharmacies near you.</p>
                    </div>
                    <a href="{{ route('public.medicine.index') }}" class="text-medical-red font-bold flex items-center group">
                        Visit Marketplace <svg class="ml-4 w-5 h-5 group-hover:translate-x-4 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @for($i=1; $i<=2; $i++)
                    <x-card padding="p-0" class="flex flex-col md:flex-row items-stretch border-none overflow-hidden group">
                        <div class="md:w-2/5 relative">
                            <img src="https://images.unsplash.com/photo-1586015555751-63bb77f4322a?auto=format&fit=crop&q=80&w=800" alt="Pharmacy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        </div>
                        <div class="p-8 flex-1">
                            <div class="flex items-start justify-between mb-4">
                                <div>
                                    <h3 class="text-h2 text-secondary mb-1">Lazz Pharma</h3>
                                    <p class="text-small text-muted uppercase tracking-widest font-bold">Open 24/7</p>
                                </div>
                                <div class="bg-medical-red/5 text-medical-red px-3 py-1 rounded-full text-[10px] font-extrabold uppercase">Top Vendor</div>
                            </div>
                            <p class="text-body text-muted mb-6 line-clamp-2">Providing 100% authentic medicine with home delivery service across the city.</p>
                            <div class="flex items-center justify-between mt-auto pt-4 border-t border-slate-50">
                                <span class="text-small font-bold text-secondary flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-medical-green" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg> Prescriptions Verified
                                </span>
                                <x-button variant="ghost" class="font-bold underline text-medical-red">Shop Now</x-button>
                            </div>
                        </div>
                    </x-card>
                    @endfor
                </div>
            </section>
        </div>
    </div>

    <!-- Call to Action -->
    <section class="py-12 bg-white overflow-hidden relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-primary rounded-[32px] p-10 md:p-16 relative overflow-hidden text-center md:text-left">
                <!-- Background Circles -->
                <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-white/10 rounded-full -translate-y-1/2 translate-x-1/4 blur-3xl"></div>
                <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-primary-dark/20 rounded-full translate-y-1/2 -translate-x-1/4 blur-3xl"></div>
                
                <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                    <div class="text-white">
                        <h2 class="text-h1 md:text-[48px] font-extrabold leading-tight mb-6">Join the Network of Trusted Healthcare Providers</h2>
                        <p class="text-body md:text-lg opacity-90 mb-10 max-w-xl mx-auto md:mx-0">Whether you are a hospital, doctor, or pharmacy owner, MediConnect helps you reach thousands of patients instantly.</p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                            <x-button variant="secondary" size="lg" class="px-10" href="{{ route('register') }}">Partner With Us</x-button>
                            <x-button variant="outline" class="border-white text-white hover:bg-white/10 px-10" size="lg">Learn More</x-button>
                        </div>
                    </div>
                    <div class="hidden lg:flex justify-center">
                        <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&q=80&w=800" alt="Join Network" class="rounded-card shadow-2xl rotate-3 max-w-sm">
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
