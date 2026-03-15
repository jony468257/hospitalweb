@extends('tyro-dashboard::layouts.admin')

@section('title', 'Manage My Schedule')

@section('breadcrumb')
<a href="{{ route('doctor.dashboard') }}">Dashboard</a>
<span class="breadcrumb-separator">/</span>
<span>Consultation Schedule</span>
@endsection

@section('content')
<div class="page-header">
    <div class="page-header-row">
        <div>
            <h1 class="page-title">Consultation Schedule</h1>
            <p class="page-description">Manage your availability for patients across different hospitals.</p>
        </div>
        <a href="{{ route('doctor.schedules.create') }}" class="btn btn-primary">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Add New Schedule
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Schedule List</h3>
    </div>
    <div class="card-body" style="padding: 0;">
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Hospital</th>
                        <th>Day</th>
                        <th>Time Slot</th>
                        <th>Visit Fee</th>
                        <th style="text-align:right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($schedules as $schedule)
                    <tr>
                        <td style="font-weight: 600;">{{ $schedule->hospital->name }}</td>
                        <td>
                            <span class="badge badge-info">{{ $schedule->day_of_week }}</span>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}</td>
                        <td>{{ number_format($schedule->visit_fee, 2) }}</td>
                        <td style="text-align:right; display: flex; gap: 0.5rem; justify-content: flex-end;">
                            <a href="{{ route('doctor.schedules.edit', $schedule) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('doctor.schedules.destroy', $schedule) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 2rem;">
                            <div class="empty-state">
                                <p class="empty-state-description">No schedules found. Start by adding one!</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($schedules->hasPages())
    <div class="card-footer">
        {{ $schedules->links() }}
    </div>
    @endif
</div>
@endsection
