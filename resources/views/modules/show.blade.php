@extends('layouts.app')

@section('title', 'Detail Modul')

@section('content')
    <h2>{{ $module->title }}</h2>
    <p>{{ $module->content }}</p>

    @if ($progress)
        <p>Status: Selesai</p>
    @else
        <form action="{{ route('modules.complete', [$course->id, $module->id]) }}" method="POST">
            @csrf
            <button type="submit">Tandai sebagai Selesai</button>
        </form>
    @endif

    @if ($nextModule)
    <a href="{{ route('admin.courses.modules.show', [$course->id, $nextModule->id]) }}">Modul Selanjutnya</a>

    @endif
@endsection
