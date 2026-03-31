<x-guest-layout>
    <div class="bg-slate-50/50 min-h-screen pt-32 pb-48">
        <div class="max-w-7xl mx-auto px-16 sm:px-24 lg:px-32">
            
            <!-- Page Header -->
            <div class="mb-40">
                <h1 class="text-h1 text-secondary mb-8">Find Your <span class="text-primary font-black italic">Hospital</span></h1>
                <p class="text-body text-muted">Discover and compare the best medical facilities in your area.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-32">
                
                <!-- Sidebar Filters -->
                <aside class="lg:col-span-1 space-y-24">
                    <x-card class="border-none shadow-sm p-24">
                        <h3 class="text-h2 text-secondary mb-24 font-bold border-b border-slate-50 pb-12">Filters</h3>
                        
                        <!-- Location Filter -->
                        <div class="space-y-8 mb-24">
                            <label class="text-small font-bold text-secondary uppercase tracking-widest">Location</label>
                            <x-input placeholder="Enter area name..." class="bg-white border-slate-200" />
                        </div>

                        <!-- Rating Filter -->
                        <div class="space-y-8 mb-24">
                            <label class="text-small font-bold text-secondary uppercase tracking-widest">Min. Rating</label>
                            <select class="w-full px-16 py-12 rounded-card border-slate-200 text-body bg-white focus:ring-primary/20 focus:border-primary">
                                <option value="all">All Ratings</option>
                                <option value="4+">4.0 & Above</option>
                                <option value="3+">3.0 & Above</option>
                            </select>
                        </div>

                        <x-button variant="primary" class="w-full font-bold py-12">Apply Filters</x-button>
                        <button class="w-full text-center text-small font-bold text-muted hover:text-medical-red transition-colors mt-16 underline">Clear All</button>
                    </x-card>

                    <!-- Emergency Banner -->
                    <x-card class="bg-medical-red p-24 border-none shadow-xl shadow-medical-red/20 text-white group">
                        <h4 class="text-h2 font-black mb-8">Emergency?</h4>
                        <p class="text-small opacity-90 mb-16">Call our 24/7 hotline for instant hospital booking and ambulance assistance.</p>
                        <div class="text-h2 font-black group-hover:scale-105 transition-transform">+880 1234 567</div>
                    </x-card>
                </aside>

                <!-- Hospital Grid -->
                <div class="lg:col-span-3">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-24">
                        @forelse($hospitals as $hospital)
                        <x-card class="p-0 border-none group relative">
                            <div class="relative h-48 overflow-hidden rounded-t-card">
                                <img src="https://images.unsplash.com/photo-1587350859728-117622bc736d?auto=format&fit=crop&q=80&w=800" alt="Hospital" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent"></div>
                                <div class="absolute bottom-16 left-16 text-white">
                                    <div class="flex items-center space-x-4">
                                        <svg class="w-4 h-4 text-yellow-500 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        <span class="text-small font-bold">4.8</span>
                                    </div>
                                </div>
                            </div>
                            <div class="p-24 bg-white rounded-b-card">
                                <div class="flex justify-between items-start mb-8">
                                    <h3 class="text-h2 text-secondary group-hover:text-primary transition-colors">{{ $hospital->name }}</h3>
                                </div>
                                <p class="text-small text-muted flex items-center mb-16">
                                    <svg class="w-4 h-4 mr-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg> 
                                    {{ $hospital->thana->name ?? 'Dhaka City' }}
                                </p>
                                <div class="flex flex-wrap gap-8 mb-24">
                                    @forelse($hospital->features->take(2) as $feature)
                                    <span class="px-8 py-4 bg-slate-50 text-secondary text-[9px] font-extrabold uppercase rounded-full tracking-wider">{{ $feature->name }}</span>
                                    @empty
                                    <span class="px-8 py-4 bg-slate-50 text-secondary text-[9px] font-extrabold uppercase rounded-full tracking-wider">Verified Care</span>
                                    @endforelse
                                </div>
                                <x-button variant="outline" class="w-full py-12" href="{{ route('public.hospital.show', $hospital->slug) }}">View Facility</x-button>
                            </div>
                        </x-card>
                        @empty
                        <div class="col-span-2 p-64 bg-white rounded-card border-2 border-dashed border-slate-200 text-center">
                            <h3 class="text-h2 text-muted mb-8">No hospitals found</h3>
                            <p class="text-body text-muted">Try adjusting your filters or area name.</p>
                        </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="mt-40">
                        {{ $hospitals->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
