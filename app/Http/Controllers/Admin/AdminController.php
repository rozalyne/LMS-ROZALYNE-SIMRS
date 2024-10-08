<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Module;
use App\Models\Section;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Tampilkan dashboard admin.
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    /**
     * Tampilkan semua kursus yang ada.
     */
    public function indexCourses()
    {
        $courses = Course::all(); // Mengambil semua kursus
        return view('admin.courses.index', compact('courses')); // Mengembalikan view dengan data kursus
    }

    /**
     * Tampilkan formulir untuk membuat kursus baru.
     */
    public function createCourse()
    {
        return view('admin.courses.create');
    }

    /**
     * Simpan kursus baru ke dalam penyimpanan.
     */
    public function storeCourse(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Course::create($request->only('name', 'description')); // Membuat kursus baru

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.'); // Mengarahkan kembali ke indeks kursus dengan pesan sukses
    }

    /**
     * Tampilkan formulir untuk membuat section baru.
     */
    public function createSection()
    {
        $courses = Course::all(); // Mengambil semua kursus untuk pilihan
        return view('admin.sections.create', compact('courses')); // Mengembalikan view dengan data kursus
    }

    /**
     * Simpan section baru ke dalam penyimpanan.
     */
    public function storeSection(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id', // Validasi bahwa course_id ada dalam tabel courses
            'title' => 'required|string|max:255',
        ]);

        Section::create($request->only('course_id', 'title')); // Membuat section baru

        return redirect()->route('admin.courses.index')->with('success', 'Section created successfully.'); // Mengarahkan kembali ke indeks kursus dengan pesan sukses
    }

    /**
     * Tampilkan formulir untuk membuat modul baru untuk sebuah section.
     *
     * @param int $sectionId
     */
    public function createModule($sectionId)
    {
        $section = Section::findOrFail($sectionId); // Mencari section berdasarkan ID
        return view('admin.modules.create', compact('section')); // Mengembalikan view dengan data section
    }

    /**
     * Simpan modul baru ke dalam penyimpanan.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $sectionId
     */
    public function storeModule(Request $request, $sectionId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'order' => 'required|integer',
        ]);

        $module = new Module($request->only('title', 'content', 'order')); // Membuat modul baru
        $module->section_id = $sectionId; // Menetapkan ID section
        $module->save(); // Menyimpan modul

        return redirect()->route('admin.modules.index')->with('success', 'Module created successfully.'); // Mengarahkan kembali ke indeks modul dengan pesan sukses
    }

    /**
     * Tampilkan formulir untuk mengedit kursus.
     *
     * @param int $id
     */
    public function editCourse($id)
    {
        $course = Course::findOrFail($id); // Mencari kursus berdasarkan ID
        return view('admin.courses.edit', compact('course')); // Mengembalikan view untuk mengedit kursus
    }

    /**
     * Perbarui kursus yang ada dalam penyimpanan.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     */
    public function updateCourse(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $course = Course::findOrFail($id); // Mencari kursus berdasarkan ID
        $course->update($request->all()); // Memperbarui data kursus

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.'); // Mengarahkan kembali ke indeks kursus dengan pesan sukses
    }

    /**
     * Hapus kursus dari penyimpanan.
     *
     * @param int $id
     */
    public function destroyCourse($id)
    {
        $course = Course::findOrFail($id); // Mencari kursus berdasarkan ID
        $course->delete(); // Menghapus kursus

        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully.'); // Mengarahkan kembali ke indeks kursus dengan pesan sukses
    }
}
