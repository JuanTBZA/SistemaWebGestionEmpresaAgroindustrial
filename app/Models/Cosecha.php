<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cosecha extends Model
{
    use HasFactory;

    protected $table = 'Cosechas';
    protected $primaryKey = 'IDCosecha';
    public $timestamps = false; // Si no tienes columnas de created_at y updated_at

    protected $fillable = [
        'IDCultivo',
        'FechaCosecha',
        'CantidadCosechada',
    ];

    public function cultivo()
    {
        return $this->belongsTo(Cultivo::class, 'IDCultivo', 'IDCultivo');
    }
}
