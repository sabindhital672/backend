<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Display a listing of the users
    public function index()
    {
        $users = User::all(); // Fetch all users
        return view('admin.users.index', compact('users')); // Return the view with users data
    }

    // Show the form for creating a new user
    public function create()
    {
        return view('admin.users.create'); // Return the user creation form view
    }

    // Store a newly created user in storage
    public function store(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:admin,author',
        ]);

        // Hash the password before storing
        $validatedData['password'] = bcrypt($validatedData['password']);

        // Create a new user
        User::create($validatedData);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    // Show the form for editing the specified user
    public function edit($id)
    {
        $user = User::findOrFail($id); // Find the user by ID or throw a 404 error
        return view('admin.users.edit', compact('user')); // Return the user edit form view
    }

    // Update the specified user in storage
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id); // Find the user by ID or throw a 404 error

        // Validate incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|string|in:admin,author',
        ]);

        // Update the user with validated data
        $user->update($validatedData);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    // Remove the specified user from storage
    public function destroy($id)
    {
        $user = User::findOrFail($id); // Find the user by ID or throw a 404 error
        $user->delete(); // Delete the user

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
