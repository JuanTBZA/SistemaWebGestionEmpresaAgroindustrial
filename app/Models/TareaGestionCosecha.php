<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TareaGestionCosecha extends Model
{
    use HasFactory;

    protected $table = 'TareasGestionCosechas';
    protected $primaryKey = 'IDTarea';
    public $timestamps = false; // Si no tienes columnas de created_at y updated_at

    protected $fillable = [
        'IDCosecha',
        'FechaInicio',
        'FechaFin',
        'Descripcion',
        'Completada',
    ];

    // Define el tipo de dato para la columna 'Completada'
    protected $casts = [
        'Completada' => 'boolean',
    ];

    public function cosecha()
    {
        return $this->belongsTo(Cosecha::class, 'IDCosecha', 'IDCosecha');
    }
}
