@extends('tyro-dashboard::layouts.admin')

@section('title', 'Add New Pharmacy')

@section('breadcrumb')
<a href="{{ route('pharmacy-owner.dashboard') }}">Dashboard</a>
<span class="breadcrumb-separator">/</span>
<a href="{{ route('pharmacy-owner.pharmacies.index') }}">My Pharmacies</a>
<span class="breadcrumb-separator">/</span>
<span>Add New</span>
@endsection

@section('content')
<div class="page-header">
    <div class="page-header-row">
        <div>
            <h1 class="page-title">Add New Pharmacy</h1>
            <p class="page-description">Fill in the details to register a new pharmacy.</p>
        </div>
    </div>
</div>

<div class="card" style="max-width: 800px;">
    <div class="card-header">
        <h3 class="card-title">Pharmacy Information</h3>
    </div>
    <form action="{{ route('pharmacy-owner.pharmacies.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name" class="form-label">Pharmacy Name</label>
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
                    <label for="license_no" class="form-label">License No</label>
                    <input type="text" id="license_no" name="license_no" class="form-input @error('license_no') is-invalid @enderror" value="{{ old('license_no') }}">
                    @error('license_no') <span class="form-error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label for="latitude" class="form-label">Latitude (optional)</label>
                    <input type="text" id="latitude" name="latitude" class="form-input @error('latitude') is-invalid @enderror" value="{{ old('latitude') }}">
                </div>

                <div class="form-group">
                    <label for="longitude" class="form-label">Longitude (optional)</label>
                    <input type="text" id="longitude" name="longitude" class="form-input @error('longitude') is-invalid @enderror" value="{{ old('longitude') }}">
                </div>
            </div>
        </div>
        <div class="card-footer" style="display: flex; gap: 0.75rem;">
            <button type="submit" class="btn btn-primary">Create Pharmacy</button>
            <a href="{{ route('pharmacy-owner.pharmacies.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
