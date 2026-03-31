<x-app-layout>
    <div class="space-y-32">
        
        <!-- Doctor Profile Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-24">
            <div class="flex items-center space-x-24">
                <div class="relative">
                    <img src="https://i.pravatar.cc/150?u={{ $doctor->id }}" alt="Dr. {{ $doctor->name }}" class="w-24 h-24 rounded-full border-4 border-white shadow-xl">
                    <div class="absolute bottom-0 right-0 w-8 h-8 bg-medical-green rounded-full border-4 border-white shadow-sm"></div>
                </div>
                <div>
                    <h1 class="text-h1 text-secondary tracking-tight">Welcome back, <span class="text-medical-teal font-black">Dr. {{ $doctor->name }}</span></h1>
                    <div class="flex flex-wrap gap-8 items-center mt-4 text-body font-medium">
                        <span class="px-8 py-2 bg-medical-teal/10 text-medical-teal rounded-full text-[10px] font-black uppercase tracking-widest border border-medical-teal/20">{{ $doctor->specialization }}</span>
                        <span class="text-muted">• {{ $doctor->degree ?? 'MBBS' }} • {{ $doctor->experience_year ?? 0 }} Years Experience</span>
                    </div>
                </div>
            </div>
            <div class="flex items-center space-x-12">
                <x-button variant="outline" class="hidden md:flex">Update Schedule</x-button>
                <x-button variant="medical" class="shadow-lg shadow-medical-teal/20">Go Online</x-button>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-24">
            <!-- Pending Requests -->
            <x-card class="bg-white border-none shadow-sm relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-16 h-16 bg-yellow-400/5 rounded-bl-full group-hover:scale-[4] transition-transform duration-500"></div>
                <div class="p-24 relative z-10">
                    <div class="w-12 h-12 bg-yellow-400/10 text-yellow-600 rounded-card flex items-center justify-center mb-16">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <h3 class="text-small font-bold text-muted uppercase tracking-widest mb-4">Pending Requests</h3>
                    <p class="text-h1 text-secondary font-black tracking-tighter">{{ $stats['pending_consults'] }}</p>
                </div>
            </x-card>

            <!-- Completed Sessions -->
            <x-card class="bg-white border-none shadow-sm relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-16 h-16 bg-medical-green/5 rounded-bl-full group-hover:scale-[4] transition-transform duration-500"></div>
                <div class="p-24 relative z-10">
                    <div class="w-12 h-12 bg-medical-green/10 text-medical-green rounded-card flex items-center justify-center mb-16">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <h3 class="text-small font-bold text-muted uppercase tracking-widest mb-4">Completed</h3>
                    <p class="text-h1 text-secondary font-black tracking-tighter">{{ $stats['done_consults'] }}</p>
                </div>
            </x-card>

            <!-- Chamber/Hospitals -->
            <x-card class="bg-white border-none shadow-sm relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-16 h-16 bg-primary/5 rounded-bl-full group-hover:scale-[4] transition-transform duration-500"></div>
                <div class="p-24 relative z-10">
                    <div class="w-12 h-12 bg-primary/10 text-primary rounded-card flex items-center justify-center mb-16">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5" /></svg>
                    </div>
                    <h3 class="text-small font-bold text-muted uppercase tracking-widest mb-4">Active Chambers</h3>
                    <p class="text-h1 text-secondary font-black tracking-tighter">{{ $stats['my_hospitals'] }}</p>
                </div>
            </x-card>

            <!-- Avg Rating -->
            <x-card class="bg-white border-none shadow-sm relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-16 h-16 bg-medical-teal/5 rounded-bl-full group-hover:scale-[4] transition-transform duration-500"></div>
                <div class="p-24 relative z-10">
                    <div class="w-12 h-12 bg-medical-teal/10 text-medical-teal rounded-card flex items-center justify-center mb-16">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <h3 class="text-small font-bold text-muted uppercase tracking-widest mb-4">Patient Score</h3>
                    <p class="text-h1 text-secondary font-black tracking-tighter">{{ number_format($stats['avg_rating'] ?? 0, 1) }}</p>
                </div>
            </x-card>
        </div>

        <!-- Main Content -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-32">
            
            <!-- Recent Consultation Requests -->
            <x-card class="p-0 border-none shadow-sm overflow-hidden h-full">
                <div class="p-24 border-b border-slate-50 flex items-center justify-between">
                    <h3 class="text-h2 text-secondary font-bold">🩺 Consultation Queue</h3>
                    @if($stats['pending_consults'] > 0)
                        <span class="px-8 py-4 bg-yellow-50 text-yellow-600 text-[9px] font-black uppercase rounded-full animate-pulse">{{ $stats['pending_consults'] }} New</span>
                    @endif
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-slate-50/50">
                                <th class="px-24 py-16 text-[10px] font-extrabold text-muted uppercase tracking-wider">Patient Details</th>
                                <th class="px-24 py-16 text-[10px] font-extrabold text-muted uppercase tracking-wider">Time</th>
                                <th class="px-24 py-16 text-[10px] font-extrabold text-muted uppercase tracking-wider text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @foreach($stats['recent_consults'] as $c)
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-24 py-16">
                                    <div class="flex items-center space-x-12">
                                        <div class="w-10 h-10 rounded-full bg-slate-100 text-secondary flex items-center justify-center font-black text-[11px] uppercase">
                                            {{ substr($c->patient->name ?? 'P', 0, 1) }}
                                        </div>
                                        <div>
                                            <p class="text-body font-bold text-secondary">{{ $c->patient->name ?? 'N/A' }}</p>
                                            <p class="text-small text-muted">{{ $c->patient->phone ?? 'Private' }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-24 py-16">
                                    <div class="text-small font-bold text-secondary">{{ $c->scheduled_at ?? $c->consult_date ?? '—' }}</div>
                                </td>
                                <td class="px-24 py-16 text-right">
                                    <span class="px-8 py-4 rounded-full text-[9px] font-black uppercase tracking-widest
                                        {{ $c->status === 'approved' ? 'bg-medical-green/10 text-medical-green' : 'bg-yellow-400/10 text-yellow-600' }}">
                                        {{ $c->status }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if(!$stats['recent_consults']->count())
                <div class="p-48 text-center bg-white">
                    <p class="text-body text-muted italic font-medium">No active consultation requests.</p>
                </div>
                @endif
            </x-card>

            <!-- Quick Actions & Schedule -->
            <div class="space-y-32">
                <x-card class="bg-slate-900 border-none shadow-xl p-32 text-white">
                    <h3 class="text-h2 font-black mb-24 italic text-sky-400">⚡ Doctor Toolkit</h3>
                    <div class="grid grid-cols-2 gap-16">
                        <a href="{{ route('doctor.schedules.index') }}" class="p-16 rounded-card bg-white/5 border border-white/5 hover:bg-white/10 transition-all group">
                            <svg class="w-8 h-8 mb-8 text-sky-400 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span class="block text-small font-bold uppercase tracking-widest">Manage Schedule</span>
                        </a>
                        <a href="{{ route('doctor.consultations.index') }}" class="p-16 rounded-card bg-white/5 border border-white/5 hover:bg-white/10 transition-all group">
                            <svg class="w-8 h-8 mb-8 text-medical-teal group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            <span class="block text-small font-bold uppercase tracking-widest">Consultations</span>
                        </a>
                    </div>
                </x-card>

                <x-card class="bg-white border-none shadow-sm p-32">
                    <h3 class="text-h2 text-secondary font-bold mb-16">Pharmacy Recommendation</h3>
                    <p class="text-small text-muted mb-24 font-medium leading-relaxed">Boost your consultation quality by recommending top-rated local pharmacies to your patients for their medications.</p>
                    <x-button variant="outline" class="w-full font-bold">Partner Pharmacies</x-button>
                </x-card>
            </div>

        </div>

    </div>
</x-app-layout>
