<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TareaControlPlaga extends Model
{
    use HasFactory;

    protected $table = 'TareasControlPlagas';
    protected $primaryKey = 'IDTarea';
    public $timestamps = false; // Si no tienes columnas de created_at y updated_at

    protected $fillable = [
        'IDPlaga',
        'FechaInicio',
        'FechaFin',
        'Descripcion',
        'Completada',
    ];

    // Define el tipo de dato para la columna 'Completada'
    protected $casts = [
        'Completada' => 'boolean',
    ];

    public function plaga()
    {
        return $this->belongsTo(Plaga::class, 'IDPlaga', 'IDPlaga');
    }
}
