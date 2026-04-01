<x-auth-layout>
<div class="w-full max-w-4xl mx-auto grid grid-cols-1 lg:grid-cols-2 rounded-2xl overflow-hidden shadow-[0_0_80px_rgba(0,0,0,0.6)] border border-white/5">

    {{-- LEFT: Welcome Panel (same as login) --}}
    <div class="hidden lg:flex flex-col justify-between bg-[#0d1117] p-12 border-r border-white/5">
        <div>
            <a href="/" class="inline-flex items-center gap-2 mb-10">
                <div class="w-8 h-8 rounded-lg bg-green-500 flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <span class="text-lg font-black text-white tracking-tight">Medi<span class="text-green-400">Connect</span></span>
            </a>

            <h2 class="text-3xl font-extrabold text-white leading-snug mb-4">Create your account</h2>
            <p class="text-sm text-gray-400 leading-relaxed mb-8">
                Join Bangladesh's most trusted healthcare platform. Whether you are a patient, doctor, hospital or pharmacy — your journey starts here.
            </p>

            <ul class="space-y-3">
                @foreach(['Hospital & Doctor Discovery', 'Appointment Booking', 'Digital Medical Records', 'Medicine & Pharmacy Access', 'Real-time Health Monitoring', 'Secure Encrypted Platform'] as $feature)
                <li class="flex items-center gap-3">
                    <svg class="w-4 h-4 text-green-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    <span class="text-sm text-gray-300">{{ $feature }}</span>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="pt-8 border-t border-white/5">
            <p class="text-xs text-gray-600">Trusted by 500+ medical institutions across Bangladesh.</p>
        </div>
    </div>

    {{-- RIGHT: Register Form --}}
    <div class="bg-[#161b22] p-10 sm:p-12 flex flex-col justify-center">

        {{-- Mobile Logo --}}
        <div class="lg:hidden mb-8 flex items-center gap-2">
            <div class="w-7 h-7 rounded-lg bg-green-500 flex items-center justify-center">
                <svg class="w-3.5 h-3.5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <a href="/" class="text-lg font-black text-white">Medi<span class="text-green-400">Connect</span></a>
        </div>

        <h1 class="text-2xl font-black text-white mb-1">Create Account</h1>
        <p class="text-xs text-gray-500 mb-6">Fill in your details to get started</p>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            {{-- Role Selector --}}
            <div>
                <label class="block text-xs font-semibold text-gray-400 mb-2">Select Your Role</label>
                <div class="grid grid-cols-4 gap-2" id="roleSelector">
                    @php
                        $roles = [
                            ['id' => 'patient',        'label' => 'Patient',  'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'],
                            ['id' => 'hospital_owner', 'label' => 'Hospital', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
                            ['id' => 'pharmacy_owner', 'label' => 'Pharmacy', 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
                            ['id' => 'doctor',         'label' => 'Doctor',   'icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z'],
                        ];
                    @endphp
                    @foreach($roles as $role)
                        <button type="button" data-role="{{ $role['id'] }}"
                            class="role-btn flex flex-col items-center gap-1.5 py-2.5 rounded-lg border transition-all duration-150
                                {{ old('role', 'patient') === $role['id']
                                    ? 'border-green-500 bg-green-500/10 text-white'
                                    : 'border-green-500/20 bg-[#0d1117] text-gray-500 hover:border-green-500/50' }}">
                            <svg class="w-4 h-4 {{ old('role', 'patient') === $role['id'] ? 'text-green-400' : 'text-gray-600' }}"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $role['icon'] }}"/>
                            </svg>
                            <span class="text-[9px] font-bold uppercase tracking-wide">{{ $role['label'] }}</span>
                        </button>
                    @endforeach
                </div>
                <input type="hidden" name="role" id="roleInput" value="{{ old('role', 'patient') }}">
            </div>

            {{-- Name + Email --}}
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label for="name" class="block text-xs font-semibold text-gray-400 mb-1.5">Full Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="John Doe"
                        required autofocus
                        class="w-full bg-[#0d1117] border border-green-500/50 hover:border-green-500 focus:border-green-400 text-white placeholder-gray-600 rounded-lg px-4 py-3 text-sm outline-none transition-colors">
                    <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs text-red-400" />
                </div>
                <div>
                    <label for="email" class="block text-xs font-semibold text-gray-400 mb-1.5">Email Address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="john@example.com"
                        required
                        class="w-full bg-[#0d1117] border border-green-500/50 hover:border-green-500 focus:border-green-400 text-white placeholder-gray-600 rounded-lg px-4 py-3 text-sm outline-none transition-colors">
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-400" />
                </div>
            </div>

            {{-- Phone --}}
            <div>
                <label for="phone" class="block text-xs font-semibold text-gray-400 mb-1.5">Phone Number</label>
                <input id="phone" type="text" name="phone" value="{{ old('phone') }}" placeholder="017XXXXXXXX"
                    required
                    class="w-full bg-[#0d1117] border border-green-500/50 hover:border-green-500 focus:border-green-400 text-white placeholder-gray-600 rounded-lg px-4 py-3 text-sm outline-none transition-colors">
                <x-input-error :messages="$errors->get('phone')" class="mt-1 text-xs text-red-400" />
            </div>

            {{-- Password + Confirm --}}
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label for="password" class="block text-xs font-semibold text-gray-400 mb-1.5">Password</label>
                    <input id="password" type="password" name="password" placeholder="••••••••"
                        required autocomplete="new-password"
                        class="w-full bg-[#0d1117] border border-green-500/50 hover:border-green-500 focus:border-green-400 text-white placeholder-gray-600 rounded-lg px-4 py-3 text-sm outline-none transition-colors">
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-red-400" />
                </div>
                <div>
                    <label for="password_confirmation" class="block text-xs font-semibold text-gray-400 mb-1.5">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="••••••••"
                        required autocomplete="new-password"
                        class="w-full bg-[#0d1117] border border-green-500/50 hover:border-green-500 focus:border-green-400 text-white placeholder-gray-600 rounded-lg px-4 py-3 text-sm outline-none transition-colors">
                </div>
            </div>

            {{-- Submit --}}
            <button type="submit"
                class="group w-full flex items-center justify-center gap-2 bg-rose-500 hover:bg-rose-600 active:bg-rose-700 text-white font-bold py-3 rounded-lg text-sm transition-all duration-150 hover:shadow-[0_4px_20px_rgba(244,63,94,0.4)] mt-1">
                Create Account
                <svg class="w-4 h-4 group-hover:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </button>

            <p class="text-center text-xs text-gray-600 pt-1">
                Already have an account?
                <a href="{{ route('login') }}" class="text-green-400 hover:text-green-300 font-semibold ml-1 transition-colors">Sign in</a>
            </p>
        </form>
    </div>

</div>

<script>
    const roleBtns = document.querySelectorAll('.role-btn');
    const roleInput = document.getElementById('roleInput');

    roleBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Reset all
            roleBtns.forEach(b => {
                b.classList.remove('border-green-500', 'bg-green-500/10', 'text-white');
                b.classList.add('border-green-500/20', 'bg-[#0d1117]', 'text-gray-500');
                b.querySelector('svg').classList.remove('text-green-400');
                b.querySelector('svg').classList.add('text-gray-600');
            });
            // Set active
            btn.classList.remove('border-green-500/20', 'bg-[#0d1117]', 'text-gray-500');
            btn.classList.add('border-green-500', 'bg-green-500/10', 'text-white');
            btn.querySelector('svg').classList.remove('text-gray-600');
            btn.querySelector('svg').classList.add('text-green-400');
            roleInput.value = btn.dataset.role;
        });
    });
</script>
</x-auth-layout>
