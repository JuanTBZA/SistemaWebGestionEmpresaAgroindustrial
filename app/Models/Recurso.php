<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    use HasFactory;

    protected $table = 'Recursos';
    protected $primaryKey = 'IDRecurso';
    public $timestamps = false; // Si no tienes columnas de created_at y updated_at

    protected $fillable = [
        'NombreRecurso',
        'Descripcion',
    ];
}
