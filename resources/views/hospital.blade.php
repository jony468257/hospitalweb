<x-guest-layout>
    <!-- Hospital Header / Banner -->
    <section class="relative pt-8 pb-12 bg-white border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                <div class="lg:col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <span class="px-3 py-1 bg-medical-green/10 text-medical-green rounded-full text-[10px] font-extrabold uppercase tracking-widest border border-medical-green/20">
                            Verified Provider
                        </span>
                        <div class="flex items-center text-yellow-500">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <span class="ml-1 text-small font-bold text-secondary">4.8 (120+ Reviews)</span>
                        </div>
                    </div>
                    <h1 class="text-h1 text-secondary mb-4 font-extrabold tracking-tight">{{ $hospital->name }}</h1>
                    <p class="text-body text-muted mb-6 max-w-2xl leading-relaxed">
                        {{ $hospital->description ?: 'Providing world-class healthcare services with extreme care and professional staff. Dedicated to your health and well-being.' }}
                    </p>
                    
                    <div class="flex flex-wrap gap-3">
                        <div class="flex items-center bg-slate-50 px-4 py-2 rounded-card border border-slate-100">
                            <svg class="w-5 h-5 text-primary mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span class="text-small font-bold text-secondary">{{ $hospital->address }}, {{ $hospital->thana->name ?? '' }}</span>
                        </div>
                        @if($hospital->phone)
                        <div class="flex items-center bg-slate-50 px-4 py-2 rounded-card border border-slate-100">
                            <svg class="w-5 h-5 text-primary mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span class="text-small font-bold text-secondary">{{ $hospital->phone }}</span>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="lg:sticky lg:top-8 space-y-6">
                    <x-card class="bg-primary p-8 border-none shadow-xl shadow-primary/20">
                        <h3 class="text-white text-h2 mb-4 font-bold">Book an Appointment</h3>
                        <p class="text-white/80 text-small mb-6 font-medium">Quickly book a doctor or consultation at this hospital.</p>
                        <x-button variant="secondary" class="w-full font-bold shadow-lg">Book Now</x-button>
                    </x-card>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="bg-slate-50/50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Left: Services & Doctors -->
                <div class="lg:col-span-2 space-y-12">
                    
                    <!-- Services Section -->
                    <section>
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-h2 text-secondary">Available <span class="text-primary font-extrabold italic">Services</span></h2>
                            <span class="text-small font-bold text-muted uppercase tracking-widest">{{ $hospital->services->count() }} Services</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @forelse($hospital->services as $service)
                            <x-card class="p-5 flex items-center justify-between group hover:border-primary/30 transition-all">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-primary/5 text-primary rounded-card flex items-center justify-center font-bold">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    </div>
                                    <div>
                                        <h4 class="text-body font-bold text-secondary">{{ $service->name }}</h4>
                                        <p class="text-[10px] text-muted uppercase font-bold tracking-widest">Available 24/7</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="text-h2 text-primary font-black">৳{{ number_format($service->price, 0) }}</span>
                                </div>
                            </x-card>
                            @empty
                                <div class="col-span-2 p-40 bg-white rounded-card border border-dashed border-slate-200 text-center">
                                    <p class="text-muted font-medium">No services listed yet.</p>
                                </div>
                            @endforelse
                        </div>
                    </section>

                    <!-- Doctors Section -->
                    <section>
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-h2 text-secondary">Expert <span class="text-medical-teal font-extrabold italic">Doctors</span></h2>
                            <span class="text-small font-bold text-muted uppercase tracking-widest">{{ $hospital->doctors->count() }} Specialists</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @forelse($hospital->doctors as $doctor)
                            <x-card class="flex items-center p-6 space-x-5 group">
                                <div class="relative w-12 h-12 shrink-0">
                                    <div class="w-full h-full bg-slate-100 rounded-full flex items-center justify-center text-primary font-black text-xl uppercase">
                                        {{ substr($doctor->name, 0, 1) }}
                                    </div>
                                    <div class="absolute bottom-0 right-0 w-3 h-3 bg-medical-green rounded-full border-2 border-white shadow-sm"></div>
                                </div>
                                <div class="flex-grow">
                                    <h4 class="text-body font-bold text-secondary group-hover:text-primary transition-colors">{{ $doctor->name }}</h4>
                                    <p class="text-small text-muted font-medium mb-8">{{ $doctor->specialization ?: 'Specialist' }}</p>
                                    <x-button variant="ghost" size="sm" class="p-0 text-primary font-bold text-[10px] uppercase tracking-widest">View Schedule</x-button>
                                </div>
                            </x-card>
                            @empty
                                <div class="col-span-2 p-40 bg-white rounded-card border border-dashed border-slate-200 text-center">
                                    <p class="text-muted font-medium">No doctors assigned yet.</p>
                                </div>
                            @endforelse
                        </div>
                    </section>

                </div>

                <!-- Right: Features & Info -->
                <div class="space-y-8">
                    
                    <!-- Features -->
                    <x-card class="border-none shadow-lg py-8 px-6">
                        <h3 class="text-h2 text-secondary mb-6 font-bold border-b border-slate-50 pb-3">Facilities</h3>
                        <ul class="space-y-4">
                            @forelse($hospital->features as $feature)
                            <li class="flex items-center text-body font-medium text-secondary">
                                <div class="w-8 h-8 rounded-full bg-medical-teal/10 flex items-center justify-center mr-4">
                                    <svg class="w-5 h-5 text-medical-teal" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                </div>
                                {{ $feature->name }}
                            </li>
                            @empty
                            <li class="text-muted italic text-small">No special facilities listed.</li>
                            @endforelse
                        </ul>
                    </x-card>

                    <!-- Contact Card -->
                    <x-card class="bg-slate-900 text-white border-none py-8 px-6">
                        <h3 class="text-h2 mb-6 font-bold">Contact Info</h3>
                        <div class="space-y-4">
                            <div>
                                <p class="text-[10px] uppercase font-bold text-sky-400 tracking-widest mb-1">Emergency Support</p>
                                <p class="text-h2 font-black">+880 1234 567 890</p>
                            </div>
                            <div>
                                <p class="text-[10px] uppercase font-bold text-sky-400 tracking-widest mb-1">Email Address</p>
                                <p class="text-body font-medium opacity-80">{{ Str::slug($hospital->name) }}@mediconnect.com</p>
                            </div>
                        </div>
                        <div class="mt-8 pt-6 border-t border-white/10">
                            <x-button variant="primary" class="w-full bg-sky-500 hover:bg-sky-400 text-slate-900">Get Directions</x-button>
                        </div>
                    </x-card>

                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
