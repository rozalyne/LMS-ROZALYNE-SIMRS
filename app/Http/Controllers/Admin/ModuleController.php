<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Module;

class ModuleController extends Controller
{
    public function index(Course $course)
    {
        $modules = $course->modules; // Retrieve modules associated with the course
        return view('admin.modules.index', compact('course', 'modules'));
    }

    public function show(Course $course, Module $module)
    {
        return view('admin.modules.show', compact('course', 'module'));
    }

    // Add other methods as needed for creating or storing modules
}

