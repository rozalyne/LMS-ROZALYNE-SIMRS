<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description']; // Pastikan field sesuai dengan yang ada di migration

    // Relasi ke modul
    public function modules()
    {
        return $this->hasMany(Module::class); // Menghubungkan course ke banyak modul
    }
}
