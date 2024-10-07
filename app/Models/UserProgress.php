<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProgress extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'module_id', 'completed']; // Pastikan ini sesuai dengan migrasi

    // Relasi ke pengguna
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke modul
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}

