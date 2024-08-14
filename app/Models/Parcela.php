<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcela extends Model
{
    use HasFactory;

    protected $table = 'Parcelas';
    protected $primaryKey = 'IDParcela';
    public $timestamps = false; // Si no tienes columnas de created_at y updated_at

    protected $fillable = [
        'NombreParcela',
        'Ubicacion',
        'Tamano',
    ];
}
