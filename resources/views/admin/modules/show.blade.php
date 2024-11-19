@extends('layouts.app')

@section('title', $module->title . ' - ' . $course->name)

@section('content')
    <div class="max-w-5xl mx-auto p-6 bg-white rounded-lg shadow-lg">
        <!-- Header -->
        <h1 class="text-4xl font-bold text-gray-800 mb-2">{{ $module->title }}</h1>
        <p class="text-gray-600 mb-4">{{ $module->content }}</p>

        <div class="mb-6">
            <h2 class="text-2xl font-semibold text-gray-700">Module Progress</h2>
            <div class="mt-2">
                @if ($progress)
                    <span class="text-green-600 font-semibold">Completed</span>
                @else
                    <span class="text-red-600 font-semibold">Not Completed</span>
                @endif
            </div>
        </div>

        <!-- Inside the Blade template for showing a module -->
        <div class="flex justify-between mt-8">
            @if ($previousModule)
                <a href="{{ route('admin.courses.modules.show', [$course->id, $previousModule->id]) }}"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded transition duration-200">
                    Kursus Sebelumnya: {{ $previousModule->title }}
                </a>
            @endif

            @if ($nextModule)
                <a href="{{ route('admin.courses.modules.show', [$course->id, $nextModule->id]) }}"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded transition duration-200">
                    Kursus Selanjutnya: {{ $nextModule->title }}
                </a>
            @endif

            <form action="{{ route('admin.courses.modules.complete', [$course->id, $module->id]) }}" method="POST">
                @csrf
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-200">
                    Tandai Sebagai Lengkap
                </button>
            </form>
        </div>
    </div>
@endsection
