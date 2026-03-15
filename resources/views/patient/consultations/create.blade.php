@extends('tyro-dashboard::layouts.admin')

@section('title', 'Book Consultation')

@section('breadcrumb')
<a href="{{ route('patient.dashboard') }}">Dashboard</a>
<span class="breadcrumb-separator">/</span>
<a href="{{ route('patient.consultations.index') }}">My Consultations</a>
<span class="breadcrumb-separator">/</span>
<span>Book New</span>
@endsection

@section('content')
<div class="page-header">
    <div class="page-header-row">
        <div>
            <h1 class="page-title">Book a Consultation</h1>
            <p class="page-description">Select a doctor and hospital to schedule your appointment.</p>
        </div>
    </div>
</div>

<div class="card" style="max-width: 800px;">
    <div class="card-header">
        <h3 class="card-title">Appointment Details</h3>
    </div>
    <form action="{{ route('patient.consultations.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="grid-2">
                <div class="form-group">
                    <label for="doctor_id" class="form-label">Select Doctor</label>
                    <select id="doctor_id" name="doctor_id" class="form-input @error('doctor_id') is-invalid @enderror" required>
                        <option value="">Choose a Doctor</option>
                        @foreach($doctors as $d)
                            <option value="{{ $d->id }}" {{ (old('doctor_id') ?? $doctor?->id) == $d->id ? 'selected' : '' }}>{{ $d->name }} ({{ $d->specialization }})</option>
                        @endforeach
                    </select>
                    @error('doctor_id') <span class="form-error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="hospital_id" class="form-label">Select Hospital</label>
                    <select id="hospital_id" name="hospital_id" class="form-input @error('hospital_id') is-invalid @enderror" required>
                        <option value="">Choose a Hospital</option>
                        @foreach($hospitals as $h)
                            <option value="{{ $h->id }}" {{ (old('hospital_id') ?? $hospital?->id) == $h->id ? 'selected' : '' }}>{{ $h->name }}</option>
                        @endforeach
                    </select>
                    @error('hospital_id') <span class="form-error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="consult_date" class="form-label">Preferred Date</label>
                <input type="date" id="consult_date" name="consult_date" class="form-input @error('consult_date') is-invalid @enderror" value="{{ old('consult_date') }}" min="{{ date('Y-m-d') }}" required>
                @error('consult_date') <span class="form-error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="message" class="form-label">Message/Symptoms (optional)</label>
                <textarea id="message" name="message" class="form-input @error('message') is-invalid @enderror" rows="4">{{ old('message') }}</textarea>
                @error('message') <span class="form-error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="card-footer" style="display: flex; gap: 0.75rem;">
            <button type="submit" class="btn btn-primary">Submit Booking</button>
            <a href="{{ route('patient.consultations.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
