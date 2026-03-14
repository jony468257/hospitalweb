@extends('tyro-login::layouts.auth')

@php
    $profile = \App\Models\PortfolioProfile::first();
    // Use banner_image if available, otherwise fallback to avatar, then default
    $userBanner = $profile ? $profile->banner_image : null; 
    $finalBgImage = $backgroundImage;
    
    if ($userBanner) {
        if (filter_var($userBanner, FILTER_VALIDATE_URL)) {
            $finalBgImage = $userBanner;
        } else {
            $finalBgImage = asset('storage/' . $userBanner);
        }
    } elseif ($profile && $profile->avatar) {
         // Fallback to avatar if no banner
        $userAvatar = $profile->avatar;
        if (filter_var($userAvatar, FILTER_VALIDATE_URL)) {
             $finalBgImage = $userAvatar;
        } else {
             $finalBgImage = asset('storage/' . $userAvatar);
        }
    }
    
    $siteLogo = asset('build/assets/image/logo.png');
@endphp

@section('content')
<div class="auth-container {{ $layout }} giihan-theme" @if($layout==='fullscreen' ) style="background-image: url('{{ $finalBgImage }}');" @endif>
    @if(in_array($layout, ['split-left', 'split-right']))
    <div class="background-panel" style="background-image: url('{{ $finalBgImage }}');">
        <div class="background-panel-overlay"></div>
        <div class="background-panel-content">
            <!-- Text Removed -->
        </div>
    </div>
    @endif

    <div class="form-panel">
        <div class="form-card giihan-card">
            <!-- Logo -->
            <div class="logo-container">
                <a href="{{ url('/') }}">
                    <img src="{{ $siteLogo }}" alt="{{ $branding['app_name'] ?? config('app.name') }}" style="max-width: 150px; height: auto; margin-bottom: 2rem;">
                </a>
            </div>

            <!-- Header -->
            <div class="form-header giihan-header">
                <h2>Welcome back</h2>
                <p>Welcome back! Please enter your details.</p>
            </div>

            <!-- Login Form -->
            <form method="POST" action="{{ route('tyro-login.login.submit') }}">
                @csrf

                <!-- Login Field -->
                <div class="form-group giihan-group">
                    <label for="email" class="form-label giihan-label">Email</label>
                    <input type="email" id="email" name="email" class="form-input giihan-input @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email">
                    @error('email')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="form-group giihan-group">
                    <label for="password" class="form-label giihan-label">Password</label>
                    <input type="password" id="password" name="password" class="form-input giihan-input @error('password') is-invalid @enderror" required autocomplete="current-password" placeholder="••••••••">
                    @error('password')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="form-options giihan-options">
                    <div class="checkbox-group">
                        <input type="checkbox" id="remember" name="remember" class="checkbox-input giihan-checkbox" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember" class="checkbox-label">Remember for 30 days</label>
                    </div>

                    @if($features['forgot_password'] ?? true)
                    <a href="{{ route('tyro-login.password.request') }}" class="form-link giihan-link">Forgot password</a>
                    @endif
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary giihan-btn">
                    Sign in
                </button>
            </form>

            <!-- Social Login -->
            <div class="giihan-social">
                @include('tyro-login::partials.social-login', ['action' => 'login'])
            </div>

            <!-- Register Link -->
            @if($registrationEnabled ?? true)
            <div class="form-footer giihan-footer">
                <p>
                    Don't have an account?
                    <a href="{{ route('tyro-login.register') }}" class="form-link giihan-link">Sign up</a>
                </p>
            </div>
            @endif
        </div>
    </div>
</div>

