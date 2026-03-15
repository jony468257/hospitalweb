@extends('tyro-dashboard::layouts.admin')

@section('title', 'Manage Doctors')

@section('breadcrumb')
<a href="{{ route('hospital-owner.dashboard') }}">Dashboard</a>
<span class="breadcrumb-separator">/</span>
<span>Manage Doctors</span>
@endsection

@section('content')
<div class="page-header">
    <div class="page-header-row">
        <div>
            <h1 class="page-title">Hospital Doctors</h1>
            <p class="page-description">Manage doctors practicing in your hospitals.</p>
        </div>
        <a href="{{ route('hospital-owner.doctors.create') }}" class="btn btn-primary">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Add Doctor
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Doctor List</h3>
    </div>
    <div class="card-body" style="padding: 0;">
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Specialization</th>
                        <th>Exp.</th>
                        <th>Hospitals</th>
                        <th style="text-align:right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($doctors as $doctor)
                    <tr>
                        <td style="font-weight: 600;">{{ $doctor->name }}</td>
                        <td>{{ $doctor->specialization }}</td>
                        <td>{{ $doctor->experience_year }} Yrs</td>
                        <td>
                            @foreach($doctor->hospitals as $h)
                                <span class="badge badge-info">{{ $h->name }}</span>
                            @endforeach
                        </td>
                        <td style="text-align:right;">
                            <a href="{{ route('hospital-owner.doctors.edit', $doctor) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 2rem;">
                            <div class="empty-state">
                                <p class="empty-state-description">No doctors found for your hospitals.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($doctors->hasPages())
    <div class="card-footer">
        {{ $doctors->links() }}
    </div>
    @endif
</div>
@endsection
