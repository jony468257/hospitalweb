@extends('tyro-dashboard::layouts.user')

@section('title', 'Doctor Dashboard')

@section('breadcrumb')
<span>Dashboard</span>
@endsection

@section('content')
<div class="page-header">
    <div class="page-header-row">
        <div>
            <h1 class="page-title">👨‍⚕️ Dr. {{ $doctor->name }}</h1>
            <p class="page-description" style="font-size: 1rem;">
                <span class="badge badge-info">{{ $doctor->specialization }}</span>
                &nbsp;{{ $doctor->degree ?? 'MBBS' }}
                &nbsp;· {{ $doctor->experience_year ?? 0 }} yrs experience
            </p>
        </div>
        <div style="font-size: 0.875rem; color: var(--muted-foreground);">
            {{ now()->format('l, d F Y') }}
        </div>
    </div>
</div>

{{-- Stat Cards --}}
<div class="stats-grid" style="margin-bottom: 1.5rem;">

    <div class="stat-card">
        <div class="stat-icon stat-icon-warning">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <div class="stat-content">
            <div class="stat-label" style="font-size: 0.9375rem;">Pending Requests</div>
            <div class="stat-value">{{ $stats['pending_consults'] }}</div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon stat-icon-success">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <div class="stat-content">
            <div class="stat-label" style="font-size: 0.9375rem;">Completed Sessions</div>
            <div class="stat-value">{{ $stats['done_consults'] }}</div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon stat-icon-info">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5" />
            </svg>
        </div>
        <div class="stat-content">
            <div class="stat-label" style="font-size: 0.9375rem;">My Hospitals</div>
            <div class="stat-value">{{ $stats['my_hospitals'] }}</div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon stat-icon-primary">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
            </svg>
        </div>
        <div class="stat-content">
            <div class="stat-label" style="font-size: 0.9375rem;">Avg Rating</div>
            <div class="stat-value">{{ number_format($stats['avg_rating'] ?? 0, 1) }} ⭐</div>
        </div>
    </div>
</div>

{{-- Recent Consultations --}}
<div class="card">
    <div class="card-header">
        <h3 class="card-title" style="font-size: 1.0625rem;">🩺 Recent Consultation Requests</h3>
        @if($stats['pending_consults'] > 0)
            <span class="badge badge-warning">{{ $stats['pending_consults'] }} Awaiting</span>
        @endif
    </div>
    <div class="card-body" style="padding: 0;">
        @if($stats['recent_consults']->count())
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Patient</th>
                        <th>Scheduled</th>
                        <th style="text-align:right;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stats['recent_consults'] as $c)
                    <tr>
                        <td>
                            <div class="user-cell">
                                <div class="user-cell-avatar">{{ strtoupper(substr($c->patient->name ?? 'P', 0, 1)) }}</div>
                                <div class="user-cell-info">
                                    <div class="user-cell-name" style="font-size: 0.9375rem;">{{ $c->patient->name ?? 'N/A' }}</div>
                                    <div class="user-cell-email" style="font-size: 0.8125rem;">{{ $c->patient->phone ?? '' }}</div>
                                </div>
                            </div>
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
            <p class="empty-state-description" style="font-size: 0.9375rem;">No consultation requests yet.</p>
        </div>
        @endif
    </div>
</div>
@endsection
