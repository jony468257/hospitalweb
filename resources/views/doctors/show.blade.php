<x-guest-layout>
    <!-- Doctor Header Section -->
    <section class="relative pt-32 pb-48 bg-white border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-16 sm:px-24 lg:px-32">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-32 items-center">
                
                <!-- Doctor Image -->
                <div class="lg:col-span-1 flex justify-center">
                    <div class="relative w-64 h-64 md:w-80 md:h-80">
                        <div class="absolute inset-4 bg-medical-teal rounded-full rotate-6 opacity-10 blur-2xl"></div>
                        <img src="https://i.pravatar.cc/500?u={{ $doctor->id }}" alt="{{ $doctor->name }}" class="relative w-full h-full rounded-full object-cover border-8 border-slate-50 shadow-2xl">
                        <div class="absolute bottom-8 right-8 w-12 h-12 bg-medical-green rounded-full border-4 border-white shadow-lg"></div>
                    </div>
                </div>

                <!-- Doctor Info -->
                <div class="lg:col-span-2 text-center lg:text-left">
                    <div class="mb-16">
                        <span class="px-12 py-4 bg-medical-teal/10 text-medical-teal rounded-full text-small font-extrabold uppercase tracking-widest border border-medical-teal/20">
                            Available Expert
                        </span>
                    </div>
                    <h1 class="text-h1 text-secondary mb-8 font-extrabold tracking-tight">{{ $doctor->name }}</h1>
                    <p class="text-h2 font-bold text-medical-teal mb-16">{{ $doctor->specialization ?: 'Specialist Doctor' }}</p>
                    
                    <div class="flex flex-wrap items-center justify-center lg:justify-start gap-16 mb-32 child:flex child:items-center child:bg-slate-50 child:px-16 child:py-8 child:rounded-card child:border child:border-slate-100">
                        <div>
                            <svg class="w-5 h-5 text-primary mr-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span class="text-small font-bold text-secondary">{{ $doctor->experience ?: '10+' }} Years Exp.</span>
                        </div>
                        <div>
                            <svg class="w-5 h-5 text-primary mr-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <span class="text-small font-bold text-secondary">4.9 Rating</span>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-12">
                        <x-button variant="medical" size="lg" class="px-40 font-bold shadow-xl shadow-medical-teal/20">Book Appointment</x-button>
                        <x-button variant="ghost" class="text-primary font-bold">Consult Online</x-button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Detail Content -->
    <div class="bg-slate-50/50 py-48">
        <div class="max-w-7xl mx-auto px-16 sm:px-24 lg:px-32">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-32">
                
                <!-- Info Grid -->
                <div class="lg:col-span-2 space-y-48">
                    
                    <!-- Professional Profile -->
                    <section>
                        <h2 class="text-h2 text-secondary mb-24 border-b border-slate-100 pb-12">Professional <span class="text-primary font-extrabold italic">Profile</span></h2>
                        <p class="text-body text-muted leading-relaxed">
                            Highly skilled professional with an exceptional background in {{ $doctor->specialization ?: 'medical practice' }}. Dedicated to providing comprehensive and compassionate care to all patients. Specialized in advanced medical procedures and patient-centered treatment plans.
                        </p>
                    </section>

                    <!-- Work Locations / Hospitals -->
                    <section>
                        <h2 class="text-h2 text-secondary mb-24 border-b border-slate-100 pb-12">Chamber & <span class="text-medical-teal font-extrabold italic">Locations</span></h2>
                        <div class="space-y-16">
                            @forelse($doctor->hospitals as $hospital)
                            <x-card class="flex items-center p-24 space-x-20 hover:border-primary/20 transition-all border-none shadow-sm">
                                <div class="w-16 h-16 bg-slate-50 rounded-card flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
                                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                </div>
                                <div class="flex-grow">
                                    <h4 class="text-h2 text-secondary font-bold">{{ $hospital->name }}</h4>
                                    <p class="text-small text-muted font-medium mb-4">{{ $hospital->address }}</p>
                                    <div class="flex items-center text-[10px] uppercase font-extrabold tracking-widest text-primary">
                                        <svg class="w-4 h-4 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        Visit: Sat, Mon, Wed (5PM - 8PM)
                                    </div>
                                </div>
                                <x-button variant="outline" size="sm" class="border-primary/20 text-primary">Map View</x-button>
                            </x-card>
                            @empty
                            <p class="text-muted italic">No hospital chambers listed.</p>
                            @endforelse
                        </div>
                    </section>
                </div>

                <!-- Doctor Sidebar Stats / Reviews -->
                <div class="space-y-32">
                    <x-card class="border-none shadow-lg p-32 text-center">
                        <div class="mb-24">
                            <h3 class="text-h1 text-secondary tracking-tighter mb-4 font-black">৳1,500</h3>
                            <p class="text-small font-bold text-muted uppercase tracking-widest">Consultation Fee</p>
                        </div>
                        <ul class="text-left space-y-16 mb-32 text-body font-medium text-secondary">
                            <li class="flex items-center"><svg class="w-5 h-5 text-medical-green mr-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Instantly Available</li>
                            <li class="flex items-center"><svg class="w-5 h-5 text-medical-green mr-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Online Payment Only</li>
                            <li class="flex items-center"><svg class="w-5 h-5 text-medical-green mr-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Digital Prescription</li>
                        </ul>
                        <x-button variant="medical" class="w-full font-bold shadow-lg shadow-medical-teal/30">Confirm Appointment</x-button>
                    </x-card>

                    <x-card class="bg-slate-900 text-white border-none p-32">
                        <h4 class="text-h2 font-black mb-16 italic text-sky-400 font-serif">Patient Trust</h4>
                        <div class="flex items-center space-x-12 mb-16">
                            <div class="bg-white/10 p-8 rounded-card text-sky-400">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a8.113 8.113 0 00-6.03-7.843 6.03 6.03 0 118.258 8.76l1.712 1.712A1 1 0 1115.536 20.12l-1.712-1.712a8.03 8.03 0 00-.894-1.408z"/></svg>
                            </div>
                            <div>
                                <h5 class="text-h2 font-bold mb-2">2.5k Citizens</h5>
                                <p class="text-small opacity-60">Successfully Treated</p>
                            </div>
                        </div>
                    </x-card>
                </div>

            </div>
        </div>
    </div>
</x-guest-layout>
