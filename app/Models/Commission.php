<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use HasFactory;

    protected $fillable = ['classroom', 'schedule', 'course_id'];

    // Relación de muchos a uno con el curso
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Relación de muchos a uno con el profesor
    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }

    // Relación de muchos a muchos con los estudiantes
    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_student')->withPivot('course_id');
    }
}
