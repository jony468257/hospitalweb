@extends('tyro-dashboard::layouts.admin')

@section('title', 'Global Hospital List')

@section('breadcrumb')
<a href="{{ route('admin.dashboard') }}">Dashboard</a>
<span class="breadcrumb-separator">/</span>
<span>Hospitals</span>
@endsection

@section('content')
<div class="page-header">
    <div class="page-header-row">
        <div>
            <h1 class="page-title">Global Hospitals</h1>
            <p class="page-description">Oversee all hospitals registered on the platform.</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Hospital Directory</h3>
    </div>
    <div class="card-body" style="padding: 0;">
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Hospital Name</th>
                        <th>Owner</th>
                        <th>Status</th>
                        <th style="text-align:right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hospitals as $h)
                    <tr>
                        <td style="font-weight: 600;">{{ $h->name }}</td>
                        <td>{{ $h->owner->name ?? 'N/A' }}</td>
                        <td>
                            <span class="badge {{ $h->status === 'active' ? 'badge-success' : 'badge-danger' }}">
                                {{ ucfirst($h->status ?? 'active') }}
                            </span>
                        </td>
                        <td style="text-align:right;">
                            <form action="{{ route('admin.hospitals.toggle-status', $h) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm {{ $h->status === 'inactive' ? 'btn-outline-success' : 'btn-outline-warning' }}">
                                    {{ $h->status === 'inactive' ? 'Activate' : 'Deactivate' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        {{ $hospitals->links() }}
    </div>
</div>
@endsection