<style>
    /* Giihan Theme Variables */
    :root {
        --giihan-primary: #111827;
        --giihan-accent: #7C3AED;
        --giihan-text-muted: #6B7280;
        --giihan-border: #E5E7EB;
        --giihan-bg-card: #FFFFFF;
    }

    .dark :root {
        --giihan-bg-card: #111827;
        --giihan-border: #374151;
        --giihan-text-muted: #9CA3AF;
    }

    /* Layout overrides */
    .giihan-theme.split-right {
        flex-direction: row-reverse;
    }

    .giihan-theme .background-panel {
        background-color: #F3F4F6;
        background-position: center;
        background-size: cover;
    }

    .giihan-theme .background-panel-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom, rgba(0,0,0,0) 0%, rgba(0,0,0,0.4) 100%);
        z-index: 1;
    }

    .giihan-theme .background-panel::before {
        display: none; /* remove default overlay */
    }

    .giihan-theme .background-panel-content {
        padding: 5rem;
        justify-content: flex-end;
        z-index: 2;
    }

    .giihan-theme .eyebrow {
        text-transform: uppercase;
        letter-spacing: 0.1em;
        font-size: 0.75rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: rgba(255,255,255,0.8);
    }

    .giihan-theme .background-panel-content h1 {
        font-size: 3.5rem;
        line-height: 1.1;
        margin-bottom: 1.5rem;
        font-weight: 800;
    }

    .giihan-theme .background-panel-content p {
        font-size: 1.25rem;
        max-width: 32rem;
        opacity: 0.9;
    }

    /* Form Panel overrides - Default/Split */
    .giihan-theme:not(.fullscreen) .form-panel {
        background-color: var(--giihan-bg-card);
        max-width: 45%;
    }

    /* Fullscreen Glassmorphism Overrides */
    .giihan-theme.fullscreen {
        justify-content: center;
        align-items: center;
    }

    .giihan-theme.fullscreen .form-panel {
        background-color: transparent !important;
        max-width: 100%;
        width: auto;
        box-shadow: none;
        padding: 0;
    }

    .giihan-theme.fullscreen .giihan-card {
        background: rgba(255, 255, 255, 0.25); /* More transparent for water effect */
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.4);
        border-top: 1px solid rgba(255, 255, 255, 0.6); /* Highlight top border */
        border-left: 1px solid rgba(255, 255, 255, 0.6); /* Highlight left border */
        border-radius: 1.5rem;
        padding: 3rem;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.2);
        width: 100%;
        max-width: 450px !important;
    }

    /* Dark Mode Glass */
    .dark .giihan-theme.fullscreen .giihan-card {
        background: rgba(17, 24, 39, 0.4);
        border-color: rgba(255, 255, 255, 0.1);
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.4);
    }

    .giihan-card {
        max-width: 400px !important;
    }

    .giihan-header {
        text-align: left;
        margin-bottom: 2rem;
    }

    .giihan-header h2 {
        font-size: 2.25rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .giihan-header p {
        color: var(--giihan-text-muted);
    }

    .giihan-group {
        margin-bottom: 1.5rem;
    }

    .giihan-label {
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .giihan-input {
        border-radius: 0.5rem;
        padding: 0.75rem 1rem;
        border: 1px solid var(--giihan-border);
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    }

    .giihan-input:focus {
        border-color: var(--giihan-accent);
        box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.1);
    }

    .giihan-options {
        margin-bottom: 2rem;
    }

    .giihan-checkbox {
        border-radius: 4px;
    }

    .giihan-checkbox:checked {
        background-color: var(--giihan-accent);
        border-color: var(--giihan-accent);
    }

    .giihan-link {
        font-weight: 600;
        color: var(--giihan-accent);
        text-decoration: none;
    }

    .giihan-btn {
        background-color: var(--giihan-primary);
        border-radius: 0.5rem;
        font-weight: 600;
        padding: 0.875rem;
        font-size: 1rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    .giihan-btn:hover {
        background-color: #1f2937;
    }

    .giihan-social {
        margin-top: 2rem;
    }

    .giihan-footer {
        margin-top: 2rem;
    }

    /* Responsive adjustments */
    @media (max-width: 1024px) {
        .giihan-theme .form-panel {
            max-width: 100%;
        }
        .giihan-theme .background-panel {
            display: none !important;
        }
        .giihan-card {
            max-width: 100% !important;
            padding: 1rem;
        }
    }

    /* Captcha Styling */
    .captcha-group {
        margin-bottom: 1.25rem;
    }

    .captcha-container {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .captcha-question {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.75rem 1rem;
        background-color: var(--muted);
        border: 1px solid var(--border);
        border-radius: 0.5rem;
        font-weight: 600;
        font-size: 1rem;
        color: var(--foreground);
        white-space: nowrap;
        min-width: 100px;
        text-align: center;
    }

    .captcha-input {
        flex: 1;
        text-align: center;
        font-weight: 500;
    }

    /* Hide number input spinners */
    .captcha-input::-webkit-outer-spin-button,
    .captcha-input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .captcha-input[type=number] {
        -moz-appearance: textfield;
    }
</style>
@endsection