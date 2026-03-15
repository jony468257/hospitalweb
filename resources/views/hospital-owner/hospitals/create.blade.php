@extends('tyro-dashboard::layouts.admin')

@section('title', 'Add New Hospital')

@section('breadcrumb')
<a href="{{ route('hospital-owner.dashboard') }}">Dashboard</a>
<span class="breadcrumb-separator">/</span>
<a href="{{ route('hospital-owner.hospitals.index') }}">My Hospitals</a>
<span class="breadcrumb-separator">/</span>
<span>Add New</span>
@endsection

@section('content')
<div class="page-header">
    <div class="page-header-row">
        <div>
            <h1 class="page-title">Add New Hospital</h1>
            <p class="page-description">Fill in the details to register a new hospital.</p>
        </div>
    </div>
</div>

<div class="card" style="max-width: 800px;">
    <div class="card-header">
        <h3 class="card-title">Hospital Information</h3>
    </div>
    <form action="{{ route('hospital-owner.hospitals.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name" class="form-label">Hospital Name</label>
                <input type="text" id="name" name="name" class="form-input @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                @error('name') <span class="form-error">{{ $message }}</span> @enderror
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label for="country_id" class="form-label">Country</label>
                    <select id="country_id" name="country_id" class="form-input @error('country_id') is-invalid @enderror" required>
                        <option value="">Select Country</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                        @endforeach
                    </select>
                    @error('country_id') <span class="form-error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="thana_id" class="form-label">Thana/Area</label>
                    <select id="thana_id" name="thana_id" class="form-input @error('thana_id') is-invalid @enderror" required>
                        <option value="">Select Thana</option>
                        @foreach($thanas as $thana)
                            <option value="{{ $thana->id }}" {{ old('thana_id') == $thana->id ? 'selected' : '' }}>{{ $thana->name }}</option>
                        @endforeach
                    </select>
                    @error('thana_id') <span class="form-error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="address" class="form-label">Full Address</label>
                <textarea id="address" name="address" class="form-input @error('address') is-invalid @enderror" rows="3" required>{{ old('address') }}</textarea>
                @error('address') <span class="form-error">{{ $message }}</span> @enderror
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" id="phone" name="phone" class="form-input @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                    @error('phone') <span class="form-error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="latitude" class="form-label">Latitude (optional)</label>
                    <input type="text" id="latitude" name="latitude" class="form-input @error('latitude') is-invalid @enderror" value="{{ old('latitude') }}">
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description" class="form-input @error('description') is-invalid @enderror" rows="4">{{ old('description') }}</textarea>
                @error('description') <span class="form-error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="card-footer" style="display: flex; gap: 0.75rem;">
            <button type="submit" class="btn btn-primary">Create Hospital</button>
            <a href="{{ route('hospital-owner.hospitals.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
