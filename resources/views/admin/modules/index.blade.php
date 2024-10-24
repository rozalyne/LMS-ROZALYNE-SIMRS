@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold">Modules for {{ $course->name }}</h1>

        <div class="mt-6">
            <ul class="space-y-4">
                @foreach($modules as $module)
                    <li>
                        <a href="{{ route('admin.modules.show', [$course->id, $module->id]) }}" class="text-blue-500 hover:underline">
                            {{ $module->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
