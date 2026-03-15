@extends('tyro-dashboard::layouts.admin')

@section('title', 'Global Doctor List')

@section('breadcrumb')
<a href="{{ route('admin.dashboard') }}">Dashboard</a>
<span class="breadcrumb-separator">/</span>
<span>Doctors</span>
@endsection

@section('content')
<div class="page-header">
    <div class="page-header-row">
        <div>
            <h1 class="page-title">Global Doctors</h1>
            <p class="page-description">Manage all doctors registered across all hospitals.</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Doctor Directory</h3>
    </div>
    <div class="card-body" style="padding: 0;">
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Specialization</th>
                        <th>Hospitals</th>
                        <th style="text-align:right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($doctors as $d)
                    <tr>
                        <td style="font-weight: 600;">{{ $d->name }}</td>
                        <td>{{ $d->specialization }}</td>
                        <td>
                            @foreach($d->hospitals as $h)
                                <span class="badge badge-info">{{ $h->name }}</span>
                            @endforeach
                        </td>
                        <td style="text-align:right;">
                            <form action="{{ route('admin.doctors.destroy', $d) }}" method="POST" onsubmit="return confirm('Delete this doctor record?')">
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
        {{ $doctors->links() }}
    </div>
</div>
@endsection
