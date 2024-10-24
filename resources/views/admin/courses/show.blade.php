<!-- resources/views/courses/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6">{{ $course->name }}</h1>
    <p class="text-lg mb-6">{{ $course->description }}</p>

    <h2 class="text-2xl font-semibold mb-4">Modules</h2>
    <ul class="list-disc list-inside">
        @foreach($course->modules as $module)
            <li class="mb-2">
                <a href="{{ route('admin.courses.modules.show', [$course->id, $module->id]) }}" class="text-blue-500 hover:underline">
                    {{ $module->title }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
