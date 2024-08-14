<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroPlaga extends Model
{
    use HasFactory;

    protected $table = 'RegistroPlagas';
    protected $primaryKey = 'IDRegistro';
    public $timestamps = false; // Si no tienes columnas de created_at y updated_at

    protected $fillable = [
        'IDPlaga',
        'IDCultivo',
        'FechaDeteccion',
        'Severidad',
    ];

    public function plaga()
    {
        return $this->belongsTo(Plaga::class, 'IDPlaga', 'IDPlaga');
    }

    public function cultivo()
    {
        return $this->belongsTo(Cultivo::class, 'IDCultivo', 'IDCultivo');
    }
}
