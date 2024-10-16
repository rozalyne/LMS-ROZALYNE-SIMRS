@extends('layouts.admin')

@section('title', 'Courses')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Courses</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.courses.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded mb-4 inline-block">Create New Course</a>

    <table class="min-w-full bg-white border border-gray-300 rounded">
        <thead>
            <tr>
                <th class="py-2 border-b">ID</th>
                <th class="py-2 border-b">Name</th>
                <th class="py-2 border-b">Description</th>
                <th class="py-2 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <td class="py-2 border-b text-center">{{ $course->id }}</td>
                    <td class="py-2 border-b">{{ $course->name }}</td>
                    <td class="py-2 border-b">{{ $course->description }}</td>
                    <td class="py-2 border-b text-center">
                        <a href="{{ route('admin.courses.show', $course) }}" class="text-blue-500">View</a>
                        <a href="{{ route('admin.courses.edit', $course) }}" class="text-yellow-500 ml-4">Edit</a>
                        <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 ml-4">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
