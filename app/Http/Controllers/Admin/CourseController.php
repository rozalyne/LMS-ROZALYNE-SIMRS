<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $course = Course::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');
    }

    public function show(Course $course)
    {
        return view('admin.courses.show', compact('course'));
    }

    public function createModule(Course $course)
    {
        return view('admin.modules.create', compact('course'));
    }

    public function storeModule(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $module = Module::create([
            'course_id' => $course->id,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('admin.courses.show', $course)->with('success', 'Module created successfully.');
    }
}
