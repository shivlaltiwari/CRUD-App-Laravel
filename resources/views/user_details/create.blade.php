@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-3 mb-4">Add New User</h1>
    <form action="{{ route('user_details.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" class="form-control"></textarea>
        </div>
        
        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" name="phone_number" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection
