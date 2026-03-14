@extends('tyro-dashboard::layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Users</h1>

    <table class="w-full border">
        <thead>
            <tr>
                <th class="border p-2">Name</th>
                <th class="border p-2">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="border p-2">{{ $user->name }}</td>
                    <td class="border p-2">{{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
