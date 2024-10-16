@extends('layouts.admin')

@section('title', 'Create Course')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Create New Course</h1>

    <form action="{{ route('admin.courses.store') }}" method="POST" class="bg-white p-4 rounded shadow">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Course Name</label>
            <input type="text" id="name" name="name" required class="mt-1 block w-full border border-gray-300 rounded p-2" placeholder="Enter course name">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" required class="mt-1 block w-full border border-gray-300 rounded p-2" placeholder="Enter course description"></textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Create Course</button>
    </form>
@endsection
