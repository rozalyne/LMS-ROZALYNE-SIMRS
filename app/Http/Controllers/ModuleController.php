<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Course;
use App\Models\UserProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Import Log untuk debugging

class ModuleController extends Controller
{
    // Menampilkan modul dari course
    public function showModule($courseId, $moduleId)
    {
        // Ambil course
        $course = Course::findOrFail($courseId);

        // Ambil module sesuai course dan moduleId
        $module = Module::where('course_id', $course->id)
                        ->where('id', $moduleId)
                        ->firstOrFail();

        // Debugging: Cek apakah module berhasil diambil
        Log::info('Module found:', ['module' => $module]);

        // Ambil progress user jika ada
        $progress = UserProgress::where('user_id', auth()->id())
                                ->where('module_id', $module->id)
                                ->first();

        // Ambil modul berikutnya
        $nextModule = $module->nextModule();

        return view('modules.show', compact('module', 'nextModule', 'progress', 'course')); // Sertakan $course
    }

    // Menandai modul sebagai selesai
    public function completeModule(Request $request, $courseId, $moduleId)
    {
        // Ambil module sesuai course dan moduleId
        $module = Module::where('course_id', $courseId)
                        ->where('id', $moduleId)
                        ->firstOrFail();

        // Tandai modul ini selesai untuk user yang login
        UserProgress::updateOrCreate(
            ['user_id' => auth()->id(), 'module_id' => $module->id],
            ['completed' => true]
        );

        // Ambil modul berikutnya
        $nextModule = $module->nextModule();

        // Jika tidak ada modul berikutnya, redirect ke halaman lain, misal halaman penyelesaian
        if (!$nextModule) {
            return redirect()->route('courses.show', $courseId)
                             ->with('status', 'Selamat! Anda telah menyelesaikan semua modul.');
        }

        return redirect()->route('modules.show', [$courseId, $nextModule->id])
                         ->with('status', 'Modul berhasil diselesaikan!');
    }
}
