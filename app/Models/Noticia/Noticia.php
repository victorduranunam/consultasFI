<?php

namespace App\Models\Noticia;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $connection = 'Noticias';

    protected $table = 'noticias_sitio_swcc';
    protected $primaryKey = 'id_noticia';

    public $timestamps = false;

    protected $fillable = [
        'id_seccion',
        'estado_activo',
        'noticia_principal',
        'titulo',
        'sintesis',
        'autor',
        'fotografo',
        'fecha_publicacion',
        'contenido_noticia',
        'direccion_foto_principal',
        'direccion_mini_foto',
        'pie_imagen',
        'id_admin'
    ];
}
