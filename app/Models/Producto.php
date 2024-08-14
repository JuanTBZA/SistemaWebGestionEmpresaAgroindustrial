<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'codigo',
        'nombre',
        'proveedor', //es el idprovedor
        'stock',
        'precio',
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor', 'id');
    }
}