@extends('tyro-dashboard::layouts.guest')

@section('content')
<style>
    :root {
        --fb-bg: linear-gradient(135deg, #f0f2f5 0%, #e7e9ed 100%);
        --fb-blue: #1877f2;
        --fb-green: #42b72a;
        --fb-card-shadow: 0 2px 4px rgba(0, 0, 0, .1), 0 8px 16px rgba(0, 0, 0, .1);
    }

    body {
        background: var(--fb-bg);
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        margin: 0;
    }

    .reg-container {
        width: 100%;
        max-width: 432px;
        padding: 20px;
    }

    .reg-card {
        background: #fff;
        border-radius: 8px;
        box-shadow: var(--fb-card-shadow);
        padding: 20px 20px 28px;
    }

    .reg-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .reg-title {
        font-size: 32px;
        font-weight: 700;
        color: var(--fb-blue);
        margin-bottom: 8px;
    }

    .reg-subtitle {
        font-size: 15px;
        color: #606770;
    }

    .form-group {
        margin-bottom: 12px;
    }

    .input-field {
        width: 100%;
        padding: 14px 16px;
        border: 1px solid #dddfe2;
        border-radius: 6px;
        font-size: 17px;
        box-sizing: border-box;
        transition: border-color 0.2s;
    }

    .input-field:focus {
        border-color: var(--fb-blue);
        outline: none;
        box-shadow: 0 0 0 2px #e7f3ff;
    }

    .role-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 8px;
        margin-bottom: 16px;
    }

    .role-option {
        border: 1px solid #dddfe2;
        border-radius: 6px;
        padding: 10px;
        text-align: center;
        cursor: pointer;
        transition: all 0.2s;
        font-size: 13px;
        font-weight: 500;
        color: #606770;
    }

    .role-option:hover {
        background: #f5f6f7;
    }

    .role-option.active {
        border-color: var(--fb-blue);
        background: #e7f3ff;
        color: var(--fb-blue);
    }

    .btn-submit {
        width: 100%;
        background: var(--fb-green);
        color: #fff;
        border: none;
        border-radius: 6px;
        padding: 12px;
        font-size: 20px;
        font-weight: 700;
        cursor: pointer;
        margin-top: 10px;
        transition: background 0.2s;
    }

    .btn-submit:hover {
        background: #36a420;
    }

    .divider {
        align-items: center;
        border-bottom: 1px solid #dadde1;
        display: flex;
        margin: 20px 0;
        text-align: center;
    }

    .footer-links {
        text-align: center;
        margin-top: 16px;
    }

    .footer-links a {
        color: var(--fb-blue);
        text-decoration: none;
        font-weight: 600;
    }

    .error-msg {
        color: #f02849;
        font-size: 12px;
        margin-top: 4px;
        display: block;
    }
</style>

<div class="reg-container">
    <div class="reg-card">
        <div class="reg-header">
            <h1 class="reg-title">Create Account</h1>
            <p class="reg-subtitle">It's quick and easy.</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <input type="text" name="name" class="input-field" placeholder="Full name" value="{{ old('name') }}" required autofocus>
                @if($errors->has('name')) <span class="error-msg">{{ $errors->first('name') }}</span> @endif
            </div>

            <div class="form-group">
                <input type="email" name="email" class="input-field" placeholder="Email address" value="{{ old('email') }}" required>
                @if($errors->has('email')) <span class="error-msg">{{ $errors->first('email') }}</span> @endif
            </div>

            <div class="form-group">
                <input type="text" name="phone" class="input-field" placeholder="Mobile number" value="{{ old('phone') }}" required>
                @if($errors->has('phone')) <span class="error-msg">{{ $errors->first('phone') }}</span> @endif
            </div>

            <p style="font-size: 14px; color: #606770; margin: 8px 0;">Select your role:</p>
            <div class="role-grid" id="roleSelector">
                <div class="role-option @if(old('role', 'patient') == 'patient') active @endif" data-role="patient">Patient</div>
                <div class="role-option @if(old('role') == 'hospital_owner') active @endif" data-role="hospital_owner">Hospital</div>
                <div class="role-option @if(old('role') == 'pharmacy_owner') active @endif" data-role="pharmacy_owner">Pharmacy</div>
            </div>
            <input type="hidden" name="role" id="roleInput" value="{{ old('role', 'patient') }}">

            <div class="form-group">
                <input type="password" name="password" class="input-field" placeholder="New password" required>
                @if($errors->has('password')) <span class="error-msg">{{ $errors->first('password') }}</span> @endif
            </div>

            <div class="form-group">
                <input type="password" name="password_confirmation" class="input-field" placeholder="Confirm password" required>
            </div>

            <button type="submit" class="btn-submit">Sign Up</button>
        </form>

        <div class="divider"></div>

        <div class="footer-links">
            <a href="{{ route('login') }}">Already have an account?</a>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.role-option').forEach(option => {
        option.addEventListener('click', function() {
            document.querySelectorAll('.role-option').forEach(opt => opt.classList.remove('active'));
            this.classList.add('active');
            document.getElementById('roleInput').value = this.dataset.role;
        });
    });
</script>
@endsection
