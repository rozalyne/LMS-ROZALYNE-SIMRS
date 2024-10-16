@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modules for {{ $course->name }}</h1>

    <a href="{{ route('admin.modules.create', $course) }}" class="btn btn-primary">Create New Module</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2>Module List</h2>
    <ul class="space-y-4">
        @if($modules->isEmpty())
            <li>No modules available for this course.</li>
        @else
            @foreach($modules as $module)
                <li class="border p-4 rounded shadow">
                    <h3 class="font-bold">{{ $module->title }}</h3>
                    <p>{{ $module->content }}</p>
                    <a href="{{ route('admin.modules.edit', $module) }}" class="text-blue-500">Edit</a>
                    <form action="{{ route('admin.modules.destroy', $module) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Delete</button>
                    </form>
                </li>
            @endforeach
        @endif
    </ul>
</div>
@endsection
