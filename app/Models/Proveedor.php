<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Proveedor extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'email',
        'imagen',
        'empresa_id'
    ];

    public function empresa():BelongsTo
    {
        return $this->belongsTo(Empresa::class);
    }
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
