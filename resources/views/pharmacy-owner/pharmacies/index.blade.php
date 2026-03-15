@extends('tyro-dashboard::layouts.admin')

@section('title', 'Manage My Pharmacies')

@section('breadcrumb')
<a href="{{ route('pharmacy-owner.dashboard') }}">Dashboard</a>
<span class="breadcrumb-separator">/</span>
<span>My Pharmacies</span>
@endsection

@section('content')
<div class="page-header">
    <div class="page-header-row">
        <div>
            <h1 class="page-title">Manage Pharmacies</h1>
            <p class="page-description">Create and manage your pharmacy information.</p>
        </div>
        <a href="{{ route('pharmacy-owner.pharmacies.create') }}" class="btn btn-primary">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Add New Pharmacy
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Pharmacy List</h3>
    </div>
    <div class="card-body" style="padding: 0;">
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Pharmacy Name</th>
                        <th>Location</th>
                        <th>License No</th>
                        <th style="text-align:right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pharmacies as $pharmacy)
                    <tr>
                        <td style="font-weight: 600;">{{ $pharmacy->name }}</td>
                        <td>{{ $pharmacy->thana->name ?? '—' }}</td>
                        <td>{{ $pharmacy->license_no ?? '—' }}</td>
                        <td style="text-align:right; display: flex; gap: 0.5rem; justify-content: flex-end;">
                            <a href="{{ route('pharmacy-owner.pharmacies.edit', $pharmacy) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('pharmacy-owner.pharmacies.destroy', $pharmacy) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="text-align: center; padding: 2rem;">
                            <div class="empty-state">
                                <p class="empty-state-description">No pharmacies found. Start by adding one!</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($pharmacies->hasPages())
    <div class="card-footer">
        {{ $pharmacies->links() }}
    </div>
    @endif
</div>
@endsection
