@props(['active' => 'dashboard'])

<aside class="flex flex-col w-64 h-screen px-16 py-32 bg-white border-r border-slate-100 sticky top-0 overflow-y-auto">
    <!-- Logo -->
    <a href="{{ url('/') }}" class="flex items-center space-x-12 px-16 mb-40 group">
        <div class="bg-primary p-8 rounded-card group-hover:rotate-12 transition-transform duration-300">
            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
            </svg>
        </div>
        <span class="text-h2 text-primary tracking-tight font-bold">MediConnect</span>
    </a>

    <!-- Nav Links -->
    <nav class="flex-1 space-y-8">
        <div class="space-y-4">
            <h3 class="px-16 text-small font-bold text-muted uppercase tracking-wider">Main Menu</h3>
            
            <a href="{{ route('dashboard') }}" 
               class="flex items-center px-16 py-12 text-body font-medium transition-all duration-200 rounded-card {{ $active === 'dashboard' ? 'bg-primary/5 text-primary border-r-4 border-primary' : 'text-secondary hover:bg-slate-50 hover:text-primary' }}">
                <svg class="w-6 h-6 mr-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Dashboard
            </a>

            @if(Auth::user()->role === 'admin')
                <a href="#" class="flex items-center px-16 py-12 text-body font-medium text-secondary hover:bg-slate-50 hover:text-primary transition-all duration-200 rounded-card">
                    <svg class="w-6 h-6 mr-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    Hospitals
                </a>
                <a href="#" class="flex items-center px-16 py-12 text-body font-medium text-secondary hover:bg-slate-50 hover:text-primary transition-all duration-200 rounded-card">
                    <svg class="w-6 h-6 mr-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Doctors
                </a>
                <a href="#" class="flex items-center px-16 py-12 text-body font-medium text-secondary hover:bg-slate-50 hover:text-primary transition-all duration-200 rounded-card">
                    <svg class="w-6 h-6 mr-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    Medicines
                </a>
            @endif

            @if(Auth::user()->role === 'pharmacy_owner')
                <a href="#" class="flex items-center px-16 py-12 text-body font-medium text-secondary hover:bg-slate-50 hover:text-primary transition-all duration-200 rounded-card">
                    <svg class="w-6 h-6 mr-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    My Inventory
                </a>
                <a href="#" class="flex items-center px-16 py-12 text-body font-medium text-secondary hover:bg-slate-50 hover:text-primary transition-all duration-200 rounded-card">
                    <svg class="w-6 h-6 mr-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                    Sales & Orders
                </a>
            @endif

            @if(Auth::user()->role === 'patient')
                <a href="#" class="flex items-center px-16 py-12 text-body font-medium text-secondary hover:bg-slate-50 hover:text-primary transition-all duration-200 rounded-card">
                    <svg class="w-6 h-6 mr-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Appointments
                </a>
                <a href="#" class="flex items-center px-16 py-12 text-body font-medium text-secondary hover:bg-slate-50 hover:text-primary transition-all duration-200 rounded-card">
                    <svg class="w-6 h-6 mr-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    Order History
                </a>
            @endif
        </div>

        <div class="space-y-4 pt-16">
            <h3 class="px-16 text-small font-bold text-muted uppercase tracking-wider">Account</h3>
            <a href="{{ route('profile.edit') }}" class="flex items-center px-16 py-12 text-body font-medium text-secondary hover:bg-slate-50 hover:text-primary transition-all duration-200 rounded-card">
                <svg class="w-6 h-6 mr-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                My Profile
            </a>
            
            <form method="POST" action="{{ route('logout') }}" class="mt-auto">
                @csrf
                <button type="submit" class="flex items-center w-full px-16 py-12 text-body font-medium text-medical-red hover:bg-medical-red/5 transition-all duration-200 rounded-card">
                    <svg class="w-6 h-6 mr-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </nav>
</aside>
