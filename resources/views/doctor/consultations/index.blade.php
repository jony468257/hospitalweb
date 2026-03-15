@extends('tyro-dashboard::layouts.admin')

@section('title', 'Manage Consultations')

@section('breadcrumb')
<a href="{{ route('doctor.dashboard') }}">Dashboard</a>
<span class="breadcrumb-separator">/</span>
<span>Consultations</span>
@endsection

@section('content')
<div class="page-header">
    <div class="page-header-row">
        <div>
            <h1 class="page-title">Patient Consultations</h1>
            <p class="page-description">View and manage your consultation appointments.</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Appointment List</h3>
    </div>
    <div class="card-body" style="padding: 0;">
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Patient</th>
                        <th>Hospital</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th style="text-align:right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($consultations as $consult)
                    <tr>
                        <td style="font-weight: 600;">{{ $consult->patient->name ?? 'N/A' }}</td>
                        <td>{{ $consult->hospital->name ?? 'Online' }}</td>
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
                        <td style="text-align:right;">
                            <a href="{{ route('doctor.consultations.show', $consult) }}" class="btn btn-sm btn-outline-primary">View Details</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 2rem;">
                            <div class="empty-state">
                                <p class="empty-state-description">No consultations found.</p>
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
