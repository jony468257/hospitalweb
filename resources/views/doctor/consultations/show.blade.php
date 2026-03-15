@extends('tyro-dashboard::layouts.admin')

@section('title', 'Consultation Details')

@section('breadcrumb')
<a href="{{ route('doctor.dashboard') }}">Dashboard</a>
<span class="breadcrumb-separator">/</span>
<a href="{{ route('doctor.consultations.index') }}">Consultations</a>
<span class="breadcrumb-separator">/</span>
<span>Details</span>
@endsection

@section('content')
<div class="page-header">
    <div class="page-header-row">
        <div>
            <h1 class="page-title">Consultation Details</h1>
            <p class="page-description">Patient: {{ $consultation->patient->name ?? 'N/A' }}</p>
        </div>
    </div>
</div>

<div class="grid-2">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Patient Info</h3>
        </div>
        <div class="card-body">
            <div class="info-group" style="margin-bottom: 1rem;">
                <label style="font-weight: 600; font-size: 0.875rem; color: var(--muted-foreground); display: block;">Name</label>
                <div style="font-size: 1rem;">{{ $consultation->patient->name ?? 'N/A' }}</div>
            </div>
            <div class="info-group" style="margin-bottom: 1rem;">
                <label style="font-weight: 600; font-size: 0.875rem; color: var(--muted-foreground); display: block;">Phone</label>
                <div style="font-size: 1rem;">{{ $consultation->patient->phone ?? '—' }}</div>
            </div>
            <div class="info-group">
                <label style="font-weight: 600; font-size: 0.875rem; color: var(--muted-foreground); display: block;">Email</label>
                <div style="font-size: 1rem;">{{ $consultation->patient->email ?? '—' }}</div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Update Status</h3>
        </div>
        <form action="{{ route('doctor.consultations.update-status', $consultation) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="form-group">
                    <label for="status" class="form-label">Consultation Status</label>
                    <select id="status" name="status" class="form-input @error('status') is-invalid @enderror" required>
                        <option value="pending" {{ $consultation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="accepted" {{ $consultation->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                        <option value="completed" {{ $consultation->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ $consultation->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                    @error('status') <span class="form-error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="meeting_link" class="form-label">Meeting Link (for online consultations)</label>
                    <input type="url" id="meeting_link" name="meeting_link" class="form-input @error('meeting_link') is-invalid @enderror" value="{{ old('meeting_link', $consultation->meeting_link) }}" placeholder="https://zoom.us/j/...">
                    @error('meeting_link') <span class="form-error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Consultation</button>
            </div>
        </form>
    </div>
</div>
@endsection
