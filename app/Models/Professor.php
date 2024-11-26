<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = ['name']; // Solo el campo 'name'

    // Relación de uno a muchos con las comisiones
    public function commissions()
    {
        return $this->hasMany(Commission::class); // Un profesor tiene muchas comisiones
    }
}
