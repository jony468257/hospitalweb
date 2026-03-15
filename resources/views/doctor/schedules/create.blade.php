@extends('tyro-dashboard::layouts.admin')

@section('title', 'Add New Schedule')

@section('breadcrumb')
<a href="{{ route('doctor.dashboard') }}">Dashboard</a>
<span class="breadcrumb-separator">/</span>
<a href="{{ route('doctor.schedules.index') }}">Consultation Schedule</a>
<span class="breadcrumb-separator">/</span>
<span>Add New</span>
@endsection

@section('content')
<div class="page-header">
    <div class="page-header-row">
        <div>
            <h1 class="page-title">Add New Schedule</h1>
            <p class="page-description">Define a new availability slot for your patients.</p>
        </div>
    </div>
</div>

<div class="card" style="max-width: 800px;">
    <div class="card-header">
        <h3 class="card-title">Schedule Details</h3>
    </div>
    <form action="{{ route('doctor.schedules.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="hospital_id" class="form-label">Hospital</label>
                <select id="hospital_id" name="hospital_id" class="form-input @error('hospital_id') is-invalid @enderror" required>
                    <option value="">Select Hospital</option>
                    @foreach($hospitals as $hospital)
                        <option value="{{ $hospital->id }}" {{ old('hospital_id') == $hospital->id ? 'selected' : '' }}>{{ $hospital->name }}</option>
                    @endforeach
                </select>
                @error('hospital_id') <span class="form-error">{{ $message }}</span> @enderror
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label for="day_of_week" class="form-label">Day of Week</label>
                    <select id="day_of_week" name="day_of_week" class="form-input @error('day_of_week') is-invalid @enderror" required>
                        <option value="">Select Day</option>
                        @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                            <option value="{{ $day }}" {{ old('day_of_week') == $day ? 'selected' : '' }}>{{ $day }}</option>
                        @endforeach
                    </select>
                    @error('day_of_week') <span class="form-error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="visit_fee" class="form-label">Visit Fee</label>
                    <input type="number" step="0.01" id="visit_fee" name="visit_fee" class="form-input @error('visit_fee') is-invalid @enderror" value="{{ old('visit_fee') }}" required>
                    @error('visit_fee') <span class="form-error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label for="start_time" class="form-label">Start Time</label>
                    <input type="time" id="start_time" name="start_time" class="form-input @error('start_time') is-invalid @enderror" value="{{ old('start_time') }}" required>
                    @error('start_time') <span class="form-error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="end_time" class="form-label">End Time</label>
                    <input type="time" id="end_time" name="end_time" class="form-input @error('end_time') is-invalid @enderror" value="{{ old('end_time') }}" required>
                    @error('end_time') <span class="form-error">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="card-footer" style="display: flex; gap: 0.75rem;">
            <button type="submit" class="btn btn-primary">Save Schedule</button>
            <a href="{{ route('doctor.schedules.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
