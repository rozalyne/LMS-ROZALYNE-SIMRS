<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['section_id', 'course_id', 'title', 'content', 'order'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function nextModule()
    {
        return Module::where('course_id', $this->course_id)
                     ->where('order', '>', $this->order)
                     ->orderBy('order', 'asc')
                     ->first();
    }

    public function previousModule()
    {
        return Module::where('course_id', $this->course_id)
                     ->where('order', '<', $this->order)
                     ->orderBy('order', 'desc')
                     ->first();
    }
}
