@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modules for {{ $course->name }}</h1>

    @if($modules->isEmpty())
        <p>No modules available for this course.</p>
    @else
        <ul>
            @foreach($modules as $module)
                <li>
                    <a href="{{ route('courses.modules.show', [$course->id, $module->id]) }}">{{ $module->title }}</a>
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('admin.courses.show', $course->id) }}" class="btn btn-secondary">Back to Course</a>
</div>
@endsection
