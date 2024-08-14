<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cultivo extends Model
{
    use HasFactory;

    protected $table = 'Cultivos';
    protected $primaryKey = 'IDCultivo';
    public $timestamps = false; // Si no tienes columnas de created_at y updated_at

    protected $fillable = [
        'NombreCultivo',
        'FechaPlantacion',
        'IDParcela',
    ];

    public function parcela()
    {
        return $this->belongsTo(Parcela::class, 'IDParcela', 'IDParcela');
    }
}
