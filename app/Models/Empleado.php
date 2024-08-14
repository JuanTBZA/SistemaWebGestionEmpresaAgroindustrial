<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'Empleados';
    protected $primaryKey = 'ID';
    public $timestamps = false; // Si no tienes columnas de created_at y updated_at

    protected $fillable = [
        'Nombre',
        'Cargo',
        'DNI',
        'FechaContratacion',
    ];
}
