<x-guest-layout>
    <div class="min-h-[80vh] flex items-center justify-center p-16 sm:p-32">
        <div class="max-w-6xl w-full grid grid-cols-1 lg:grid-cols-2 gap-0 overflow-hidden rounded-[24px] shadow-2xl border border-slate-100 bg-white">
            
            <!-- Branding/Image Side -->
            <div class="hidden lg:flex relative flex-col justify-end p-48 bg-slate-900 border-r border-white/5">
                <div class="absolute inset-0 opacity-40">
                    <img src="https://images.unsplash.com/photo-1576091160550-217359f42f8c?auto=format&fit=crop&q=80&w=1200" alt="Medical Lab" class="w-full h-full object-cover">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/40 to-transparent"></div>
                
                <div class="relative z-10">
                    <h2 class="text-[40px] font-black text-white leading-tight mb-16 italic font-serif">Providing <span class="text-sky-400">Trust</span> & <span class="text-medical-teal font-extrabold">Professional</span> Care.</h2>
                    <p class="text-h2 text-white/70 font-medium mb-32 max-w-sm">Join the 25k+ citizens managing their health better with MediConnect.</p>
                    
                    <div class="flex items-center space-x-12 pt-32 border-t border-white/10">
                        <div class="flex -space-x-12">
                            <img src="https://i.pravatar.cc/100?u=1" class="w-12 h-12 rounded-full border-2 border-slate-900 shadow-sm">
                            <img src="https://i.pravatar.cc/100?u=2" class="w-12 h-12 rounded-full border-2 border-slate-900 shadow-sm">
                            <img src="https://i.pravatar.cc/100?u=3" class="w-12 h-12 rounded-full border-2 border-slate-900 shadow-sm">
                        </div>
                        <span class="text-small font-bold text-white/50 uppercase tracking-widest">Trusted Healthcare Network</span>
                    </div>
                </div>
            </div>

            <!-- Form Side -->
            <div class="p-32 sm:p-64 flex flex-col justify-center">
                <div class="mb-40">
                    <h1 class="text-h1 text-secondary mb-8">Welcome <span class="text-primary font-black italic tracking-tighter">Back</span></h1>
                    <p class="text-body text-muted">Log in to access your consultations and health records.</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-24" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-24">
                    @csrf

                    <!-- Email Address -->
                    <div class="space-y-8">
                        <label for="email" class="text-small font-extrabold text-secondary uppercase tracking-widest">Email Address</label>
                        <x-input id="email" type="email" name="email" :value="old('email')" placeholder="doctor@mediconnect.com" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="space-y-8">
                        <div class="flex justify-between">
                            <label for="password" class="text-small font-extrabold text-secondary uppercase tracking-widest">Password</label>
                            @if (Route::has('password.request'))
                                <a class="text-small font-bold text-primary hover:text-primary/80 transition-colors" href="{{ route('password.request') }}">
                                    Forgot?
                                </a>
                            @endif
                        </div>
                        <x-input id="password" type="password" name="password" placeholder="••••••••" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <label for="remember_me" class="flex items-center group cursor-pointer">
                        <input id="remember_me" type="checkbox" class="w-4 h-4 rounded border-slate-300 text-primary shadow-sm focus:ring-primary/20 focus:ring-offset-w-0" name="remember">
                        <span class="ms-12 text-small font-bold text-muted group-hover:text-secondary transition-colors">{{ __('Stay logged in') }}</span>
                    </label>

                    <div class="pt-16">
                        <x-button variant="primary" class="w-full font-black py-16 text-h2 shadow-xl shadow-primary/20">Sign In Securely</x-button>
                    </div>

                    <p class="text-center text-small font-bold text-muted mt-32">
                        Don't have an account? 
                        <a href="{{ route('register') }}" class="text-primary hover:underline decoration-2 underline-offset-4">Create one for free</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
