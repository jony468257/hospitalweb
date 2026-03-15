@extends('tyro-dashboard::layouts.admin')

@section('title', 'My Consultations')

@section('breadcrumb')
<a href="{{ route('patient.dashboard') }}">Dashboard</a>
<span class="breadcrumb-separator">/</span>
<span>My Consultations</span>
@endsection

@section('content')
<div class="page-header">
    <div class="page-header-row">
        <div>
            <h1 class="page-title">My Consultations</h1>
            <p class="page-description">Track your consultation appointments and meeting links.</p>
        </div>
        <a href="{{ route('patient.consultations.create') }}" class="btn btn-primary">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Book New Consultation
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Consultation History</h3>
    </div>
    <div class="card-body" style="padding: 0;">
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Doctor</th>
                        <th>Hospital</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th style="text-align:right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($consultations as $consult)
                    <tr>
                        <td style="font-weight: 600;">{{ $consult->doctor->name ?? 'N/A' }}</td>
                        <td>{{ $consult->hospital->name ?? '—' }}</td>
                        <td>{{ \Carbon\Carbon::parse($consult->consult_date)->format('d M Y') }}</td>
                        <td>
                            @php
                                $badgeClass = match($consult->status) {
                                    'accepted'  => 'badge-success',
                                    'pending'   => 'badge-warning',
                                    'completed' => 'badge-primary',
                                    'cancelled' => 'badge-danger',
                                    default     => 'badge-secondary',
                                };
                            @endphp
                            <span class="badge {{ $badgeClass }}">{{ ucfirst($consult->status) }}</span>
                        </td>
                        <td style="text-align:right; display: flex; gap: 0.5rem; justify-content: flex-end;">
                            <a href="{{ route('patient.consultations.show', $consult) }}" class="btn btn-sm btn-outline-primary">View</a>
                            @if($consult->status === 'pending')
                            <form action="{{ route('patient.consultations.destroy', $consult) }}" method="POST" onsubmit="return confirm('Cancel this consultation?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Cancel</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 2rem;">
                            <div class="empty-state">
                                <p class="empty-state-description">No consultations found. Book your first appointment!</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($consultations->hasPages())
    <div class="card-footer">
        {{ $consultations->links() }}
    </div>
    @endif
</div>
@endsection
