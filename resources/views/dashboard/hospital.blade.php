<x-app-layout>
    <div class="space-y-32">
        
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-16">
            <div>
                <h1 class="text-h1 text-secondary mb-4 tracking-tight">Hospital <span class="text-primary font-black italic">Management</span></h1>
                <p class="text-body text-muted flex items-center">
                    <span class="w-8 h-8 bg-medical-teal rounded-full mr-8 animate-pulse"></span>
                    Portfolio Administrator • {{ $user->name }}
                </p>
            </div>
            <div class="flex items-center space-x-12">
                <x-button variant="outline" class="hidden md:flex">Reports</x-button>
                <x-button variant="primary" class="shadow-lg shadow-primary/20">Add New Hospital</x-button>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-24">
            <!-- My Hospitals -->
            <x-card class="bg-white border-none shadow-sm relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-16 h-16 bg-primary/5 rounded-bl-full group-hover:scale-[4] transition-transform duration-500"></div>
                <div class="p-24 relative z-10">
                    <div class="w-12 h-12 bg-primary/10 text-primary rounded-card flex items-center justify-center mb-16">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                    </div>
                    <h3 class="text-small font-bold text-muted uppercase tracking-widest mb-4">Total Hospitals</h3>
                    <p class="text-h1 text-secondary font-black tracking-tighter">{{ $stats['my_hospitals'] }}</p>
                </div>
            </x-card>

            <!-- Total Doctors -->
            <x-card class="bg-white border-none shadow-sm relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-16 h-16 bg-medical-teal/5 rounded-bl-full group-hover:scale-[4] transition-transform duration-500"></div>
                <div class="p-24 relative z-10">
                    <div class="w-12 h-12 bg-medical-teal/10 text-medical-teal rounded-card flex items-center justify-center mb-16">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" /></svg>
                    </div>
                    <h3 class="text-small font-bold text-muted uppercase tracking-widest mb-4">Total Doctors</h3>
                    <p class="text-h1 text-secondary font-black tracking-tighter">{{ $stats['total_doctors'] }}</p>
                </div>
            </x-card>

            <!-- Pending (Mock) -->
            <x-card class="bg-white border-none shadow-sm relative overflow-hidden group opacity-50">
                <div class="p-24">
                    <div class="w-12 h-12 bg-slate-100 text-muted rounded-card flex items-center justify-center mb-16">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <h3 class="text-small font-bold text-muted uppercase tracking-widest mb-4">Active Appointments</h3>
                    <p class="text-h1 text-secondary font-black tracking-tighter">0</p>
                </div>
            </x-card>

            <!-- Revenue (Mock) -->
            <x-card class="bg-white border-none shadow-sm relative overflow-hidden group opacity-50">
                <div class="p-24">
                    <div class="w-12 h-12 bg-slate-100 text-muted rounded-card flex items-center justify-center mb-16">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <h3 class="text-small font-bold text-muted uppercase tracking-widest mb-4">Est. Revenue</h3>
                    <p class="text-h1 text-secondary font-black tracking-tighter">৳ 0</p>
                </div>
            </x-card>
        </div>

        <!-- Hospitals List -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-32">
            
            <div class="lg:col-span-2">
                <x-card class="p-0 border-none shadow-sm h-full overflow-hidden">
                    <div class="p-24 border-b border-slate-50 flex items-center justify-between">
                        <h3 class="text-h2 text-secondary font-bold">🏥 Managed Facilities</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="bg-slate-50/50">
                                    <th class="px-24 py-16 text-[10px] font-extrabold text-muted uppercase tracking-wider">Hospital Name</th>
                                    <th class="px-24 py-16 text-[10px] font-extrabold text-muted uppercase tracking-wider">Location</th>
                                    <th class="px-24 py-16 text-[10px] font-extrabold text-muted uppercase tracking-wider text-right">Added</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                @forelse($stats['recent_hospitals'] as $h)
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="px-24 py-16">
                                        <div class="flex items-center space-x-12">
                                            <div class="w-10 h-10 rounded-card bg-primary/10 text-primary flex items-center justify-center font-black text-[11px] uppercase">
                                                {{ substr($h->name, 0, 1) }}
                                            </div>
                                            <p class="text-body font-black text-secondary">{{ $h->name }}</p>
                                        </div>
                                    </td>
                                    <td class="px-24 py-16 text-small text-muted font-bold">
                                        {{ $h->thana->name ?? '—' }}
                                    </td>
                                    <td class="px-24 py-16 text-right text-small text-muted font-medium">
                                        {{ $h->created_at->diffForHumans() }}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="p-48 text-center text-muted italic">No hospitals registered.</td>
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
                    <h3 class="text-h2 font-black mb-24 italic text-sky-400">⚡ Facility Toolkit</h3>
                    <div class="space-y-12">
                        <a href="{{ route('hospital.profile.edit') }}" class="flex items-center justify-between p-16 rounded-card bg-white/5 border border-white/5 hover:bg-white/10 transition-all group">
                            <span class="text-small font-bold uppercase tracking-widest">Update Profiles</span>
                            <svg class="w-5 h-5 text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                        <a href="{{ route('hospital.doctors.index') }}" class="flex items-center justify-between p-16 rounded-card bg-white/5 border border-white/5 hover:bg-white/10 transition-all group">
                            <span class="text-small font-bold uppercase tracking-widest">Manage Doctors</span>
                            <svg class="w-5 h-5 text-medical-teal" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </x-card>
            </div>

        </div>

    </div>
</x-app-layout>
