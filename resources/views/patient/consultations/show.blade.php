@extends('tyro-dashboard::layouts.admin')

@section('title', 'Consultation Details')

@section('breadcrumb')
<a href="{{ route('patient.dashboard') }}">Dashboard</a>
<span class="breadcrumb-separator">/</span>
<a href="{{ route('patient.consultations.index') }}">My Consultations</a>
<span class="breadcrumb-separator">/</span>
<span>Details</span>
@endsection

@section('content')
<div class="page-header">
    <div class="page-header-row">
        <div>
            <h1 class="page-title">Consultation Details</h1>
            <p class="page-description">With {{ $consultation->doctor->name ?? 'N/A' }}</p>
        </div>
    </div>
</div>

<div class="grid-2">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Appointment Info</h3>
        </div>
        <div class="card-body">
            <div class="info-group" style="margin-bottom: 1rem;">
                <label style="font-weight: 600; font-size: 0.875rem; color: var(--muted-foreground); display: block;">Doctor</label>
                <div style="font-size: 1rem;">{{ $consultation->doctor->name ?? 'N/A' }} ({{ $consultation->doctor->specialization ?? '—' }})</div>
            </div>
            <div class="info-group" style="margin-bottom: 1rem;">
                <label style="font-weight: 600; font-size: 0.875rem; color: var(--muted-foreground); display: block;">Hospital</label>
                <div style="font-size: 1rem;">{{ $consultation->hospital->name ?? '—' }} ({{ $consultation->hospital->address ?? '—' }})</div>
            </div>
            <div class="info-group" style="margin-bottom: 1rem;">
                <label style="font-weight: 600; font-size: 0.875rem; color: var(--muted-foreground); display: block;">Date</label>
                <div style="font-size: 1rem;">{{ \Carbon\Carbon::parse($consultation->consult_date)->format('l, d F Y') }}</div>
            </div>
            <div class="info-group">
                <label style="font-weight: 600; font-size: 0.875rem; color: var(--muted-foreground); display: block;">Status</label>
                <div>
                    @php
                        $badgeClass = match($consultation->status) {
                            'accepted'  => 'badge-success',
                            'pending'   => 'badge-warning',
                            'completed' => 'badge-primary',
                            'cancelled' => 'badge-danger',
                            default     => 'badge-secondary',
                        };
                    @endphp
                    <span class="badge {{ $badgeClass }}">{{ ucfirst($consultation->status) }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Meeting & Links</h3>
        </div>
        <div class="card-body">
            @if($consultation->meeting_link)
                <div class="alert alert-success" style="margin-bottom: 1.5rem;">
                    <strong>Join Consultation:</strong><br>
                    <a href="{{ $consultation->meeting_link }}" target="_blank" class="btn btn-primary btn-sm" style="margin-top: 0.5rem;">Join Online Meeting</a>
                </div>
            @else
                <p style="color: var(--muted-foreground);">The meeting link will be visible here once the doctor approves the appointment.</p>
            @endif

            @if($consultation->status === 'pending')
            <hr style="margin: 1.5rem 0; border: 0; border-top: 1px solid var(--border);">
            <form action="{{ route('patient.consultations.destroy', $consultation) }}" method="POST" onsubmit="return confirm('Cancel this consultation?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Cancel Appointment</button>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection
