@extends('tyro-dashboard::layouts.admin')

@section('title', 'Admin Dashboard')

@section('breadcrumb')
<span>Dashboard</span>
@endsection

@section('content')
<div class="page-header">
    <div class="page-header-row">
        <div>
            <h1 class="page-title">👋 Welcome back, {{ $user->name }}!</h1>
            <p class="page-description" style="font-size: 1rem;">Medical Search Engine — Admin Overview</p>
        </div>
        <div style="font-size: 0.875rem; color: var(--muted-foreground);">
            {{ now()->format('l, d F Y') }}
        </div>
    </div>
</div>

{{-- ============================================================
     STAT CARDS — Row 1: Core Counts
     ============================================================ --}}
<div class="stats-grid" style="margin-bottom: 1.5rem;">

    {{-- Total Users --}}
    <div class="stat-card">
        <div class="stat-icon stat-icon-primary">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        </div>
        <div class="stat-content">
            <div class="stat-label" style="font-size: 0.9375rem;">Total Users</div>
            <div class="stat-value">{{ number_format($stats['total_users']) }}</div>
        </div>
    </div>

    {{-- Doctors --}}
    <div class="stat-card">
        <div class="stat-icon stat-icon-success">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
            </svg>
        </div>
        <div class="stat-content">
            <div class="stat-label" style="font-size: 0.9375rem;">Doctors</div>
            <div class="stat-value">{{ number_format($stats['total_doctors']) }}</div>
        </div>
    </div>

    {{-- Hospitals --}}
    <div class="stat-card">
        <div class="stat-icon stat-icon-info">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
            </svg>
        </div>
        <div class="stat-content">
            <div class="stat-label" style="font-size: 0.9375rem;">Hospitals</div>
            <div class="stat-value">{{ number_format($stats['total_hospitals']) }}</div>
        </div>
    </div>

    {{-- Pharmacies --}}
    <div class="stat-card">
        <div class="stat-icon stat-icon-warning">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
            </svg>
        </div>
        <div class="stat-content">
            <div class="stat-label" style="font-size: 0.9375rem;">Pharmacies</div>
            <div class="stat-value">{{ number_format($stats['total_pharmacies']) }}</div>
        </div>
    </div>

</div>

{{-- STAT CARDS — Row 2: Medical Data --}}
<div class="stats-grid" style="margin-bottom: 1.5rem;">

    <div class="stat-card">
        <div class="stat-icon stat-icon-danger">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
        </div>
        <div class="stat-content">
            <div class="stat-label" style="font-size: 0.9375rem;">Diseases</div>
            <div class="stat-value">{{ number_format($stats['total_diseases']) }}</div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon stat-icon-primary">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
            </svg>
        </div>
        <div class="stat-content">
            <div class="stat-label" style="font-size: 0.9375rem;">Medicines</div>
            <div class="stat-value">{{ number_format($stats['total_medicines']) }}</div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon stat-icon-warning">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
        </div>
        <div class="stat-content">
            <div class="stat-label" style="font-size: 0.9375rem;">Pending Consultations</div>
            <div class="stat-value">{{ number_format($stats['pending_consultations']) }}</div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon stat-icon-success">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <div class="stat-content">
            <div class="stat-label" style="font-size: 0.9375rem;">System Status</div>
            <div class="stat-value" style="font-size: 1.25rem; color: var(--success);">Online ✓</div>
        </div>
    </div>
</div>

{{-- ============================================================
     TABLES — Row: Recent Consultations + Recent Doctors
     ============================================================ --}}
