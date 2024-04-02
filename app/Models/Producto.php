<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'fecha_caducidad',
        'precio_compra',
        'precio_venta',
        'stock',
        'imagen',
        'codigo_barras',
        'clavesat',
        'proveedor_id',

    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

}
