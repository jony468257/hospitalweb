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

            <hr style="margin: 2rem 0; border: none; border-top: 1px solid var(--border);">
            <h4 style="margin-bottom: 1rem; font-size: 1.0625rem; font-weight: 600;">Additional Details</h4>

            <div class="form-group">
                <label for="doctors" class="form-label">Associated Doctors</label>
                <select id="doctors" name="doctors[]" class="form-input" multiple style="height: 120px;">
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->name }} ({{ $doctor->specialization ?? 'General' }})</option>
                    @endforeach
                </select>
                <small style="color:var(--muted-foreground)">Hold Ctrl (Windows) or Cmd (Mac) to select multiple.</small>
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label class="form-label">Features</label>
                    <div id="features-container"></div>
                    <button type="button" class="btn btn-secondary btn-sm" onclick="addFeature()" style="margin-top: 0.5rem;">+ Add Feature</button>
                </div>

                <div class="form-group">
                    <label class="form-label">Services / Costs</label>
                    <div id="services-container"></div>
                    <button type="button" class="btn btn-secondary btn-sm" onclick="addService()" style="margin-top: 0.5rem;">+ Add Service</button>
                </div>
            </div>
        </div>
        <div class="card-footer" style="display: flex; gap: 0.75rem;">
            <button type="submit" class="btn btn-primary">Create Hospital</button>
            <a href="{{ route('hospital-owner.hospitals.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

<script>
function addFeature(val = '') {
    const container = document.getElementById('features-container');
    const div = document.createElement('div');
    div.style.display = 'flex';
    div.style.gap = '0.5rem';
    div.style.marginBottom = '0.5rem';
    div.innerHTML = `
        <input type="text" name="features[]" class="form-input" placeholder="e.g. 24/7 ICU" value="${val}" required>
        <button type="button" class="btn btn-danger btn-sm" onclick="this.parentElement.remove()" style="padding: 0 0.5rem;">X</button>
    `;
    container.appendChild(div);
}

function addService(name = '', price = '') {
    const container = document.getElementById('services-container');
    const div = document.createElement('div');
    div.style.display = 'flex';
    div.style.gap = '0.5rem';
    div.style.marginBottom = '0.5rem';
    const id = Date.now() + Math.floor(Math.random() * 1000);
    div.innerHTML = `
        <input type="text" name="services[${id}][name]" class="form-input" placeholder="Service Name" value="${name}" required>
        <input type="number" step="0.01" name="services[${id}][price]" class="form-input" placeholder="Price" value="${price}" style="width: 100px;" required>
        <button type="button" class="btn btn-danger btn-sm" onclick="this.parentElement.remove()" style="padding: 0 0.5rem;">X</button>
    `;
    container.appendChild(div);
}

window.onload = () => {
    addFeature();
    addService();
};
</script>
@endsection

