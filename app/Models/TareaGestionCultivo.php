<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TareaGestionCultivo extends Model
{
    use HasFactory;

    protected $table = 'TareasGestionCultivos';
    protected $primaryKey = 'IDTarea';
    public $timestamps = false; // Si no tienes columnas de created_at y updated_at

    protected $fillable = [
        'IDCultivo',
        'FechaInicio',
        'FechaFin',
        'Descripcion',
        'Completada',
    ];

    // Define el tipo de dato para la columna 'Completada'
    protected $casts = [
        'Completada' => 'boolean',
    ];

    public function cultivo()
    {
        return $this->belongsTo(Cultivo::class, 'IDCultivo', 'IDCultivo');
    }
}
