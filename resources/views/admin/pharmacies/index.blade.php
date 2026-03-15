@extends('tyro-dashboard::layouts.admin')

@section('title', 'Global Pharmacy List')

@section('breadcrumb')
<a href="{{ route('admin.dashboard') }}">Dashboard</a>
<span class="breadcrumb-separator">/</span>
<span>Pharmacies</span>
@endsection

@section('content')
<div class="page-header">
    <div class="page-header-row">
        <div>
            <h1 class="page-title">Global Pharmacies</h1>
            <p class="page-description">Oversee all pharmacies and their owners.</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Pharmacy Directory</h3>
    </div>
    <div class="card-body" style="padding: 0;">
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Pharmacy Name</th>
                        <th>Owner</th>
                        <th>Phone</th>
                        <th style="text-align:right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pharmacies as $p)
                    <tr>
                        <td style="font-weight: 600;">{{ $p->name }}</td>
                        <td>{{ $p->owner->name ?? 'N/A' }}</td>
                        <td>{{ $p->phone ?? '—' }}</td>
                        <td style="text-align:right;">
                            <form action="{{ route('admin.pharmacies.destroy', $p) }}" method="POST" onsubmit="return confirm('Delete this pharmacy?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        {{ $pharmacies->links() }}
    </div>
</div>
@endsection
