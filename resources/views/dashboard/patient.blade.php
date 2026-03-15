@extends('tyro-dashboard::layouts.user')

@section('title', 'Patient Dashboard')

@section('content')
<style>
    :root {
        --fb-blue: #1877f2;
        --fb-gray: #f0f2f5;
        --card-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        --accent: #1877f2;
    }

    .dashboard-layout {
        display: grid;
        grid-template-columns: 280px 1fr 320px;
        gap: 20px;
        align-items: start;
    }

    @media (max-width: 1200px) {
        .dashboard-layout {
            grid-template-columns: 1fr 320px;
        }
        .left-col { display: none; }
    }

    @media (max-width: 900px) {
        .dashboard-layout {
            grid-template-columns: 1fr;
        }
        .right-col { display: none; }
    }

    /* Column Styles */
    .left-col, .right-col {
        position: sticky;
        top: 20px;
    }

    /* Cards & Components */
    .fb-card {
        background: #fff;
        border-radius: 8px;
        box-shadow: var(--card-shadow);
        margin-bottom: 20px;
        border: 1px solid rgba(0,0,0,0.05); overflow: hidden;
    }

    .fb-card-header {
        padding: 12px 16px;
        border-bottom: 1px solid #f0f2f5;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .fb-card-title {
        font-size: 17px;
        font-weight: 600;
        color: #65676b;
    }

    .fb-card-body {
        padding: 16px;
    }

    /* Profile Widget */
    .profile-widget {
        text-align: center;
        padding: 20px;
    }

    .profile-avatar {
        width: 80px;
        height: 80px;
        background: linear-gradient(45deg, var(--fb-blue), #5ebfff);
        border-radius: 50%;
        margin: 0 auto 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        color: #fff;
        font-weight: 700;
        box-shadow: 0 4px 12px rgba(24, 119, 242, 0.2);
    }

    /* Feed Items */
    .feed-item {
        padding: 12px;
        border-radius: 8px;
        transition: background 0.2s;
        display: flex;
        gap: 12px;
        margin-bottom: 8px;
    }

    .feed-item:hover {
        background: var(--fb-gray);
    }

    .feed-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #e7f3ff;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--fb-blue);
        flex-shrink: 0;
    }

    .feed-content {
        flex: 1;
    }

    .feed-title {
        font-weight: 600;
        font-size: 15px;
        margin-bottom: 2px;
    }

    .feed-meta {
        font-size: 13px;
        color: #65676b;
    }

    /* Stats Grid */
    .mini-stats {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }

    .mini-stat-card {
        background: #f0f2f5;
        padding: 12px;
        border-radius: 8px;
        text-align: center;
    }

    .mini-stat-val {
        font-size: 20px;
        font-weight: 700;
        color: var(--fb-blue);
    }

    .mini-stat-label {
        font-size: 12px;
        color: #65676b;
    }

    /* Animations */
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .status-pulse {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        animation: pulse 2s infinite;
    }
</style>

