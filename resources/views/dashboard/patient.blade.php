@extends('tyro-dashboard::layouts.user')

@section('title', 'My Dashboard')

@section('breadcrumb')
<span>Dashboard</span>
@endsection

@section('content')
<div class="page-header">
    <div class="page-header-row">
        <div>
            <h1 class="page-title">👋 Hello, {{ $user->name }}!</h1>
            <p class="page-description" style="font-size: 1rem;">Your health dashboard — track consultations and bookmarks.</p>
        </div>
        <div style="font-size: 0.875rem; color: var(--muted-foreground);">
            {{ now()->format('l, d F Y') }}
        </div>
    </div>
</div>

{{-- Stat Cards --}}
<div class="stats-grid" style="margin-bottom: 1.5rem;">

    <div class="stat-card">
        <div class="stat-icon stat-icon-primary">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
        </div>
        <div class="stat-content">
            <div class="stat-label" style="font-size: 0.9375rem;">Total Consultations</div>
            <div class="stat-value">{{ $stats['my_consultations'] }}</div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon stat-icon-warning">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <div class="stat-content">
            <div class="stat-label" style="font-size: 0.9375rem;">Pending</div>
            <div class="stat-value">{{ $stats['pending_consults'] }}</div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon stat-icon-success">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
            </svg>
        </div>
        <div class="stat-content">
            <div class="stat-label" style="font-size: 0.9375rem;">Bookmarks</div>
            <div class="stat-value">{{ $stats['bookmarks'] }}</div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon stat-icon-info">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
            </svg>
        </div>
        <div class="stat-content">
            <div class="stat-label" style="font-size: 0.9375rem;">Health Status</div>
            <div class="stat-value" style="font-size: 1.25rem;">Active ✓</div>
        </div>
    </div>
</div>

{{-- Recent Consultations --}}
<div class="card">
    <div class="card-header">
        <h3 class="card-title" style="font-size: 1.0625rem;">🩺 My Consultations</h3>
    </div>
    <div class="card-body" style="padding: 0;">
        @if($stats['recent_consults']->count())
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Doctor</th>
                        <th>Specialization</th>
                        <th>Scheduled</th>
                        <th style="text-align:right;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stats['recent_consults'] as $c)
                    <tr>
                        <td>
                            <div class="user-cell">
                                <div class="user-cell-avatar">{{ strtoupper(substr($c->doctor->name ?? 'D', 0, 1)) }}</div>
                                <div class="user-cell-name" style="font-size: 0.9375rem;">{{ $c->doctor->name ?? 'N/A' }}</div>
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-info" style="font-size: 0.8125rem;">{{ $c->doctor->specialization ?? '—' }}</span>
                        </td>
                        <td style="font-size: 0.9375rem;">{{ $c->scheduled_at ?? $c->consult_date ?? '—' }}</td>
                        <td style="text-align:right;">
                            @php $cls = match($c->status) { 'approved'=>'badge-success','pending'=>'badge-warning','rejected'=>'badge-danger','completed'=>'badge-primary',default=>'badge-secondary'}; @endphp
                            <span class="badge {{ $cls }}">{{ ucfirst($c->status) }}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="empty-state">
            <p class="empty-state-description" style="font-size: 0.9375rem;">You have no consultations yet. <a href="#">Book a Doctor</a></p>
        </div>
        @endif
    </div>
</div>
@endsection
