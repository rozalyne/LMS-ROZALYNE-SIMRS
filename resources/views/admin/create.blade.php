<!-- resources/views/admin/users/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold">Create New User</h1>
        <form action="{{ route('admin.users.store') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="mt-1 block w-full border-gray-300 rounded-md" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create User</button>
        </form>
    </div>
@endsection
