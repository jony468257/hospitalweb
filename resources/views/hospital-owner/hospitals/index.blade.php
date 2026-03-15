@extends('tyro-dashboard::layouts.admin')

@section('title', 'Manage My Hospitals')

@section('breadcrumb')
<a href="{{ route('hospital-owner.dashboard') }}">Dashboard</a>
<span class="breadcrumb-separator">/</span>
<span>My Hospitals</span>
@endsection

@section('content')
<div class="page-header">
    <div class="page-header-row">
        <div>
            <h1 class="page-title">Manage Hospitals</h1>
            <p class="page-description">Create and manage your hospital information.</p>
        </div>
        <a href="{{ route('hospital-owner.hospitals.create') }}" class="btn btn-primary">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Add New Hospital
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Hospital List</h3>
    </div>
    <div class="card-body" style="padding: 0;">
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Hospital Name</th>
                        <th>Location</th>
                        <th>Phone</th>
                        <th style="text-align:right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($hospitals as $hospital)
                    <tr>
                        <td style="font-weight: 600;">{{ $hospital->name }}</td>
                        <td>{{ $hospital->thana->name ?? '—' }}</td>
                        <td>{{ $hospital->phone ?? '—' }}</td>
                        <td style="text-align:right; display: flex; gap: 0.5rem; justify-content: flex-end;">
                            <a href="{{ route('hospital-owner.hospitals.edit', $hospital) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('hospital-owner.hospitals.destroy', $hospital) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
                                <p class="empty-state-description">No hospitals found. Start by adding one!</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($hospitals->hasPages())
    <div class="card-footer">
        {{ $hospitals->links() }}
    </div>
    @endif
</div>
@endsection
