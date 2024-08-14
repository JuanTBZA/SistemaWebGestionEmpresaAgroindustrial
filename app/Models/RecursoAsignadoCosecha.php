<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecursoAsignadoCosecha extends Model
{
    use HasFactory;

    protected $table = 'RecursosAsignadosCosechas';
    protected $primaryKey = 'IDInventario';
    public $timestamps = false; // Si no tienes columnas de created_at y updated_at

    protected $fillable = [
        'IDCosecha',
        'IDRecurso',
        'CantidadUtilizada',
    ];

    public function cosecha()
    {
        return $this->belongsTo(Cosecha::class, 'IDCosecha', 'IDCosecha');
    }

    public function recurso()
    {
        return $this->belongsTo(Recurso::class, 'IDRecurso', 'IDRecurso');
    }
}
