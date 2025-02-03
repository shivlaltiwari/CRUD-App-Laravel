@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-3 mb-4">User Details</h1>
    <a href="{{ route('user_details.create') }}" class="btn btn-primary mb-3">Add New User</a>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <table class="table table-bordered table-responsive-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->phone_number }}</td>
                <td>
                    <a href="{{ route('user_details.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('user_details.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?');" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
