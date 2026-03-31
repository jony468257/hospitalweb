<x-guest-layout>
    <!-- Hospitals Hero Section -->
    <section class="relative min-h-[500px] flex items-center pt-24 pb-32 overflow-hidden">
        <!-- Background Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/hospitals_hero_bg.png') }}" alt="Medical Healthcare" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-black/95 via-black/70 to-black/30"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="animate-fade-in-up">
                <span class="px-5 py-2 bg-primary/20 backdrop-blur-md text-primary-light rounded-full text-xs font-black uppercase tracking-[0.3em] mb-8 inline-block border border-primary/30">
                    Trusted Healthcare Network
                </span>
                <h1 class="text-6xl md:text-7xl font-black text-white mb-8 tracking-tight leading-loose drop-shadow-2xl">
                    Find Your <span class="text-sky-400 italic">Hospital</span>
                </h1>
                <p class="text-xl md:text-2xl text-slate-200 mb-12 max-w-3xl mx-auto font-medium leading-relaxed">
                    Connecting you with over 500+ verified medical institutions for the care you deserve.
                </p>
                
                <!-- Hero Search Bar -->
                <div class="max-w-2xl mx-auto bg-white/10 backdrop-blur-xl p-3 rounded-[2.5rem] border border-white/20 shadow-2xl flex items-center">
                    <div class="flex-grow flex items-center px-6">
                        <svg class="w-6 h-6 text-sky-400 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <input type="text" placeholder="Search hospitals, locations, or specialties..." class="w-full bg-transparent border-none text-white placeholder-white/50 focus:ring-0 text-lg font-medium py-3">
                    </div>
                    <x-button variant="primary" class="bg-sky-500 hover:bg-sky-400 text-slate-900 font-black px-10 py-4 rounded-full shadow-xl shadow-sky-500/20 transition-all hover:tracking-wide">
                        Search Now
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
                            <button class="text-[10px] font-black text-muted uppercase tracking-widest hover:text-primary transition-colors">Reset</button>
                        </div>
                        
                        <div class="space-y-8">
                            <!-- Location -->
                            <div>
                                <label class="text-[11px] font-black text-slate-500 uppercase tracking-widest mb-3 block">Location</label>
                                <div class="relative">
                                    <x-input placeholder="Enter area name..." class="bg-slate-50 border-transparent rounded-2xl py-4 pl-12 focus:bg-white focus:border-primary/20" />
                                    <svg class="w-5 h-5 text-slate-400 absolute left-4 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </div>
                            </div>

                            <!-- Categories -->
                            <div>
                                <label class="text-[11px] font-black text-slate-500 uppercase tracking-widest mb-3 block">Trust Rating</label>
                                <div class="space-y-2">
                                    @foreach(['4.5+', '4.0+', '3.5+'] as $rating)
                                    <label class="flex items-center space-x-3 p-3 rounded-xl hover:bg-slate-50 cursor-pointer transition-colors group">
                                        <input type="checkbox" class="w-5 h-5 rounded-lg border-slate-200 text-primary focus:ring-primary/20">
                                        <span class="text-sm font-bold text-slate-600 group-hover:text-primary transition-colors">{{ $rating }} Rating</span>
                                    </label>
                                    @endforeach
                                </div>
                            </div>

                            <x-button variant="primary" class="w-full font-black py-4 rounded-2xl shadow-lg border-b-4 border-primary-dark">
                                Apply Filter
                            </x-button>
                        </div>

                        <!-- Emergency Emergency -->
                        <div class="mt-10 bg-medical-red p-8 rounded-[2rem] text-white shadow-xl shadow-medical-red/20 relative overflow-hidden group">
                            <div class="absolute -right-6 -bottom-6 w-32 h-32 bg-white/10 rounded-full blur-2xl group-hover:bg-white/20 transition-all"></div>
                            <h4 class="text-2xl font-black mb-4 relative z-10">Ambulance?</h4>
                            <p class="text-xs font-medium opacity-80 mb-8 relative z-10">Instant responses for critical situations.</p>
                            <div class="text-3xl font-black relative z-10 tracking-tight">+880 1234 567</div>
                        </div>
                    </div>
                </aside>

                <!-- Main Content: Hospital Cards (Col 9) -->
                <div class="lg:col-span-9 space-y-12">
                    <div class="flex items-end justify-between pb-4 border-b border-slate-200">
                        <div>
                            <h2 class="text-3xl font-black text-slate-900 leading-none mb-1">Available <span class="text-primary italic">Centers</span></h2>
                            <p class="text-sm text-muted font-medium">Browse verified medical facilities near you.</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="text-[10px] font-black text-muted uppercase tracking-widest">Sort By:</span>
                            <select class="bg-white border-slate-200 rounded-xl text-[10px] font-black uppercase tracking-widest py-2 px-4 focus:ring-primary/20">
                                <option>Popularity</option>
                                <option>Rating</option>
                                <option>Nearest</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        @forelse($hospitals as $hospital)
                        <div class="group bg-white rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 overflow-hidden relative">
                            <!-- Card Media -->
                            <div class="relative h-64 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1587350859728-117622bc736d?auto=format&fit=crop&q=80&w=800" alt="Hospital Building" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent"></div>
                                
                                <!-- Meta Overlays -->
                                <div class="absolute top-6 left-6">
                                    <span class="px-4 py-1.5 bg-medical-green text-white rounded-full text-[10px] font-black uppercase tracking-widid shadow-xl shadow-medical-green/40">
                                        Verified
                                    </span>
                                </div>
                                
                                <div class="absolute bottom-6 left-6 text-white">
                                    <div class="flex items-center bg-white/10 backdrop-blur-md px-3 py-1.5 rounded-full border border-white/20">
                                        <svg class="w-4 h-4 text-yellow-500 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        <span class="ml-1.5 text-xs font-bold text-white">4.8 (80 Reviews)</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Body -->
                            <div class="p-10 relative">
                                <div class="absolute -top-12 right-10">
                                    <div class="w-20 h-20 bg-white rounded-3xl shadow-xl border border-slate-50 flex items-center justify-center p-4">
                                        <div class="w-full h-full bg-slate-50 rounded-2xl flex items-center justify-center text-primary font-black text-xl">
                                            {{ substr($hospital->name, 0, 1) }}
                                        </div>
                                    </div>
                                </div>

                                <h3 class="text-2xl font-black text-slate-800 mb-2 mt-2 group-hover:text-primary transition-colors leading-tight">
                                    {{ $hospital->name }}
                                </h3>
                                <p class="text-sm font-bold text-muted flex items-center mb-8">
                                    <svg class="w-4 h-4 mr-2 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg> 
                                    {{ $hospital->thana->name ?? 'Dhaka, BD' }}
                                </p>

                                <div class="flex flex-wrap gap-3 mb-10 pb-8 border-b border-slate-50">
                                    @forelse($hospital->features->take(3) as $feature)
                                    <span class="px-4 py-1.5 bg-slate-50 text-slate-500 text-[9px] font-black uppercase tracking-widest rounded-xl border border-slate-100 group-hover:bg-primary/5 transition-colors">
                                        {{ $feature->name }}
                                    </span>
                                    @empty
                                    <span class="px-4 py-1.5 bg-slate-50 text-slate-500 text-[9px] font-black uppercase tracking-widest rounded-xl">Verified Care</span>
                                    @endforelse
                                </div>

                                <div class="flex items-center justify-between">
                                    <p class="text-[10px] font-black text-muted uppercase tracking-widest">
                                        Available 24/7
                                    </p>
                                    <x-button variant="primary" class="rounded-2xl font-black py-4 px-8 text-[11px] uppercase tracking-widest shadow-lg shadow-primary/20" href="{{ route('public.hospital.show', $hospital->slug) }}">
                                        View Center
                                    </x-button>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-span-2 p-40 bg-white rounded-[2.5rem] border-4 border-dashed border-slate-100 text-center animate-fade-in">
                            <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-12 h-12 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            </div>
                            <h3 class="text-3xl font-black text-slate-900 mb-2">No Centers Found</h3>
                            <p class="text-muted font-medium mb-10">We couldn't find any centers matching your search criteria.</p>
                            <x-button variant="outline" class="rounded-2xl font-black text-xs uppercase tracking-widest">Reset Filters</x-button>
                        </div>
                        @endforelse
                    </div>

                    <!-- Modern Pagination -->
                    <div class="mt-20 pt-10 border-t border-slate-100">
                        {{ $hospitals->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-guest-layout>

