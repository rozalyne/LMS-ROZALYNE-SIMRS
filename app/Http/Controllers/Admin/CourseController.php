<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all(); // Fetch all courses
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create'); // Return the view to create a new course
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Create a new course
        Course::create($request->only('name', 'description'));

        // Redirect or return response
        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');
    }

    public function show(Course $course)
    {
        return view('admin.courses.show', compact('course')); // Return the view to show the course details
    }

    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course')); // Return the view to edit the course
    }

    public function update(Request $request, Course $course)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Update the course
        $course->update($request->only('name', 'description'));

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->delete(); // Delete the course
        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully.');
    }
}
