<x-guest-layout>
    <!-- Doctors Hero Section -->
    <section class="relative min-h-[550px] flex items-center pt-32 pb-40 overflow-hidden">
        <!-- Background Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/doctors_hero_bg.png') }}" alt="Medical Specialists" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/60 to-black/20"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl animate-fade-in-up">
                <span class="px-7 py-3 bg-medical-teal/20 backdrop-blur-md text-medical-teal rounded-2xl text-[12px] font-black uppercase tracking-widest mb-12 inline-block border border-medical-teal/30 shadow-2xl shadow-medical-teal/10">
                    Expert Medical Consultants
                </span>
                <h1 class="text-6xl md:text-7xl font-black text-white mb-10 leading-[1.15] drop-shadow-lg">
                    Consult with <span class="text-medical-teal italic">Specialists</span>
                </h1>
                <p class="text-xl md:text-2xl text-slate-100 mb-14 max-w-2xl font-medium leading-relaxed opacity-90">
                    Book appointments with top-rated doctors from world-class medical facilities and get expert care.
                </p>
                
                <!-- Hero Search Bar -->
                <div class="max-w-2xl bg-white/10 backdrop-blur-xl p-3 rounded-[2.5rem] border border-white/20 shadow-2xl flex items-center">
                    <div class="flex-grow flex items-center px-6">
                        <svg class="w-6 h-6 text-medical-teal mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <input type="text" placeholder="Search by name, specialization, or hospital..." class="w-full bg-transparent border-none text-white placeholder-white/50 focus:ring-0 text-lg font-medium py-3">
                    </div>
                    <x-button variant="medical" class="bg-medical-teal hover:bg-medical-teal/90 text-white font-black px-10 py-4 rounded-full shadow-xl shadow-medical-teal/20 transition-all hover:tracking-wide">
                        Find Doctor
                    </x-button>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Section -->
    <div class="bg-slate-50/50 py-20 -mt-16 relative z-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                
                <!-- Sidebar: Filters (Col 3) -->
                <aside class="lg:col-span-3 space-y-10">
                    <div class="bg-white p-10 rounded-[2rem] border border-slate-100 shadow-sm sticky top-28">
                        <div class="flex items-center justify-between mb-8 pb-4 border-b border-slate-50">
                            <h3 class="text-2xl font-black text-slate-900">Filters</h3>
                            <button class="text-[10px] font-black text-muted uppercase tracking-widest hover:text-medical-teal transition-colors">Reset</button>
                        </div>
                        
                        <div class="space-y-8">
                            <!-- Specialization -->
                            <div>
                                <label class="text-[11px] font-black text-slate-500 uppercase tracking-widest mb-3 block">Specialization</label>
                                <select class="w-full bg-slate-50 border-transparent rounded-2xl py-4 px-6 focus:bg-white focus:ring-medical-teal/20 focus:border-medical-teal font-bold text-slate-700">
                                    <option value="all">All Fields</option>
                                    <option value="cardio">Cardiology</option>
                                    <option value="pedia">Pediatrics</option>
                                    <option value="neuro">Neurology</option>
                                </select>
                            </div>

                            <!-- Availability Date -->
                            <div>
                                <label class="text-[11px] font-black text-slate-500 uppercase tracking-widest mb-3 block">Availability</label>
                                <div class="relative">
                                    <input type="date" class="w-full bg-slate-50 border-transparent rounded-2xl py-4 px-6 focus:bg-white focus:ring-medical-teal/20 focus:border-medical-teal font-bold text-slate-700">
                                </div>
                            </div>

                            <x-button variant="medical" class="w-full font-black py-4 rounded-2xl shadow-lg border-b-4 border-medical-teal/80">
                                Filter Results
                            </x-button>
                        </div>
                    </div>
                </aside>

                <!-- Main Content: Doctor Cards (Col 9) -->
                <div class="lg:col-span-9 space-y-12">
                    <div class="flex items-end justify-between pb-4 border-b border-slate-200">
                        <div>
                            <h2 class="text-3xl font-black text-slate-900 leading-none mb-1">Available <span class="text-medical-teal italic">Specialists</span></h2>
                            <p class="text-sm text-muted font-medium">Expert consultants from our verified healthcare partners.</p>
                        </div>
                        <div class="flex items-center space-x-6">
                            <span class="text-[10px] font-black text-muted uppercase tracking-widest">Total: {{ $doctors->total() }}</span>
                            <select class="bg-white border-slate-200 rounded-xl text-[10px] font-black uppercase tracking-widest py-2 px-4 focus:ring-medical-teal/20">
                                <option>Sort: Relevant</option>
                                <option>Experience</option>
                                <option>Rating</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @forelse($doctors as $doctor)
                        <div class="group bg-white rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 p-8 flex flex-col items-center text-center relative overflow-hidden">
                            <!-- Background Decoration -->
                            <div class="absolute top-0 right-0 w-32 h-32 bg-medical-teal/5 rounded-bl-[5rem] group-hover:scale-150 transition-transform duration-700 -mr-16 -mt-16"></div>
                            
                            <!-- Profile Media -->
                            <div class="relative w-40 h-40 mx-auto my-6 z-10">
                                <div class="absolute inset-0 bg-medical-teal/10 rounded-[3rem] rotate-6 group-hover:rotate-12 transition-transform duration-500"></div>
                                <img src="https://i.pravatar.cc/300?u={{ $doctor->id }}" alt="{{ $doctor->name }}" class="w-full h-full rounded-[3rem] object-cover border-4 border-white shadow-xl relative z-10 transition-transform duration-500 group-hover:scale-105">
                                <div class="absolute -bottom-2 -right-2 w-10 h-10 bg-medical-green rounded-2xl border-4 border-white shadow-xl z-20 flex items-center justify-center animate-pulse">
                                    <div class="w-2 h-2 bg-white rounded-full"></div>
                                </div>
                            </div>

                            <!-- Doctor Info -->
                            <div class="z-10 flex-grow px-4 pb-6 w-full">
                                <h3 class="text-2xl font-black text-slate-800 mb-1 group-hover:text-medical-teal transition-colors leading-tight">
                                    {{ $doctor->name }}
                                </h3>
                                <p class="text-xs font-black text-medical-teal uppercase tracking-widest mb-6 px-3 py-1 bg-medical-teal/5 rounded-full inline-block">
                                    {{ $doctor->specialization ?: 'General Specialist' }}
                                </p>
                                
                                <div class="flex items-center justify-center space-x-6 mb-8 py-4 border-y border-slate-50">
                                    <div class="text-center">
                                        <p class="text-[9px] font-black text-muted uppercase tracking-tighter">Exp.</p>
                                        <p class="text-sm font-black text-slate-700">{{ $doctor->experience ?: '10+' }} Yrs</p>
                                    </div>
                                    <div class="w-px h-6 bg-slate-100"></div>
                                    <div class="text-center">
                                        <p class="text-[9px] font-black text-muted uppercase tracking-tighter">Rating</p>
                                        <div class="flex items-center text-yellow-500">
                                            <svg class="w-3 h-3 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                            <span class="ml-1 text-xs font-black">4.9</span>
                                        </div>
                                    </div>
                                </div>
                                
                                @if($doctor->hospitals->count() > 0)
                                <div class="flex items-center justify-center text-[10px] font-bold text-slate-500 mb-8 bg-slate-50 py-2 rounded-xl group-hover:bg-primary/5 transition-colors">
                                    <svg class="w-3 h-3 mr-2 text-primary shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                    <span class="truncate">{{ $doctor->hospitals->first()->name }}</span>
                                </div>
                                @endif
                                
                                <div class="mt-4 pt-4">
                                    <x-button variant="outline" size="sm" class="w-full border-2 border-medical-teal text-medical-teal hover:bg-medical-teal hover:text-white font-black rounded-2xl py-3 text-[11px] uppercase tracking-widest transition-all duration-300" href="{{ route('public.doctor.show', $doctor->id) }}">
                                        View Profile
                                    </x-button>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-span-3 p-40 bg-white rounded-[2.5rem] border-4 border-dashed border-slate-100 text-center animate-fade-in">
                            <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-12 h-12 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </div>
                            <h3 class="text-3xl font-black text-slate-900 mb-2">No Specialists Found</h3>
                            <p class="text-muted font-medium">Try adjusting your filters or specialization criteria.</p>
                        </div>
                        @endforelse
                    </div>

                    <!-- Modern Pagination -->
                    <div class="mt-20 pt-10 border-t border-slate-100">
                        {{ $doctors->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-guest-layout>

