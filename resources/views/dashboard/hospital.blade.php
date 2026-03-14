@extends('tyro-dashboard::layouts.user')

@section('title', 'Hospital Owner Dashboard')

@section('breadcrumb')
<span>Dashboard</span>
@endsection

@section('content')
<div class="page-header">
    <div class="page-header-row">
        <div>
            <h1 class="page-title">🏥 Hospital Owner Panel</h1>
            <p class="page-description" style="font-size: 1rem;">Welcome back, {{ $user->name }}. Manage your hospitals and doctors.</p>
        </div>
        <div style="font-size: 0.875rem; color: var(--muted-foreground);">
            {{ now()->format('l, d F Y') }}
        </div>
    </div>
</div>

<div class="stats-grid" style="margin-bottom: 1.5rem;">
    <div class="stat-card">
        <div class="stat-icon stat-icon-info">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
            </svg>
        </div>
        <div class="stat-content">
            <div class="stat-label" style="font-size: 0.9375rem;">My Hospitals</div>
            <div class="stat-value">{{ $stats['my_hospitals'] }}</div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon stat-icon-success">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
        </div>
        <div class="stat-content">
            <div class="stat-label" style="font-size: 0.9375rem;">Total Doctors</div>
            <div class="stat-value">{{ $stats['total_doctors'] }}</div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title" style="font-size: 1.0625rem;">🏥 My Hospitals</h3>
    </div>
    <div class="card-body" style="padding: 0;">
        @if($stats['recent_hospitals']->count())
        <div class="table-container">
            <table class="table">
                <thead><tr><th>Hospital</th><th>Location</th><th style="text-align:right;">Added</th></tr></thead>
                <tbody>
                    @foreach($stats['recent_hospitals'] as $h)
                    <tr>
                        <td><strong style="font-size: 0.9375rem;">{{ $h->name }}</strong></td>
                        <td style="font-size: 0.9375rem;">{{ $h->thana->name ?? '—' }}</td>
                        <td style="text-align:right; font-size: 0.8125rem; color: var(--muted-foreground);">{{ $h->created_at->diffForHumans() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="empty-state"><p class="empty-state-description">No hospitals added yet.</p></div>
        @endif
    </div>
</div>
@endsection
