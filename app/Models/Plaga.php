<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plaga extends Model
{
    use HasFactory;

    protected $table = 'Plagas';
    protected $primaryKey = 'IDPlaga';
    public $timestamps = false; // Si no tienes columnas de created_at y updated_at

    protected $fillable = [
        'NombrePlaga',
        'Descripcion',
    ];
}
