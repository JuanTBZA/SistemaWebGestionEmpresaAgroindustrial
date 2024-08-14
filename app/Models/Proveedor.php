<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedor';
    protected $primaryKey = 'id';
    public $timestamps = false; // Si no tienes columnas de created_at y updated_at

    protected $fillable = [
        'ruc',
        'nombre',
        'telefono',
        'direccion',
    ];
}
