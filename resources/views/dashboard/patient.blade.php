<x-app-layout>
    <div class="space-y-32">
        
        <!-- Patient Profile Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-24">
            <div class="flex items-center space-x-24">
                <div class="relative">
                    <div class="w-24 h-24 rounded-full bg-primary/10 border-4 border-white shadow-xl flex items-center justify-center text-primary text-h1 font-black uppercase">
                        {{ substr($user->name, 0, 1) }}
                    </div>
                </div>
                <div>
                    <h1 class="text-h1 text-secondary tracking-tight">Good day, <span class="text-primary font-black italic">{{ $user->name }}</span></h1>
                    <p class="text-body text-muted flex items-center mt-4">
                        <svg class="w-4 h-4 mr-8 text-medical-green" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        MediConnect Verified Patient • Member since {{ $user->created_at->format('M Y') }}
                    </p>
                </div>
            </div>
            <div class="flex items-center space-x-12">
                <x-button variant="outline" class="hidden md:flex">Health Records</x-button>
                <x-button variant="primary" class="shadow-lg shadow-primary/20">Book Appointment</x-button>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-24">
            <!-- Total Bookings -->
            <x-card class="bg-white border-none shadow-sm relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-16 h-16 bg-primary/5 rounded-bl-full group-hover:scale-[4] transition-transform duration-500"></div>
                <div class="p-24 relative z-10">
                    <div class="w-12 h-12 bg-primary/10 text-primary rounded-card flex items-center justify-center mb-16">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                    </div>
                    <h3 class="text-small font-bold text-muted uppercase tracking-widest mb-4">Total Bookings</h3>
                    <p class="text-h1 text-secondary font-black tracking-tighter">{{ $stats['my_consultations'] }}</p>
                </div>
            </x-card>

            <!-- Bookmarks -->
            <x-card class="bg-white border-none shadow-sm relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-16 h-16 bg-medical-red/5 rounded-bl-full group-hover:scale-[4] transition-transform duration-500"></div>
                <div class="p-24 relative z-10">
                    <div class="w-12 h-12 bg-medical-red/10 text-medical-red rounded-card flex items-center justify-center mb-16">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                    </div>
                    <h3 class="text-small font-bold text-muted uppercase tracking-widest mb-4">Saved Doctors</h3>
                    <p class="text-h1 text-secondary font-black tracking-tighter">{{ $stats['bookmarks'] }}</p>
                </div>
            </x-card>

            <!-- Pending -->
            <x-card class="bg-white border-none shadow-sm relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-16 h-16 bg-yellow-400/5 rounded-bl-full group-hover:scale-[4] transition-transform duration-500"></div>
                <div class="p-24 relative z-10">
                    <div class="w-12 h-12 bg-yellow-400/10 text-yellow-600 rounded-card flex items-center justify-center mb-16">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <h3 class="text-small font-bold text-muted uppercase tracking-widest mb-4">Awaiting</h3>
                    <p class="text-h1 text-secondary font-black tracking-tighter">{{ $stats['recent_consults']->where('status', 'pending')->count() }}</p>
                </div>
            </x-card>

            <!-- Rewards (Placeholder Concept) -->
            <x-card class="bg-white border-none shadow-sm relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-16 h-16 bg-medical-green/5 rounded-bl-full group-hover:scale-[4] transition-transform duration-500"></div>
                <div class="p-24 relative z-10">
                    <div class="w-12 h-12 bg-medical-green/10 text-medical-green rounded-card flex items-center justify-center mb-16">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" /></svg>
                    </div>
                    <h3 class="text-small font-bold text-muted uppercase tracking-widest mb-4">Health Score</h3>
                    <p class="text-h1 text-secondary font-black tracking-tighter">92%</p>
                </div>
            </x-card>
        </div>

        <!-- Main Dashboard View -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-32">
            
            <!-- Consultation History (2/3 width on LG) -->
            <div class="lg:col-span-2 space-y-32">
                <x-card class="p-0 border-none shadow-sm overflow-hidden h-full">
                    <div class="p-24 border-b border-slate-50">
                        <h3 class="text-h2 text-secondary font-bold">🩺 Recent Activity</h3>
                    </div>
                    
                    <div class="divide-y divide-slate-50">
                        @forelse($stats['recent_consults'] as $c)
                        <div class="p-24 hover:bg-slate-50/50 transition-colors flex flex-col sm:flex-row sm:items-center justify-between gap-16">
                            <div class="flex items-center space-x-16">
                                <div class="w-14 h-14 rounded-full bg-primary/5 text-primary flex items-center justify-center font-black text-h2 uppercase">
                                    {{ substr($c->doctor->name ?? 'D', 0, 1) }}
                                </div>
                                <div>
                                    <h4 class="text-body font-black text-secondary">Consultation with {{ $c->doctor->name ?? 'Doctor' }}</h4>
                                    <p class="text-small text-muted font-medium mb-4">{{ $c->doctor->specialization ?? 'General Specialist' }}</p>
                                    <div class="flex items-center text-[11px] text-muted font-bold">
                                        <svg class="w-3 h-3 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        {{ \Carbon\Carbon::parse($c->consult_date)->format('M d, Y • h:i A') }}
                                    </div>
                                </div>
                            </div>
                            <div>
                                <span class="px-12 py-4 rounded-full text-[9px] font-black uppercase tracking-widest
                                    {{ $c->status === 'approved' ? 'bg-medical-green/10 text-medical-green' : 
                                       ($c->status === 'pending' ? 'bg-yellow-400/10 text-yellow-600' : 'bg-slate-100 text-muted') }}">
                                    {{ $c->status }}
                                </span>
                            </div>
                        </div>
                        @empty
                        <div class="p-64 text-center">
                            <div class="text-48 mb-16 opacity-20">🏥</div>
                            <h4 class="text-h2 text-secondary font-bold">No Recent Activity</h4>
                            <p class="text-body text-muted mt-8">Your medical journey starts here. Book your first appointment.</p>
                            <x-button variant="primary" class="mt-24">Find Doctors</x-button>
                        </div>
                        @endforelse
                    </div>
                </x-card>
            </div>

            <!-- Sidebar Widgets (1/3 width on LG) -->
            <div class="space-y-32">
                <!-- Upcoming Widget -->
                <x-card class="border-none shadow-sm overflow-hidden">
                    <h3 class="text-small font-black text-muted uppercase tracking-widest mb-16">Next Appointment</h3>
                    @php $next = $stats['recent_consults']->where('status', 'approved')->first(); @endphp
                    @if($next)
                    <div class="bg-primary/5 rounded-card p-16 border-l-4 border-primary">
                        <p class="text-body font-black text-secondary">{{ $next->doctor->name }}</p>
                        <p class="text-[11px] text-primary font-bold uppercase mt-4">
                            {{ \Carbon\Carbon::parse($next->consult_date)->diffForHumans() }}
                        </p>
                        <x-button variant="ghost" class="p-0 mt-8 text-primary font-black text-[11px] hover:bg-transparent">VIEW DETAILS →</x-button>
                    </div>
                    @else
                    <div class="text-center py-16">
                        <p class="text-small text-muted font-medium italic">No upcoming sessions</p>
                    </div>
                    @endif
                </x-card>

                <!-- suggested doctors -->
                <x-card class="p-0 border-none shadow-sm overflow-hidden">
                    <div class="p-24 border-b border-slate-50">
                        <h3 class="text-small font-black text-muted uppercase tracking-widest">Recommended for You</h3>
                    </div>
                    <div class="divide-y divide-slate-50">
                        {{-- Mock suggestions for aesthetic --}}
                        <div class="p-16 flex items-center space-x-12 hover:bg-slate-50 transition-colors cursor-pointer">
                            <img src="https://i.pravatar.cc/100?u=1" class="w-10 h-10 rounded-full object-cover">
                            <div>
                                <p class="text-small font-black text-secondary">Dr. Sarah Johnson</p>
                                <p class="text-[10px] text-medical-teal font-bold uppercase">Cardiologist</p>
                            </div>
                        </div>
                        <div class="p-16 flex items-center space-x-12 hover:bg-slate-50 transition-colors cursor-pointer">
                            <img src="https://i.pravatar.cc/100?u=2" class="w-10 h-10 rounded-full object-cover">
                            <div>
                                <p class="text-small font-black text-secondary">Dr. Michael Chen</p>
                                <p class="text-[10px] text-medical-teal font-bold uppercase">Pediatrician</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-16 bg-slate-50/50">
                        <x-button variant="outline" class="w-full text-[10px] font-black uppercase">Browse All Doctors</x-button>
                    </div>
                </x-card>
            </div>

        </div>

    </div>
</x-app-layout>
