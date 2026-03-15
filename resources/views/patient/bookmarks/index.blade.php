@extends('tyro-dashboard::layouts.admin')

@section('title', 'My Bookmarks')

@section('breadcrumb')
<a href="{{ route('patient.dashboard') }}">Dashboard</a>
<span class="breadcrumb-separator">/</span>
<span>Bookmarks</span>
@endsection

@section('content')
<div class="page-header">
    <div class="page-header-row">
        <div>
            <h1 class="page-title">My Bookmarks</h1>
            <p class="page-description">Quick access to your preferred doctors and hospitals.</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Saved Items</h3>
    </div>
    <div class="card-body" style="padding: 0;">
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Details</th>
                        <th style="text-align:right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookmarks as $bookmark)
                    <tr>
                        <td>
                            <span class="badge {{ $bookmark->bookmarkable_type === 'App\Models\Doctor' ? 'badge-primary' : 'badge-info' }}">
                                {{ $bookmark->bookmarkable_type === 'App\Models\Doctor' ? 'Doctor' : 'Hospital' }}
                            </span>
                        </td>
                        <td style="font-weight: 600;">{{ $bookmark->bookmarkable->name ?? 'N/A' }}</td>
                        <td>
                            @if($bookmark->bookmarkable_type === 'App\Models\Doctor')
                                {{ $bookmark->bookmarkable->specialization ?? '—' }}
                            @else
                                {{ $bookmark->bookmarkable->address ?? '—' }}
                            @endif
                        </td>
                        <td style="text-align:right;">
                            <form action="{{ route('patient.bookmarks.destroy', $bookmark) }}" method="POST" onsubmit="return confirm('Remove this bookmark?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="text-align: center; padding: 2rem;">
                            <div class="empty-state">
                                <p class="empty-state-description">No bookmarks found.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($bookmarks->hasPages())
    <div class="card-footer">
        {{ $bookmarks->links() }}
    </div>
    @endif
</div>
@endsection
