<x-app-layout>
    <div class="space-y-32">
        
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-16">
            <div>
                <h1 class="text-h1 text-secondary mb-4 tracking-tight">System <span class="text-primary font-black italic">Overview</span></h1>
                <p class="text-body text-muted flex items-center">
                    <span class="w-8 h-8 bg-medical-green rounded-full mr-8 animate-pulse"></span>
                    MediConnect Central Command • {{ now()->format('l, d F Y') }}
                </p>
            </div>
            <div class="flex items-center space-x-12">
                <x-button variant="outline" class="hidden md:flex">Download Report</x-button>
                <x-button variant="primary" class="shadow-lg shadow-primary/20">Add New Entry</x-button>
            </div>
        </div>

        <!-- Key Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-24">
            <!-- Total Users -->
            <x-card class="bg-white border-none shadow-sm relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-16 h-16 bg-primary/5 rounded-bl-full group-hover:scale-[4] transition-transform duration-500"></div>
                <div class="p-24 relative z-10">
                    <div class="w-12 h-12 bg-primary/10 text-primary rounded-card flex items-center justify-center mb-16">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                    </div>
                    <h3 class="text-small font-bold text-muted uppercase tracking-widest mb-4">Total Users</h3>
                    <p class="text-h1 text-secondary font-black tracking-tighter">{{ number_format($stats['total_users']) }}</p>
                    <div class="mt-8 flex items-center text-[10px] font-bold text-medical-green uppercase tracking-wider">
                        <svg class="w-3 h-3 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 15l7-7 7 7"/></svg>
                        12% Monthly Growth
                    </div>
                </div>
            </x-card>

            <!-- Total Doctors -->
            <x-card class="bg-white border-none shadow-sm relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-16 h-16 bg-medical-teal/5 rounded-bl-full group-hover:scale-[4] transition-transform duration-500"></div>
                <div class="p-24 relative z-10">
                    <div class="w-12 h-12 bg-medical-teal/10 text-medical-teal rounded-card flex items-center justify-center mb-16">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                    </div>
                    <h3 class="text-small font-bold text-muted uppercase tracking-widest mb-4">Doctors</h3>
                    <p class="text-h1 text-secondary font-black tracking-tighter">{{ number_format($stats['total_doctors']) }}</p>
                    <div class="mt-8 flex items-center text-[10px] font-bold text-medical-teal uppercase tracking-wider">
                        Verified Professionals
                    </div>
                </div>
            </x-card>

            <!-- Total Hospitals -->
            <x-card class="bg-white border-none shadow-sm relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-16 h-16 bg-medical-green/5 rounded-bl-full group-hover:scale-[4] transition-transform duration-500"></div>
                <div class="p-24 relative z-10">
                    <div class="w-12 h-12 bg-medical-green/10 text-medical-green rounded-card flex items-center justify-center mb-16">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                    </div>
                    <h3 class="text-small font-bold text-muted uppercase tracking-widest mb-4">Hospitals</h3>
                    <p class="text-h1 text-secondary font-black tracking-tighter">{{ number_format($stats['total_hospitals']) }}</p>
                    <div class="mt-8 flex items-center text-[10px] font-bold text-medical-green uppercase tracking-wider">
                        Active Facilities
                    </div>
                </div>
            </x-card>

            <!-- Total Pharmacies -->
            <x-card class="bg-white border-none shadow-sm relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-16 h-16 bg-medical-red/5 rounded-bl-full group-hover:scale-[4] transition-transform duration-500"></div>
                <div class="p-24 relative z-10">
                    <div class="w-12 h-12 bg-medical-red/10 text-medical-red rounded-card flex items-center justify-center mb-16">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" /></svg>
                    </div>
                    <h3 class="text-small font-bold text-muted uppercase tracking-widest mb-4">Pharmacies</h3>
                    <p class="text-h1 text-secondary font-black tracking-tighter">{{ number_format($stats['total_pharmacies']) }}</p>
                    <div class="mt-8 flex items-center text-[10px] font-bold text-medical-red uppercase tracking-wider">
                        Medicine Partners
                    </div>
                </div>
            </x-card>
        </div>

        <!-- Activity Feed / Tables -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-32">
            
            <!-- Recent Consultations -->
            <x-card class="p-0 border-none shadow-sm h-full">
                <div class="p-24 border-b border-slate-50 flex items-center justify-between">
                    <h3 class="text-h2 text-secondary font-bold">🩺 Recent Consultations</h3>
                    <span class="px-8 py-4 bg-yellow-50 text-yellow-600 text-[9px] font-black uppercase rounded-full">{{ $stats['pending_consultations'] }} Pending</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-slate-50/50">
                                <th class="px-24 py-16 text-[10px] font-extrabold text-muted uppercase tracking-wider">Patient / Doctor</th>
                                <th class="px-24 py-16 text-[10px] font-extrabold text-muted uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @foreach($stats['recent_consultations'] as $consult)
                            <tr>
                                <td class="px-24 py-16">
                                    <div class="flex items-center space-x-12">
                                        <div class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center font-black text-[11px]">
                                            {{ strtoupper(substr($consult->patient->name ?? 'P', 0, 1)) }}
                                        </div>
                                        <div>
                                            <p class="text-body font-bold text-secondary">{{ $consult->patient->name ?? 'N/A' }}</p>
                                            <p class="text-small text-muted">Dr. {{ $consult->doctor->name ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-24 py-16">
                                    <span class="px-8 py-4 rounded-full text-[9px] font-black uppercase tracking-widest
                                        {{ $consult->status === 'approved' ? 'bg-medical-green/10 text-medical-green' : 
                                           ($consult->status === 'pending' ? 'bg-yellow-50 text-yellow-600' : 'bg-slate-100 text-muted') }}">
                                        {{ $consult->status }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </x-card>

            <!-- New Doctors -->
            <x-card class="p-0 border-none shadow-sm h-full">
                <div class="p-24 border-b border-slate-50">
                    <h3 class="text-h2 text-secondary font-bold">👨‍⚕️ Recently Joined Doctors</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-slate-50/50">
                                <th class="px-24 py-16 text-[10px] font-extrabold text-muted uppercase tracking-wider">Doctor Specialist</th>
                                <th class="px-24 py-16 text-[10px] font-extrabold text-muted uppercase tracking-wider text-right">Chambers</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @foreach($stats['recent_doctors'] as $doc)
                            <tr>
                                <td class="px-24 py-16">
                                    <div class="flex items-center space-x-12">
                                        <img src="https://i.pravatar.cc/100?u={{ $doc->id }}" class="w-10 h-10 rounded-full object-cover">
                                        <div>
                                            <p class="text-body font-bold text-secondary">{{ $doc->name }}</p>
                                            <p class="text-small text-medical-teal font-bold">{{ $doc->specialization }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-24 py-16 text-right font-black text-secondary">
                                    {{ $doc->hospitals->count() }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </x-card>

        </div>

        <!-- Action Grid -->
        <x-card class="border-none shadow-sm p-32 bg-slate-900 text-white">
            <h3 class="text-h2 font-black mb-24 italic text-sky-400">⚡ Administrative Actions</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-16">
                <a href="{{ route('admin.users.index') }}" class="flex flex-col items-center justify-center p-16 rounded-card bg-white/5 hover:bg-white/10 transition-colors border border-white/5 group text-center">
                    <svg class="w-8 h-8 mb-8 text-sky-400 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    <span class="text-small font-bold uppercase tracking-tighter">Manage Users</span>
                </a>
                <a href="{{ route('admin.hospitals.index') }}" class="flex flex-col items-center justify-center p-16 rounded-card bg-white/5 hover:bg-white/10 transition-colors border border-white/5 group text-center">
                    <svg class="w-8 h-8 mb-8 text-medical-green group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    <span class="text-small font-bold uppercase tracking-tighter">Hospitals</span>
                </a>
                <a href="{{ route('admin.doctors.index') }}" class="flex flex-col items-center justify-center p-16 rounded-card bg-white/5 hover:bg-white/10 transition-colors border border-white/5 group text-center">
                    <svg class="w-8 h-8 mb-8 text-medical-teal group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    <span class="text-small font-bold uppercase tracking-tighter">Doctors</span>
                </a>
                <a href="{{ route('admin.pharmacies.index') }}" class="flex flex-col items-center justify-center p-16 rounded-card bg-white/5 hover:bg-white/10 transition-colors border border-white/5 group text-center">
                    <svg class="w-8 h-8 mb-8 text-medical-red group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
                    <span class="text-small font-bold uppercase tracking-tighter">Pharmacies</span>
                </a>
            </div>
        </x-card>

    </div>
</x-app-layout>
