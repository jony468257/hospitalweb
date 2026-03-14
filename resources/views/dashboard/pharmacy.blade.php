@extends('tyro-dashboard::layouts.user')

@section('title', 'Pharmacy Owner Dashboard')

@section('breadcrumb')
<span>Dashboard</span>
@endsection

@section('content')
<div class="page-header">
    <div class="page-header-row">
        <div>
            <h1 class="page-title">💊 Pharmacy Owner Panel</h1>
            <p class="page-description" style="font-size: 1rem;">Welcome back, {{ $user->name }}. Manage your pharmacies and medicine inventory.</p>
        </div>
        <div style="font-size: 0.875rem; color: var(--muted-foreground);">
            {{ now()->format('l, d F Y') }}
        </div>
    </div>
</div>

<div class="stats-grid" style="margin-bottom: 1.5rem;">
    <div class="stat-card">
        <div class="stat-icon stat-icon-warning">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
            </svg>
        </div>
        <div class="stat-content">
            <div class="stat-label" style="font-size: 0.9375rem;">My Pharmacies</div>
            <div class="stat-value">{{ $stats['my_pharmacies'] }}</div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon stat-icon-primary">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
            </svg>
        </div>
        <div class="stat-content">
            <div class="stat-label" style="font-size: 0.9375rem;">Total Medicine SKUs</div>
            <div class="stat-value">{{ $stats['total_medicines'] }}</div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title" style="font-size: 1.0625rem;">💊 My Pharmacies</h3>
    </div>
    <div class="card-body" style="padding: 0;">
        @if($stats['recent_pharmacies']->count())
        <div class="table-container">
            <table class="table">
                <thead><tr><th>Pharmacy</th><th>Location</th><th>Phone</th><th style="text-align:right;">Added</th></tr></thead>
                <tbody>
                    @foreach($stats['recent_pharmacies'] as $p)
                    <tr>
                        <td><strong style="font-size: 0.9375rem;">{{ $p->name }}</strong></td>
                        <td style="font-size: 0.9375rem;">{{ $p->thana->name ?? '—' }}</td>
                        <td style="font-size: 0.9375rem;">{{ $p->phone ?? '—' }}</td>
                        <td style="text-align:right; font-size: 0.8125rem; color: var(--muted-foreground);">{{ $p->created_at->diffForHumans() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="empty-state"><p class="empty-state-description">No pharmacies added yet.</p></div>
        @endif
    </div>
</div>
@endsection
