@extends('layouts.admin')

@section('title', 'Course Details')

@section('content')
    <h1 class="text-2xl font-bold mb-4">{{ $course->name }}</h1>
    <p class="mb-4">{{ $course->description }}</p>

    <h2 class="text-xl font-bold mb-2">Modules</h2>
    <a href="{{ route('admin.courses.modules.create', $course) }}" class="bg-blue-500 text-white py-2 px-4 rounded mb-4 inline-block">Add Module</a>

    <table class="min-w-full bg-white border border-gray-300 rounded">
        <thead>
            <tr>
                <th class="py-2 border-b">ID</th>
                <th class="py-2 border-b">Title</th>
                <th class="py-2 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($modules as $module)
                <tr>
                    <td class="py-2 border-b text-center">{{ $module->id }}</td>
                    <td class="py-2 border-b">{{ $module->title }}</td>
                    <td class="py-2 border-b text-center">
                        <a href="{{ route('admin.courses.modules.show', [$course, $module]) }}" class="text-blue-500">View</a>
                        <a href="{{ route('admin.courses.modules.edit', [$course, $module]) }}" class="text-yellow-500 ml-4">Edit</a>
                        <form action="{{ route('admin.courses.modules.destroy', [$course, $module]) }}" method="POST" class="inline">
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
