<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'subject_id'];

    // Relación de muchos a uno con la materia
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    // Relación de uno a muchos con las comisiones
    public function commissions()
    {
        return $this->hasMany(Commission::class);
    }

    // Relación de muchos a muchos con los estudiantes
    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_student')->withPivot('commission_id');
    }
}
