<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riego extends Model
{
    use HasFactory;

    protected $table = 'Riegos';
    protected $primaryKey = 'IDRiego';
    public $timestamps = false; // Si no tienes columnas de created_at y updated_at

    protected $fillable = [
        'IDCultivo',
        'FechaRiego',
        'Duracion',
        'CantidadAguaUtilizada',
    ];

    public function cultivo()
    {
        return $this->belongsTo(Cultivo::class, 'IDCultivo', 'IDCultivo');
    }
}
