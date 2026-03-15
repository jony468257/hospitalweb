@extends('tyro-dashboard::layouts.admin')

@section('title', 'Add Doctor')

@section('breadcrumb')
<a href="{{ route('hospital-owner.dashboard') }}">Dashboard</a>
<span class="breadcrumb-separator">/</span>
<a href="{{ route('hospital-owner.doctors.index') }}">Manage Doctors</a>
<span class="breadcrumb-separator">/</span>
<span>Add New</span>
@endsection

@section('content')
<div class="page-header">
    <div class="page-header-row">
        <div>
            <h1 class="page-title">Add Doctor</h1>
            <p class="page-description">Register a doctor to one of your hospitals.</p>
        </div>
    </div>
</div>

<div class="card" style="max-width: 800px;">
    <div class="card-header">
        <h3 class="card-title">Doctor Profile</h3>
    </div>
    <form action="{{ route('hospital-owner.doctors.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="hospital_id" class="form-label">Assign to Hospital</label>
                <select id="hospital_id" name="hospital_id" class="form-input @error('hospital_id') is-invalid @enderror" required>
                    <option value="">Select Hospital</option>
                    @foreach($hospitals as $h)
                        <option value="{{ $h->id }}" {{ old('hospital_id') == $h->id ? 'selected' : '' }}>{{ $h->name }}</option>
                    @endforeach
                </select>
                @error('hospital_id') <span class="form-error">{{ $message }}</span> @enderror
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label for="name" class="form-label">Doctor Name</label>
                    <input type="text" id="name" name="name" class="form-input @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                    @error('name') <span class="form-error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" id="email" name="email" class="form-input @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                    @error('email') <span class="form-error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label for="specialization" class="form-label">Specialization</label>
                    <input type="text" id="specialization" name="specialization" class="form-input @error('specialization') is-invalid @enderror" value="{{ old('specialization') }}" required>
                    @error('specialization') <span class="form-error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="experience_year" class="form-label">Years of Experience</label>
                    <input type="number" id="experience_year" name="experience_year" class="form-input @error('experience_year') is-invalid @enderror" value="{{ old('experience_year') }}">
                    @error('experience_year') <span class="form-error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="degree" class="form-label">Degrees (e.g. MBBS, FCPS)</label>
                <input type="text" id="degree" name="degree" class="form-input @error('degree') is-invalid @enderror" value="{{ old('degree') }}">
                @error('degree') <span class="form-error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="bio" class="form-label">Short Bio</label>
                <textarea id="bio" name="bio" class="form-input @error('bio') is-invalid @enderror" rows="4">{{ old('bio') }}</textarea>
                @error('bio') <span class="form-error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="card-footer" style="display: flex; gap: 0.75rem;">
            <button type="submit" class="btn btn-primary">Add Doctor</button>
            <a href="{{ route('hospital-owner.doctors.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
