@extends('tyro-dashboard::layouts.admin')

@section('title', 'Edit Medicine Inventory')

@section('breadcrumb')
<a href="{{ route('pharmacy-owner.dashboard') }}">Dashboard</a>
<span class="breadcrumb-separator">/</span>
<a href="{{ route('pharmacy-owner.medicines.index') }}">Medicine Inventory</a>
<span class="breadcrumb-separator">/</span>
<span>Edit</span>
@endsection

@section('content')
<div class="page-header">
    <div class="page-header-row">
        <div>
            <h1 class="page-title">Edit Inventory Item</h1>
            <p class="page-description">Update pricing and stock for {{ $medicine->medicine->name }}.</p>
        </div>
    </div>
</div>

<div class="card" style="max-width: 800px;">
    <div class="card-header">
        <h3 class="card-title">Inventory Item Details</h3>
    </div>
    <form action="{{ route('pharmacy-owner.medicines.update', $medicine) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="grid-2">
                <div class="form-group">
                    <label for="pharmacy_id" class="form-label">Pharmacy</label>
                    <select id="pharmacy_id" name="pharmacy_id" class="form-input @error('pharmacy_id') is-invalid @enderror" required>
                        @foreach($pharmacies as $pharmacy)
                            <option value="{{ $pharmacy->id }}" {{ old('pharmacy_id', $medicine->pharmacy_id) == $pharmacy->id ? 'selected' : '' }}>{{ $pharmacy->name }}</option>
                        @endforeach
                    </select>
                    @error('pharmacy_id') <span class="form-error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="medicine_id" class="form-label">Medicine</label>
                    <select id="medicine_id" name="medicine_id" class="form-input @error('medicine_id') is-invalid @enderror" required>
                        @foreach($allMedicines as $med)
                            <option value="{{ $med->id }}" {{ old('medicine_id', $medicine->medicine_id) == $med->id ? 'selected' : '' }}>{{ $med->name }} ({{ $med->generic_name }})</option>
                        @endforeach
                    </select>
                    @error('medicine_id') <span class="form-error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="grid-3">
                <div class="form-group">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" step="0.01" id="price" name="price" class="form-input @error('price') is-invalid @enderror" value="{{ old('price', $medicine->price) }}" required>
                    @error('price') <span class="form-error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="stock" class="form-label">Stock Quantity</label>
                    <input type="number" id="stock" name="stock" class="form-input @error('stock') is-invalid @enderror" value="{{ old('stock', $medicine->stock) }}" required>
                    @error('stock') <span class="form-error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="discount" class="form-label">Discount % (optional)</label>
                    <input type="number" step="0.1" id="discount" name="discount" class="form-input @error('discount') is-invalid @enderror" value="{{ old('discount', $medicine->discount) }}">
                    @error('discount') <span class="form-error">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="card-footer" style="display: flex; gap: 0.75rem;">
            <button type="submit" class="btn btn-primary">Update Inventory</button>
            <a href="{{ route('pharmacy-owner.medicines.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
