@extends('layouts.app')

@section('title', $course->name)

@section('content')
<div class="max-w-5xl mx-auto p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold mb-4">{{ $course->name }}</h1>
    <p class="text-lg text-gray-700 mb-6">{{ $course->description }}</p>

    <h2 class="text-2xl font-semibold mb-4">Modules</h2>
    <ul class="list-disc list-inside space-y-2">
        @foreach($course->modules as $module)
            <li>
                <a href="{{ route('admin.courses.modules.show', [$course->id, $module->id]) }}"
                   class="text-blue-500 hover:underline">
                    {{ $module->title }}
                </a>
            </li>
        @endforeach
    </ul>

    <div class="mt-6">
        <a href="{{ route('admin.courses.modules.create', $course->id) }}"
           class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-200">
            Tambah Modul Baru
        </a>
    </div>
</div>
@endsection
