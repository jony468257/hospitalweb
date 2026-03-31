<x-guest-layout>
    <div class="bg-slate-50/50 min-h-screen pt-32 pb-48">
        <div class="max-w-7xl mx-auto px-16 sm:px-24 lg:px-32">
            
            <!-- Page Header -->
            <div class="mb-40">
                <h1 class="text-h1 text-secondary mb-8">Medicine <span class="text-medical-red font-black italic">Marketplace</span></h1>
                <p class="text-body text-muted">Order verified medicines and healthcare essentials from local pharmacies.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-32">
                
                <!-- Sidebar Filters -->
                <aside class="lg:col-span-1 space-y-24">
                    <x-card class="border-none shadow-sm p-24">
                        <h3 class="text-h2 text-secondary mb-24 font-bold border-b border-slate-50 pb-12">Search Medicine</h3>
                        
                        <!-- Product Search -->
                        <div class="space-y-8 mb-24">
                            <label class="text-small font-bold text-secondary uppercase tracking-widest">Brand or Generic</label>
                            <x-input placeholder="Napa, Sergel, etc..." class="bg-white border-slate-200" />
                        </div>

                        <!-- Category Filter -->
                        <div class="space-y-8 mb-24">
                            <label class="text-small font-bold text-secondary uppercase tracking-widest">Category</label>
                            <select class="w-full px-16 py-12 rounded-card border-slate-200 text-body bg-white focus:ring-medical-red/20 focus:border-medical-red">
                                <option value="all">All Categories</option>
                                <option value="antibiotics">Antibiotics</option>
                                <option value="pediatrics">Pediatrics</option>
                                <option value="otc">Over-the-Counter</option>
                            </select>
                        </div>

                        <x-button variant="danger" class="w-full font-bold py-12 bg-medical-red">Filter Products</x-button>
                    </x-card>

                    <!-- Trust Signals -->
                    <x-card class="bg-slate-900 border-none p-24 text-white">
                        <div class="flex items-center space-x-12 mb-16">
                            <div class="w-10 h-10 bg-medical-green rounded-full flex items-center justify-center text-white"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg></div>
                            <h4 class="text-body font-bold uppercase tracking-widest">Verified Pharmacy</h4>
                        </div>
                        <p class="text-small opacity-70">Every pharmacy partner is DGDA verified for your safety.</p>
                    </x-card>
                </aside>

                <!-- Products Grid -->
                <div class="lg:col-span-3">
                    <div class="flex items-center justify-between mb-24">
                        <div class="text-small font-bold text-muted uppercase tracking-widest">{{ $medicines->count() }} Products Found</div>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-3 gap-24">
                        @forelse($medicines as $medicine)
                        <x-card padding="p-0" class="flex flex-col group border-none shadow-sm hover:shadow-xl transition-all h-full bg-white relative">
                            <div class="relative h-48 bg-slate-50 flex items-center justify-center p-24 overflow-hidden rounded-t-card shrink-0">
                                <img src="https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&q=80&w=800" alt="{{ $medicine->name }}" class="w-full h-full object-contain mix-blend-multiply group-hover:scale-110 transition-transform">
                                <div class="absolute top-12 left-12 px-10 py-2 bg-medical-red/10 text-medical-red text-[9px] font-extrabold uppercase rounded-full tracking-widest">In Stock</div>
                            </div>
                            <div class="p-20 flex flex-col flex-grow">
                                <h3 class="text-h2 text-secondary mb-4 line-clamp-1 font-bold group-hover:text-medical-red transition-colors">{{ $medicine->name }}</h3>
                                <p class="text-small text-muted mb-12 line-clamp-1 italic font-medium">{{ $medicine->generic_name ?: 'Medical Essential' }}</p>
                                
                                <div class="mt-auto pt-16 flex items-center justify-between">
                                    <div class="text-h2 text-secondary font-black">৳{{ number_format($medicine->price, 2) }}</div>
                                    <x-button variant="danger" size="sm" class="px-12 bg-medical-red hover:bg-medical-red/90"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg></x-button>
                                </div>
                            </div>
                        </x-card>
                        @empty
                        <div class="col-span-3 p-64 bg-white rounded-card border-2 border-dashed border-slate-200 text-center">
                            <h3 class="text-h2 text-muted mb-8">No medicines listed yet</h3>
                            <p class="text-body text-muted">Please check back later or search for pharmacies.</p>
                        </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="mt-48">
                        {{ $medicines->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
