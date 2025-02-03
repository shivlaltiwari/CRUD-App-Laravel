<?php

namespace App\Http\Controllers;

use App\Models\UserDetail;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{
    // Display a listing of the user details.
    public function index()
    {
        $users = UserDetail::all();
        return view('user_details.index', compact('users'));
    }

    // Show the form for creating a new user detail.
    public function create()
    {
        return view('user_details.create');
    }

    // Store a newly created user detail in storage.
    public function store(Request $request)
    {
        $request->validate([
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'address'      => 'nullable|string',
            'phone_number' => 'required|string|max:20',
        ]);

        UserDetail::create($request->all());

        return redirect()->route('user_details.index')->with('success', 'User created successfully.');
    }

    // Show the form for editing the specified user detail.
    public function edit(UserDetail $user_detail)
    {
        return view('user_details.edit', compact('user_detail'));
    }

    // Update the specified user detail in storage.
    public function update(Request $request, UserDetail $user_detail)
    {
        $request->validate([
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'address'      => 'nullable|string',
            'phone_number' => 'required|string|max:20',
        ]);

        $user_detail->update($request->all());

        return redirect()->route('user_details.index')->with('success', 'User updated successfully.');
    }

    // Remove the specified user detail from storage.
    public function destroy(UserDetail $user_detail)
    {
        $user_detail->delete();
        return redirect()->route('user_details.index')->with('success', 'User deleted successfully.');
    }
}
