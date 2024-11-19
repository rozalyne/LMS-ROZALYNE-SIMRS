<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Module;
use App\Models\UserProgress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    // Method to display the list of modules for a specific course
    public function index(Course $course)
    {
        // Fetch all modules for the given course
        $modules = $course->modules; // Assuming a relationship exists in the Course model

        return view('admin.modules.index', compact('course', 'modules'));
    }

    // Method to show a specific module
    public function show(Course $course, Module $module)
    {
        $userId = Auth::id(); // Use Auth facade to get the user ID

        // Fetch next and previous modules
        $nextModule = $module->nextModule();
        $previousModule = $module->previousModule();

        // Cek apakah modul sebelumnya sudah diselesaikan
        if ($previousModule && !$this->checkProgress($previousModule, $userId)) {
            return redirect()->route('admin.courses.modules.index', $course)
                ->with('error', 'Silakan selesaikan modul sebelumnya terlebih dahulu.');
        }

        // Tandai modul saat ini sebagai selesai jika diakses
        $this->markAsComplete($userId, $module->id);

        // Cek apakah modul saat ini sudah diselesaikan
        $progress = $this->checkProgress($module, $userId);

        // Redirect ke modul berikutnya jika modul saat ini sudah selesai
        if (!$nextModule) {
            $nextCourse = Course::where('id', '>', $course->id)->first();
            if ($nextCourse) {
                return redirect()->route('admin.courses.modules.index', $nextCourse)
                    ->with('success', 'Anda telah menyelesaikan semua modul di kursus ini. Mengalihkan ke kursus berikutnya.');
            } else {
                return redirect()->route('admin.courses.index')
                    ->with('info', 'Anda telah menyelesaikan semua kursus.');
            }
        }

        // Mengembalikan tampilan dengan data yang diperlukan
        return view('admin.modules.show', compact('course', 'module', 'nextModule', 'previousModule', 'progress'));
    }

    // Method to check if the user has completed the given module
    protected function checkProgress(Module $module, $userId)
    {
        return UserProgress::where('user_id', $userId)
            ->where('module_id', $module->id)
            ->where('progress', true)
            ->exists();
    }

    // Method to mark a module as complete for the user
    protected function markAsComplete($userId, $moduleId)
    {
        UserProgress::updateOrCreate(
            ['user_id' => $userId, 'module_id' => $moduleId],
            ['progress' => true]
        );
    }

    public function complete(Course $course, Module $module)
    {
        $userId = Auth::id(); // Mendapatkan ID pengguna yang sedang login

        // Tandai modul ini sebagai selesai untuk pengguna saat ini
        UserProgress::updateOrCreate(
            ['user_id' => $userId, 'module_id' => $module->id],
            ['progress' => true]
        );

        // Redirect kembali ke tampilan modul dengan pesan sukses
        return redirect()->route('admin.courses.modules.show', [$course->id, $module->id])
            ->with('success', 'Modul telah ditandai sebagai selesai.');
    }
}
