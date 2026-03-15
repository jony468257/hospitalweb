@extends('tyro-dashboard::layouts.admin')

@section('title', 'Manage Medicine Inventory')

@section('breadcrumb')
<a href="{{ route('pharmacy-owner.dashboard') }}">Dashboard</a>
<span class="breadcrumb-separator">/</span>
<span>Medicine Inventory</span>
@endsection

@section('content')
<div class="page-header">
    <div class="page-header-row">
        <div>
            <h1 class="page-title">Medicine Inventory</h1>
            <p class="page-description">Manage pricing and stock for medicines in your pharmacies.</p>
        </div>
        <a href="{{ route('pharmacy-owner.medicines.create') }}" class="btn btn-primary">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Add Medicine to Inventory
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Inventory List</h3>
    </div>
    <div class="card-body" style="padding: 0;">
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Medicine</th>
                        <th>Pharmacy</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Discount</th>
                        <th style="text-align:right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($medicines as $item)
                    <tr>
                        <td style="font-weight: 600;">{{ $item->medicine->name }}</td>
                        <td>{{ $item->pharmacy->name }}</td>
                        <td>{{ number_format($item->price, 2) }}</td>
                        <td>
                            <span class="badge {{ $item->stock < 10 ? 'badge-danger' : 'badge-success' }}">
                                {{ $item->stock }}
                            </span>
                        </td>
                        <td>{{ $item->discount }}%</td>
                        <td style="text-align:right; display: flex; gap: 0.5rem; justify-content: flex-end;">
                            <a href="{{ route('pharmacy-owner.medicines.edit', $item) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('pharmacy-owner.medicines.destroy', $item) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 2rem;">
                            <div class="empty-state">
                                <p class="empty-state-description">No medicines in your inventory yet.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($medicines->hasPages())
    <div class="card-footer">
        {{ $medicines->links() }}
    </div>
    @endif
</div>
@endsection
