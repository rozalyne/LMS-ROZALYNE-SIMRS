@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Module for {{ $course->name }}</h1>

    <form action="{{ route('admin.modules.store', $course) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Module Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create Module</button>
    </form>
</div>
@endsection
