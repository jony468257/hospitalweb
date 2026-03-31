<x-guest-layout>
    <div class="bg-slate-50/50 min-h-screen pt-32 pb-48">
        <div class="max-w-7xl mx-auto px-16 sm:px-24 lg:px-32">
            
            <!-- Page Header -->
            <div class="mb-40">
                <h1 class="text-h1 text-secondary mb-8">Consult with <span class="text-medical-teal font-black italic">Specialists</span></h1>
                <p class="text-body text-muted">Book appointments with top-rated doctors from world-class medical facilities.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-32">
                
                <!-- Sidebar Filters -->
                <aside class="lg:col-span-1 space-y-24">
                    <x-card class="border-none shadow-sm p-24">
                        <h3 class="text-h2 text-secondary mb-24 font-bold border-b border-slate-50 pb-12">Search Filters</h3>
                        
                        <!-- Specialization Filter -->
                        <div class="space-y-8 mb-24">
                            <label class="text-small font-bold text-secondary uppercase tracking-widest">Specialization</label>
                            <select class="w-full px-16 py-12 rounded-card border-slate-200 text-body bg-white focus:ring-medical-teal/20 focus:border-medical-teal">
                                <option value="all">All Fields</option>
                                <option value="cardio">Cardiology</option>
                                <option value="pedia">Pediatrics</option>
                                <option value="neuro">Neurology</option>
                            </select>
                        </div>

                        <!-- Date Availability -->
                        <div class="space-y-8 mb-24">
                            <label class="text-small font-bold text-secondary uppercase tracking-widest">Availability</label>
                            <input type="date" class="w-full px-16 py-12 rounded-card border-slate-200 text-body bg-white focus:ring-medical-teal/20 focus:border-medical-teal">
                        </div>

                        <x-button variant="medical" class="w-full font-bold py-12">Search Doctors</x-button>
                    </x-card>
                </aside>

                <!-- Doctors Grid -->
                <div class="lg:col-span-3">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-24">
                        @forelse($doctors as $doctor)
                        <x-card class="text-center group p-32 flex flex-col relative overflow-hidden">
                            <!-- Background Decoration -->
                            <div class="absolute top-0 right-0 w-24 h-24 bg-medical-teal/5 rounded-bl-full group-hover:scale-[6] transition-transform duration-700"></div>
                            
                            <div class="relative w-32 h-32 mx-auto mb-20 z-10">
                                <img src="https://i.pravatar.cc/300?u={{ $doctor->id }}" alt="Doctor" class="w-full h-full rounded-full object-cover border-4 border-white shadow-sm transition-transform duration-500 group-hover:scale-105">
                                <div class="absolute bottom-0 right-0 w-8 h-8 bg-medical-green rounded-full border-2 border-white"></div>
                            </div>
                            
                            <div class="z-10 flex-grow">
                                <h3 class="text-h2 text-secondary mb-4 group-hover:text-medical-teal transition-colors">{{ $doctor->name }}</h3>
                                <p class="text-small font-bold text-medical-teal uppercase tracking-widest mb-16">{{ $doctor->specialization ?: 'Specialist' }}</p>
                                
                                <div class="flex items-center justify-center space-x-12 mb-20 text-small text-muted font-medium italic">
                                    <span>{{ $doctor->experience ?: '10+' }} Years Exp.</span>
                                </div>
                                
                                @if($doctor->hospitals->count() > 0)
                                <p class="text-small mb-16 text-secondary line-clamp-1">
                                    <svg class="w-4 h-4 inline-block mr-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                    {{ $doctor->hospitals->first()->name }}
                                </p>
                                @endif
                                
                                <x-button variant="outline" size="sm" class="w-full border-medical-teal text-medical-teal hover:bg-medical-teal/5" href="{{ route('public.doctor.show', $doctor->id) }}">View Profile</x-button>
                            </div>
                        </x-card>
                        @empty
                        <div class="col-span-3 p-64 bg-white rounded-card border-2 border-dashed border-slate-200 text-center">
                            <h3 class="text-h2 text-muted mb-8">No doctors found</h3>
                            <p class="text-body text-muted">Try adjusting your filters or specialization.</p>
                        </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="mt-48">
                        {{ $doctors->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
