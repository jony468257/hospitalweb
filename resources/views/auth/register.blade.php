<x-guest-layout>
    <div class="min-h-[80vh] flex items-center justify-center p-16 sm:p-32">
        <div class="max-w-6xl w-full grid grid-cols-1 lg:grid-cols-2 gap-0 overflow-hidden rounded-[24px] shadow-2xl border border-slate-100 bg-white">
            
            <!-- Branding/Image Side -->
            <div class="hidden lg:flex relative flex-col justify-end p-48 bg-slate-900 border-r border-white/5">
                <div class="absolute inset-0 opacity-40">
                    <img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?auto=format&fit=crop&q=80&w=1200" alt="Medical Science" class="w-full h-full object-cover">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/40 to-transparent"></div>
                
                <div class="relative z-10">
                    <h2 class="text-[40px] font-black text-white leading-tight mb-16 italic font-serif">Join the <span class="text-medical-teal">Future</span> of <span class="text-sky-400">Healthcare</span> Delivery.</h2>
                    <p class="text-h2 text-white/70 font-medium mb-32 max-w-sm">Create an account to start your journey with Bangladesh's most advanced medical portal.</p>
                    
                    <div class="space-y-16">
                        <div class="flex items-center text-white/80 text-small font-bold">
                            <div class="w-8 h-8 bg-medical-green rounded-full flex items-center justify-center mr-12"><svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
                            Verified Medical Network
                        </div>
                        <div class="flex items-center text-white/80 text-small font-bold">
                            <div class="w-8 h-8 bg-medical-green rounded-full flex items-center justify-center mr-12"><svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
                            24/7 Support & Scheduling
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Side -->
            <div class="p-32 sm:p-48 flex flex-col justify-center">
                <div class="mb-32">
                    <h1 class="text-h1 text-secondary mb-4">Create <span class="text-primary font-black italic tracking-tighter">Account</span></h1>
                    <p class="text-body text-muted font-medium">It's quick, easy, and secure.</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-16">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
                        <!-- Full Name -->
                        <div class="space-y-6">
                            <label for="name" class="text-[10px] font-extrabold text-secondary uppercase tracking-widest">Full Name</label>
                            <x-input id="name" type="text" name="name" :value="old('name')" placeholder="John Doe" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-1" />
                        </div>

                        <!-- Email -->
                        <div class="space-y-6">
                            <label for="email" class="text-[10px] font-extrabold text-secondary uppercase tracking-widest">Email</label>
                            <x-input id="email" type="email" name="email" :value="old('email')" placeholder="john@example.com" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-1" />
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="space-y-6">
                        <label for="phone" class="text-[10px] font-extrabold text-secondary uppercase tracking-widest">Phone Number</label>
                        <x-input id="phone" type="text" name="phone" :value="old('phone')" placeholder="017XXXXXXXX" required />
                        <x-input-error :messages="$errors->get('phone')" class="mt-1" />
                    </div>

                    <!-- Role Selector -->
                    <div class="space-y-8">
                        <label class="text-[10px] font-extrabold text-secondary uppercase tracking-widest">Register As</label>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-8" id="roleSelector">
                            @php
                                $roles = [
                                    ['id' => 'patient', 'label' => 'Patient'],
                                    ['id' => 'hospital_owner', 'label' => 'Hospital'],
                                    ['id' => 'pharmacy_owner', 'label' => 'Pharmacy'],
                                    ['id' => 'doctor', 'label' => 'Doctor'],
                                ];
                            @endphp
                            @foreach($roles as $role)
                                <div 
                                    data-role="{{ $role['id'] }}"
                                    class="role-option group cursor-pointer p-12 rounded-card border-2 transition-all text-center
                                    {{ old('role', 'patient') == $role['id'] ? 'border-primary bg-primary/5 text-primary' : 'border-slate-100 bg-slate-50 text-muted hover:border-slate-200' }}"
                                >
                                    <span class="text-[11px] font-black uppercase tracking-tighter">{{ $role['label'] }}</span>
                                </div>
                            @endforeach
                        </div>
                        <input type="hidden" name="role" id="roleInput" value="{{ old('role', 'patient') }}">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
                        <!-- Password -->
                        <div class="space-y-6">
                            <label for="password" class="text-[10px] font-extrabold text-secondary uppercase tracking-widest">Password</label>
                            <x-input id="password" type="password" name="password" placeholder="••••••••" required />
                            <x-input-error :messages="$errors->get('password')" class="mt-1" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="space-y-6">
                            <label for="password_confirmation" class="text-[10px] font-extrabold text-secondary uppercase tracking-widest">Confirm</label>
                            <x-input id="password_confirmation" type="password" name="password_confirmation" placeholder="••••••••" required />
                        </div>
                    </div>

                    <div class="pt-16">
                        <x-button variant="primary" class="w-full font-black py-16 text-h2 shadow-xl shadow-primary/20">Create My Account</x-button>
                    </div>

                    <p class="text-center text-small font-bold text-muted mt-24">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="text-primary hover:underline decoration-2 underline-offset-4">Log in here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.role-option').forEach(option => {
            option.addEventListener('click', function() {
                document.querySelectorAll('.role-option').forEach(opt => {
                    opt.classList.remove('border-primary', 'bg-primary/5', 'text-primary');
                    opt.classList.add('border-slate-100', 'bg-slate-50', 'text-muted');
                });
                this.classList.remove('border-slate-100', 'bg-slate-50', 'text-muted');
                this.classList.add('border-primary', 'bg-primary/5', 'text-primary');
                document.getElementById('roleInput').value = this.dataset.role;
            });
        });
    </script>
</x-guest-layout>