<div class="dashboard-layout">
    {{-- Left Column: Navigation & Profile --}}
    <div class="left-col">
        <div class="fb-card">
            <div class="profile-widget">
                <div class="profile-avatar">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <h2 style="margin: 0; font-size: 20px;">{{ $user->name }}</h2>
                <p style="color: #65676b; font-size: 14px; margin: 4px 0 16px;">Member since {{ $user->created_at->format('M Y') }}</p>
                
                <div class="mini-stats">
                    <div class="mini-stat-card">
                        <div class="mini-stat-val">{{ $stats['my_consultations'] }}</div>
                        <div class="mini-stat-label">Bookings</div>
                    </div>
                    <div class="mini-stat-card">
                        <div class="mini-stat-val">{{ $stats['bookmarks'] }}</div>
                        <div class="mini-stat-label">Saved</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="fb-card">
            <div class="fb-card-header">
                <span class="fb-card-title">Quick Links</span>
            </div>
            <div class="fb-card-body" style="padding: 8px;">
                <a href="{{ route('patient.consultations.index') }}" class="feed-item" style="text-decoration: none; color: inherit;">
                    <div class="feed-icon"><svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg></div>
                    <div class="feed-content">
                        <div class="feed-title">My Bookings</div>
                    </div>
                </a>
                <a href="{{ route('patient.bookmarks.index') }}" class="feed-item" style="text-decoration: none; color: inherit;">
                    <div class="feed-icon" style="background: #fff0f0; color: #ff5a5f;"><svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg></div>
                    <div class="feed-content">
                        <div class="feed-title">Bookmarks</div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    {{-- Center Column: Main Feed --}}
    <div class="center-col">
        {{-- Booking Search Prompt --}}
        <div class="fb-card">
            <div class="fb-card-body">
                <div style="display: flex; gap: 12px; align-items: center;">
                    <div class="profile-avatar" style="width: 40px; height: 40px; font-size: 16px; margin: 0;">{{ substr($user->name, 0, 1) }}</div>
                    <div style="flex: 1; background: #f0f2f5; border-radius: 20px; padding: 10px 16px; color: #65676b; cursor: pointer;">
                        Find a doctor or hospital...
                    </div>
                </div>
                <div style="display: flex; justify-content: space-around; margin-top: 12px; border-top: 1px solid #f0f2f5; padding-top: 12px;">
                    <div style="display: flex; align-items: center; gap: 8px; color: #65676b; font-weight: 600; font-size: 14px;">
                        <span style="color: #f3425f;">🏥</span> Hospital
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px; color: #65676b; font-weight: 600; font-size: 14px;">
                        <span style="color: #45bd62;">👨‍⚕️</span> Doctor
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px; color: #65676b; font-weight: 600; font-size: 14px;">
                        <span style="color: #f7b928;">💊</span> Pharmacy
                    </div>
                </div>
            </div>
        </div>

        {{-- Consultation Feed --}}
        <div class="fb-card">
            <div class="fb-card-header">
                <span class="fb-card-title">Recent Activity</span>
            </div>
            <div class="fb-card-body">
                @forelse($stats['recent_consults'] as $c)
                <div class="feed-item" style="border-bottom: 1px solid #f0f2f5; padding: 16px 0;">
                    <div class="profile-avatar" style="width: 48px; height: 48px; font-size: 18px; margin: 0; background: #e7f3ff; color: var(--fb-blue);">
                        {{ strtoupper(substr($c->doctor->name ?? 'D', 0, 1)) }}
                    </div>
                    <div class="feed-content">
                        <div style="display: flex; justify-content: space-between;">
                            <div class="feed-title">Consultation with {{ $c->doctor->name ?? 'Doctor' }}</div>
                            <div class="status-badge" style="background: {{ $c->status === 'approved' ? '#e7f3ff' : '#fff9e6' }}; color: {{ $c->status === 'approved' ? '#1877f2' : '#f7b928' }};">
                                <div class="status-pulse" style="background: currentColor;"></div>
                                {{ ucfirst($c->status) }}
                            </div>
                        </div>
                        <div class="feed-meta">{{ $c->doctor->specialization ?? 'Specialist' }}</div>
                        <div class="feed-meta" style="margin-top: 8px; display: flex; align-items: center; gap: 4px;">
                            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ \Carbon\Carbon::parse($c->consult_date)->format('M d, Y at h:i A') }}
                        </div>
                    </div>
                </div>
                @empty
                <div style="text-align: center; padding: 40px 20px;">
                    <div style="font-size: 48px; margin-bottom: 12px;">🏥</div>
                    <div style="font-weight: 600; color: #65676b;">No recent activity</div>
                    <p style="color: #65676b; font-size: 14px;">Your medical consultations will appear here.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Right Column: Widgets --}}
    <div class="right-col">
        <div class="fb-card">
            <div class="fb-card-header">
                <span class="fb-card-title">Upcoming Appointments</span>
            </div>
            <div class="fb-card-body">
                @php $pending = $stats['recent_consults']->where('status', 'pending')->first(); @endphp
                @if($pending)
                <div style="background: #fff9e6; border-radius: 8px; padding: 12px; border-left: 4px solid #f7b928;">
                    <div style="font-weight: 600; font-size: 14px; color: #856404;">Pending Confirmation</div>
                    <div style="font-size: 13px; margin-top: 4px;">{{ $pending->doctor->name }}</div>
                    <div style="font-size: 12px; color: #856404; margin-top: 2px;">{{ \Carbon\Carbon::parse($pending->consult_date)->diffForHumans() }}</div>
                </div>
                @else
                <p style="color: #65676b; font-size: 14px; text-align: center; margin: 0;">No upcoming appointments</p>
                @endif
            </div>
        </div>

        <div class="fb-card">
            <div class="fb-card-header">
                <span class="fb-card-title">Suggested Doctors</span>
            </div>
            <div class="fb-card-body" style="padding: 8px;">
                {{-- Example static suggestions --}}
                <div class="feed-item">
                    <div class="profile-avatar" style="width: 36px; height: 36px; font-size: 14px; margin: 0;">A</div>
                    <div class="feed-content">
                        <div class="feed-title" style="font-size: 14px;">Dr. Ahmed Khan</div>
                        <div class="feed-meta">Cardiologist</div>
                    </div>
                </div>
                <div class="feed-item">
                    <div class="profile-avatar" style="width: 36px; height: 36px; font-size: 14px; margin: 0; background: #42b72a;">S</div>
                    <div class="feed-content">
                        <div class="feed-title" style="font-size: 14px;">Dr. Sarah Islam</div>
                        <div class="feed-meta">Pediatrician</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
