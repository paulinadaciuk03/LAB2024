<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relación de uno a muchos con los cursos
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
