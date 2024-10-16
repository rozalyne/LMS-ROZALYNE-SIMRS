@extends('layouts.app') <!-- Extend your layout file -->

@section('content') <!-- Start the content section -->
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold">Dashboard</h1>
        <p class="mt-4">Welcome to the admin dashboard! Here you can manage users and view statistics.</p>

        <div class="mt-6">
            <!-- Additional statistics or features can go here -->
        </div>

        <div class="mt-6">
            <h2 class="text-xl font-semibold">Manage Courses</h2>
            <a href="{{ route('admin.courses.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">View All Courses</a>
        </div>
    </div>
@endsection <!-- End the content section -->
