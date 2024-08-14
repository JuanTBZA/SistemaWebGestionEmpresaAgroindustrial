<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecursoAsignadoCultivo extends Model
{
    use HasFactory;

    protected $table = 'RecursosAsignadosCultivos';
    protected $primaryKey = 'IDRecursoAsignado';
    public $timestamps = false; // Si no tienes columnas de created_at y updated_at

    protected $fillable = [
        'IDCultivo',
        'IDRecurso',
        'CantidadUtilizada',
    ];

    public function cultivo()
    {
        return $this->belongsTo(Cultivo::class, 'IDCultivo', 'IDCultivo');
    }

    public function recurso()
    {
        return $this->belongsTo(Recurso::class, 'IDRecurso', 'IDRecurso');
    }
}
