<x-app-layout>
    <div class="space-y-32">
        
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-16">
            <div>
                <h1 class="text-h1 text-secondary mb-4 tracking-tight">Pharmacy <span class="text-medical-red font-black italic">Network</span></h1>
                <p class="text-body text-muted flex items-center">
                    <span class="w-8 h-8 bg-medical-red rounded-full mr-8 animate-pulse"></span>
                    Inventory Director • {{ $user->name }}
                </p>
            </div>
            <div class="flex items-center space-x-12">
                <x-button variant="outline" class="hidden md:flex">Inventory Report</x-button>
                <x-button variant="medical" class="bg-medical-red hover:bg-medical-red/90 text-white shadow-lg shadow-medical-red/20">Add New Outlet</x-button>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-24">
            <!-- My Pharmacies -->
            <x-card class="bg-white border-none shadow-sm relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-16 h-16 bg-medical-red/5 rounded-bl-full group-hover:scale-[4] transition-transform duration-500"></div>
                <div class="p-24 relative z-10">
                    <div class="w-12 h-12 bg-medical-red/10 text-medical-red rounded-card flex items-center justify-center mb-16">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" /></svg>
                    </div>
                    <h3 class="text-small font-bold text-muted uppercase tracking-widest mb-4">Total Outlets</h3>
                    <p class="text-h1 text-secondary font-black tracking-tighter">{{ $stats['my_pharmacies'] }}</p>
                </div>
            </x-card>

            <!-- Total Medicine SKUs -->
            <x-card class="bg-white border-none shadow-sm relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-16 h-16 bg-primary/5 rounded-bl-full group-hover:scale-[4] transition-transform duration-500"></div>
                <div class="p-24 relative z-10">
                    <div class="w-12 h-12 bg-primary/10 text-primary rounded-card flex items-center justify-center mb-16">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" /></svg>
                    </div>
                    <h3 class="text-small font-bold text-muted uppercase tracking-widest mb-4">Medicine SKUs</h3>
                    <p class="text-h1 text-secondary font-black tracking-tighter">{{ $stats['total_medicines'] }}</p>
                </div>
            </x-card>

            <!-- Sales (Mock) -->
            <x-card class="bg-white border-none shadow-sm relative overflow-hidden group opacity-50">
                <div class="p-24">
                    <div class="w-12 h-12 bg-slate-100 text-muted rounded-card flex items-center justify-center mb-16">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg>
                    </div>
                    <h3 class="text-small font-bold text-muted uppercase tracking-widest mb-4">Pending Orders</h3>
                    <p class="text-h1 text-secondary font-black tracking-tighter">0</p>
                </div>
            </x-card>

            <!-- DGDA Status -->
            <x-card class="bg-white border-none shadow-sm relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-16 h-16 bg-medical-green/5 rounded-bl-full group-hover:scale-[4] transition-transform duration-500"></div>
                <div class="p-24 relative z-10">
                    <div class="w-12 h-12 bg-medical-green/10 text-medical-green rounded-card flex items-center justify-center mb-16">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <h3 class="text-small font-bold text-muted uppercase tracking-widest mb-4">Compliance</h3>
                    <p class="text-h2 text-medical-green font-black tracking-tighter uppercase mt-8">Verified</p>
                </div>
            </x-card>
        </div>

        <!-- Pharmacies List -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-32">
            
            <div class="lg:col-span-2">
                <x-card class="p-0 border-none shadow-sm h-full overflow-hidden">
                    <div class="p-24 border-b border-slate-50 flex items-center justify-between">
                        <h3 class="text-h2 text-secondary font-bold">💊 Registered Outlets</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="bg-slate-50/50">
                                    <th class="px-24 py-16 text-[10px] font-extrabold text-muted uppercase tracking-wider">Pharmacy Outlet</th>
                                    <th class="px-24 py-16 text-[10px] font-extrabold text-muted uppercase tracking-wider">Location</th>
                                    <th class="px-24 py-16 text-[10px] font-extrabold text-muted uppercase tracking-wider text-right">Added</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                @forelse($stats['recent_pharmacies'] as $p)
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="px-24 py-16">
                                        <div class="flex items-center space-x-12">
                                            <div class="w-10 h-10 rounded-card bg-medical-red/10 text-medical-red flex items-center justify-center font-black text-[11px] uppercase">
                                                {{ substr($p->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <p class="text-body font-black text-secondary">{{ $p->name }}</p>
                                                <p class="text-[11px] text-muted font-bold">{{ $p->phone ?? 'No Contact' }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-24 py-16 text-small text-muted font-bold">
                                        {{ $p->thana->name ?? '—' }}
                                    </td>
                                    <td class="px-24 py-16 text-right text-small text-muted font-medium">
                                        {{ $p->created_at->diffForHumans() }}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="p-48 text-center text-muted italic">No pharmacies registered.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </x-card>
            </div>

            <!-- Side actions -->
            <div class="space-y-32">
                <x-card class="bg-slate-900 border-none shadow-xl p-32 text-white">
                    <h3 class="text-h2 font-black mb-24 italic text-sky-400">⚡ Inventory Toolkit</h3>
                    <div class="space-y-12">
                        <a href="{{ route('pharmacy.medicines.index') }}" class="flex items-center justify-between p-16 rounded-card bg-white/5 border border-white/5 hover:bg-white/10 transition-all group">
                            <span class="text-small font-bold uppercase tracking-widest">Update Stock</span>
                            <svg class="w-5 h-5 text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                        <a href="{{ route('pharmacy.orders.index') }}" class="flex items-center justify-between p-16 rounded-card bg-white/5 border border-white/5 hover:bg-white/10 transition-all group">
                            <span class="text-small font-bold uppercase tracking-widest">Process Orders</span>
                            <svg class="w-5 h-5 text-medical-red" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </x-card>
            </div>

        </div>

    </div>
</x-app-layout>
