<x-auth-layout>
    <div class="w-full max-w-4xl mx-auto grid grid-cols-1 lg:grid-cols-2 rounded-2xl overflow-hidden shadow-[0_0_80px_rgba(0,0,0,0.6)] border border-white/5">

        {{-- LEFT: Welcome Panel --}}
        <div class="hidden lg:flex flex-col justify-between bg-[#0d1117] p-12 border-r border-white/5">
            <div>
                <a href="/" class="inline-flex items-center gap-2 mb-10">
                    <div class="w-8 h-8 rounded-lg bg-green-500 flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="text-lg font-black text-white tracking-tight">Medi<span class="text-green-400">Connect</span></span>
                </a>

                <h2 class="text-3xl font-extrabold text-white leading-snug mb-4">Welcome back</h2>
                <p class="text-sm text-gray-400 leading-relaxed mb-8">
                    MediConnect is a comprehensive digital solution designed to enhance healthcare delivery efficiency in Bangladesh. It empowers patients, doctors, and hospitals to connect through real-time data and smart management tools.
                </p>

                <ul class="space-y-3">
                    @foreach(['Hospital & Doctor Discovery', 'Appointment Booking', 'Digital Medical Records', 'Medicine & Pharmacy Access', 'Real-time Health Monitoring', 'Secure Encrypted Platform'] as $feature)
                    <li class="flex items-center gap-3">
                        <svg class="w-4 h-4 text-green-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-sm text-gray-300">{{ $feature }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="pt-8 border-t border-white/5">
                <p class="text-xs text-gray-600">Trusted by 500+ medical institutions across Bangladesh.</p>
            </div>
        </div>

        {{-- RIGHT: Login Form --}}
        <div class="bg-[#161b22] p-10 sm:p-12 flex flex-col justify-center">

            {{-- Mobile Logo --}}
            <div class="lg:hidden mb-8 flex items-center gap-2">
                <div class="w-7 h-7 rounded-lg bg-green-500 flex items-center justify-center">
                    <svg class="w-3.5 h-3.5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <a href="/" class="text-lg font-black text-white">Medi<span class="text-green-400">Connect</span></a>
            </div>

            <h1 class="text-2xl font-black text-white mb-1">Sign In</h1>
            <p class="text-xs text-gray-500 mb-8">Enter your credentials to access your portal</p>

            <x-auth-session-status class="mb-4 text-xs text-green-400" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-xs font-semibold text-gray-400 mb-1.5">Email Address</label>
                    <div class="relative">
                        <input id="email" type="email" name="email" value="{{ old('email') }}"
                            placeholder="Enter your email" required autofocus autocomplete="username"
                            class="w-full bg-[#0d1117] border border-green-500/50 hover:border-green-500 focus:border-green-400 text-white placeholder-gray-600 rounded-lg pl-10 pr-4 py-3 text-sm outline-none transition-colors">
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-400" />
                </div>

                {{-- Password --}}
                <div>
                    <div class="flex justify-between items-center mb-1.5">
                        <label for="password" class="text-xs font-semibold text-gray-400">Password</label>
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-xs text-green-400 hover:text-green-300 transition-colors">Forgot password?</a>
                        @endif
                    </div>
                    <div class="relative">
                    
                        <input id="password" type="password" name="password"
                            placeholder="Enter your password" required autocomplete="current-password"
                            class="w-full bg-[#0d1117] border border-green-500/50 hover:border-green-500 focus:border-green-400 text-white placeholder-gray-600 rounded-lg pl-10 pr-4 py-3 text-sm outline-none transition-colors">
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-red-400" />
                </div>

                {{-- Remember Me --}}
                <label class="flex items-center gap-2.5 cursor-pointer select-none">
                    <input type="checkbox" name="remember" id="remember_me"
                        class="w-4 h-4 rounded border-green-500/50 bg-[#0d1117] text-green-500 focus:ring-green-500/20 focus:ring-offset-0 cursor-pointer">
                    <span class="text-xs text-gray-400">Keep me signed in</span>
                </label>

                {{-- Submit --}}
                <button type="submit"
                    class="group w-full flex items-center justify-center gap-2 bg-rose-500 hover:bg-rose-600 active:bg-rose-700 text-white font-bold py-3 rounded-lg text-sm transition-all duration-150 hover:shadow-[0_4px_20px_rgba(244,63,94,0.4)] mt-2">
                    Sign in
                    <svg class="w-4 h-4 group-hover:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>

                {{-- Download App (optional nice touch like reference) --}}
                <a href="#" class="flex items-center justify-center gap-2 w-full border border-white/10 hover:border-white/20 text-gray-400 hover:text-white py-2.5 rounded-lg text-xs font-medium transition-all">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.523 15.341l-4.053-4.053 4.053-4.053-1.414-1.414-4.053 4.053-4.053-4.053-1.414 1.414 4.053 4.053-4.053 4.053 1.414 1.414 4.053-4.053 4.053 4.053z" />
                        <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm0 18c-4.418 0-8-3.582-8-8s3.582-8 8-8 8 3.582 8 8-3.582 8-8 8z" />
                    </svg>
                    No account yet? <span class="text-green-400 font-semibold">Create one →</span>
                </a>

                <p class="text-center text-xs text-gray-600 pt-1">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-green-400 hover:text-green-300 font-semibold ml-1 transition-colors">Register here</a>
                </p>
            </form>
        </div>

    </div>
</x-auth-layout>