<div class="grid-2" style="margin-bottom: 1.5rem;">

    {{-- Recent Consultations --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="font-size: 1.0625rem;">🩺 Recent Consultations</h3>
            <span class="badge badge-warning">{{ $stats['pending_consultations'] }} Pending</span>
        </div>
        <div class="card-body" style="padding: 0;">
            @if($stats['recent_consultations']->count())
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Patient</th>
                            <th>Doctor</th>
                            <th style="text-align:right;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stats['recent_consultations'] as $consult)
                        <tr>
                            <td>
                                <div class="user-cell">
                                    <div class="user-cell-avatar">{{ strtoupper(substr($consult->patient->name ?? 'P', 0, 1)) }}</div>
                                    <div class="user-cell-info">
                                        <div class="user-cell-name" style="font-size: 0.9375rem;">{{ $consult->patient->name ?? 'N/A' }}</div>
                                        <div class="user-cell-email" style="font-size: 0.8125rem;">{{ $consult->scheduled_at ?? $consult->consult_date ?? '—' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td style="font-size: 0.9375rem;">{{ $consult->doctor->name ?? 'N/A' }}</td>
                            <td style="text-align:right;">
                                @php
                                    $badgeClass = match($consult->status) {
                                        'approved'  => 'badge-success',
                                        'pending'   => 'badge-warning',
                                        'rejected'  => 'badge-danger',
                                        'completed' => 'badge-primary',
                                        default     => 'badge-secondary',
                                    };
                                @endphp
                                <span class="badge {{ $badgeClass }}">{{ ucfirst($consult->status) }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="empty-state">
                <p class="empty-state-description" style="font-size: 0.9375rem;">No consultations yet.</p>
            </div>
            @endif
        </div>
    </div>

    {{-- Recent Doctors --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="font-size: 1.0625rem;">👨‍⚕️ Recently Joined Doctors</h3>
        </div>
        <div class="card-body" style="padding: 0;">
            @if($stats['recent_doctors']->count())
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Doctor</th>
                            <th>Specialization</th>
                            <th style="text-align:right;">Hospitals</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stats['recent_doctors'] as $doc)
                        <tr>
                            <td>
                                <div class="user-cell">
                                    <div class="user-cell-avatar">{{ strtoupper(substr($doc->name, 0, 1)) }}</div>
                                    <div class="user-cell-info">
                                        <div class="user-cell-name" style="font-size: 0.9375rem;">{{ $doc->name }}</div>
                                        <div class="user-cell-email" style="font-size: 0.8125rem;">{{ $doc->degree ?? 'MBBS' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge badge-info" style="font-size: 0.8125rem;">{{ $doc->specialization }}</span>
                            </td>
                            <td style="text-align:right; font-size: 0.9375rem;">
                                <strong>{{ $doc->hospitals->count() }}</strong>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="empty-state">
                <p class="empty-state-description" style="font-size: 0.9375rem;">No doctors registered yet.</p>
            </div>
            @endif
        </div>
    </div>
</div>

{{-- Recent Hospitals --}}
<div class="card" style="margin-bottom: 1.5rem;">
    <div class="card-header">
        <h3 class="card-title" style="font-size: 1.0625rem;">🏥 Recently Added Hospitals</h3>
    </div>
    <div class="card-body" style="padding: 0;">
        @if($stats['recent_hospitals']->count())
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Hospital Name</th>
                        <th>Location</th>
                        <th>Phone</th>
                        <th style="text-align:right;">Added</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stats['recent_hospitals'] as $hospital)
                    <tr>
                        <td>
                            <strong style="font-size: 0.9375rem;">{{ $hospital->name }}</strong>
                        </td>
                        <td style="font-size: 0.9375rem;">
                            {{ $hospital->thana->name ?? '—' }}
                        </td>
                        <td style="font-size: 0.9375rem;">{{ $hospital->phone ?? '—' }}</td>
                        <td style="text-align:right; font-size: 0.8125rem; color: var(--muted-foreground);">
                            {{ $hospital->created_at->diffForHumans() }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="empty-state">
            <p class="empty-state-description" style="font-size: 0.9375rem;">No hospitals registered yet.</p>
        </div>
        @endif
    </div>
</div>

{{-- Quick Action Links --}}
<div class="grid-2" style="margin-bottom: 1.5rem;">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="font-size: 1.0625rem;">⚡ Quick Actions</h3>
        </div>
        <div class="card-body" style="display: flex; flex-wrap: wrap; gap: 0.75rem;">
            <a href="{{ route('tyro-dashboard.users.index') }}" class="btn btn-primary btn-sm">👥 Manage Users</a>
            <a href="{{ route('tyro-dashboard.roles.index') }}" class="btn btn-secondary btn-sm">🔑 Manage Roles</a>
            <a href="#" class="btn btn-ghost btn-sm">🦠 Add Disease</a>
            <a href="#" class="btn btn-ghost btn-sm">💊 Add Medicine</a>
            <a href="#" class="btn btn-ghost btn-sm">🏥 Add Hospital</a>
            <a href="#" class="btn btn-ghost btn-sm">👨‍⚕️ Add Doctor</a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="font-size: 1.0625rem;">📊 Database Summary</h3>
        </div>
        <div class="card-body" style="padding: 0;">
            <div class="table-container">
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="font-size: 0.9375rem;">🦠 Diseases</td>
                            <td style="text-align:right;"><span class="badge badge-danger">{{ $stats['total_diseases'] }}</span></td>
                        </tr>
                        <tr>
                            <td style="font-size: 0.9375rem;">💊 Medicines</td>
                            <td style="text-align:right;"><span class="badge badge-primary">{{ $stats['total_medicines'] }}</span></td>
                        </tr>
                        <tr>
                            <td style="font-size: 0.9375rem;">👨‍⚕️ Doctors</td>
                            <td style="text-align:right;"><span class="badge badge-success">{{ $stats['total_doctors'] }}</span></td>
                        </tr>
                        <tr>
                            <td style="font-size: 0.9375rem;">🏥 Hospitals</td>
                            <td style="text-align:right;"><span class="badge badge-info">{{ $stats['total_hospitals'] }}</span></td>
                        </tr>
                        <tr>
                            <td style="font-size: 0.9375rem;">💊 Pharmacies</td>
                            <td style="text-align:right;"><span class="badge badge-warning">{{ $stats['total_pharmacies'] }}</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
