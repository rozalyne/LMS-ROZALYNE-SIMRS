<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index(Course $course)
    {
        $modules = $course->modules;
        return view('admin.modules.index', compact('course', 'modules'));
    }

    public function create(Course $course)
    {
        return view('admin.modules.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'order' => 'required|integer',
        ]);

        $course->modules()->create($validatedData);
        return redirect()->route('admin.courses.modules.index', $course)->with('success', 'Module created successfully!');
    }

    public function show(Course $course, Module $module)
    {
        $nextModule = $module->nextModule();
        $previousModule = $module->previousModule();
        return view('admin.modules.show', compact('course', 'module', 'nextModule', 'previousModule'));
    }

    public function edit(Course $course, Module $module)
    {
        return view('admin.modules.edit', compact('course', 'module'));
    }

    public function update(Request $request, Course $course, Module $module)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'order' => 'required|integer',
        ]);

        $module->update($validatedData);
        return redirect()->route('admin.courses.modules.index', $course)->with('success', 'Module updated successfully!');
    }

    public function destroy(Course $course, Module $module)
    {
        $module->delete();
        return redirect()->route('admin.courses.modules.index', $course)->with('success', 'Module deleted successfully!');
    }
}
