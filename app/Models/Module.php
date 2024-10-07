<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    // Menentukan kolom yang bisa diisi secara massal
    protected $fillable = ['course_id', 'title', 'content', 'order'];

    /**
     * Relasi ke Course (1-N): Satu module dimiliki oleh satu course.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Mendapatkan modul berikutnya dalam urutan course.
     * Mengambil modul dengan `order` yang lebih besar dari modul saat ini.
     *
     * @return Module|null
     */
    public function nextModule()
    {
        return Module::where('course_id', $this->course_id)  // Cari modul dalam course yang sama
                     ->where('order', '>', $this->order)      // Cari modul dengan order lebih besar
                     ->orderBy('order', 'asc')                // Urutkan berdasarkan order yang terkecil
                     ->first();                               // Ambil modul berikutnya, jika ada
    } 2

    /**
     * Mendapatkan modul sebelumnya dalam urutan course.
     * Mengambil modul dengan `order` yang lebih kecil dari modul saat ini.
     *
     * @return Module|null
     */
    public function previousModule()
    {
        return Module::where('course_id', $this->course_id)  // Cari modul dalam course yang sama
                     ->where('order', '<', $this->order)      // Cari modul dengan order lebih kecil
                     ->orderBy('order', 'desc')               // Urutkan dari order terbesar
                     ->first();                               // Ambil modul sebelumnya, jika ada
    }
}
