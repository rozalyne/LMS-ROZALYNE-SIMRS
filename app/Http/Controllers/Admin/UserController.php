<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Fetch all users
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create'); // Return the view to create a new user
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required|integer',
        ]);

        // Create a new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password before saving
            'role_id' => $request->role_id, // Use the role_id from the request
        ]);

        // Redirect or return response
        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user')); // Return the view to edit the user
    }

    public function update(Request $request, User $user)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role_id' => 'required|integer',
        ]);

        // Update the user
        $user->update($request->only('name', 'email', 'role_id'));

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete(); // Delete the user
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
