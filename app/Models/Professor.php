<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relación de uno a muchos con las comisiones
    public function commissions()
    {
        return $this->hasMany(Commission::class);
    }
}
