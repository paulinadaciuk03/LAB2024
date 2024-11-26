<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CourseStudent extends Pivot
{
    use HasFactory;

    protected $fillable = ['student_id', 'course_id', 'commission_id'];
}
