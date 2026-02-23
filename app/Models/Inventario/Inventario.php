<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $connection = 'inventario';
    protected $table = 'staging_inventario';
    protected $primaryKey = 'id_equipo';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'bn_id',
        'inventario',
        'bn_anterior',
        'bn_desc',
        'bn_marca',
        'bn_modelo',
        'bn_serie',
        'laboratorio',
        'departamento',
        'division',
        'edificio',
        'detalle_ubicacion',
        'nombre',
        'a_paterno',
        'a_materno',
        'telefono',
        'extension',
        'correo'
    ];
}
