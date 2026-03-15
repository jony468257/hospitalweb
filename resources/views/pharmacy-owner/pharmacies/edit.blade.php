@extends('tyro-dashboard::layouts.admin')

@section('title', 'Edit Pharmacy')

@section('breadcrumb')
<a href="{{ route('pharmacy-owner.dashboard') }}">Dashboard</a>
<span class="breadcrumb-separator">/</span>
<a href="{{ route('pharmacy-owner.pharmacies.index') }}">My Pharmacies</a>
<span class="breadcrumb-separator">/</span>
<span>Edit</span>
@endsection

@section('content')
<div class="page-header">
    <div class="page-header-row">
        <div>
            <h1 class="page-title">Edit Pharmacy: {{ $pharmacy->name }}</h1>
            <p class="page-description">Update your pharmacy's information.</p>
        </div>
    </div>
</div>

<div class="card" style="max-width: 800px;">
    <div class="card-header">
        <h3 class="card-title">Pharmacy Information</h3>
    </div>
    <form action="{{ route('pharmacy-owner.pharmacies.update', $pharmacy) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="name" class="form-label">Pharmacy Name</label>
                <input type="text" id="name" name="name" class="form-input @error('name') is-invalid @enderror" value="{{ old('name', $pharmacy->name) }}" required>
                @error('name') <span class="form-error">{{ $message }}</span> @enderror
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label for="country_id" class="form-label">Country</label>
                    <select id="country_id" name="country_id" class="form-input @error('country_id') is-invalid @enderror" required>
                        <option value="">Select Country</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}" {{ old('country_id', $pharmacy->country_id) == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                        @endforeach
                    </select>
                    @error('country_id') <span class="form-error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="thana_id" class="form-label">Thana/Area</label>
                    <select id="thana_id" name="thana_id" class="form-input @error('thana_id') is-invalid @enderror" required>
                        <option value="">Select Thana</option>
                        @foreach($thanas as $thana)
                            <option value="{{ $thana->id }}" {{ old('thana_id', $pharmacy->thana_id) == $thana->id ? 'selected' : '' }}>{{ $thana->name }}</option>
                        @endforeach
                    </select>
                    @error('thana_id') <span class="form-error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="address" class="form-label">Full Address</label>
                <textarea id="address" name="address" class="form-input @error('address') is-invalid @enderror" rows="3" required>{{ old('address', $pharmacy->address) }}</textarea>
                @error('address') <span class="form-error">{{ $message }}</span> @enderror
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" id="phone" name="phone" class="form-input @error('phone') is-invalid @enderror" value="{{ old('phone', $pharmacy->phone) }}">
                    @error('phone') <span class="form-error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="license_no" class="form-label">License No</label>
                    <input type="text" id="license_no" name="license_no" class="form-input @error('license_no') is-invalid @enderror" value="{{ old('license_no', $pharmacy->license_no) }}">
                    @error('license_no') <span class="form-error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label for="latitude" class="form-label">Latitude (optional)</label>
                    <input type="text" id="latitude" name="latitude" class="form-input @error('latitude') is-invalid @enderror" value="{{ old('latitude', $pharmacy->latitude) }}">
                </div>

                <div class="form-group">
                    <label for="longitude" class="form-label">Longitude (optional)</label>
                    <input type="text" id="longitude" name="longitude" class="form-input @error('longitude') is-invalid @enderror" value="{{ old('longitude', $pharmacy->longitude) }}">
                </div>
            </div>
        </div>
        <div class="card-footer" style="display: flex; gap: 0.75rem;">
            <button type="submit" class="btn btn-primary">Update Pharmacy</button>
            <a href="{{ route('pharmacy-owner.pharmacies.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
