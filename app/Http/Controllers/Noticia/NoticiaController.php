<?php

namespace App\Http\Controllers\Noticia;

use App\Http\Controllers\Controller;
use App\Models\Noticia\Noticia;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NoticiaController extends Controller
{
    /**
     * GET /api/noticias
     * Listar noticias activas
     */
    public function index()
    {
        return response()->json(
            Noticia::where('estado_activo', 1)->get(),
            Response::HTTP_OK
        );
    }

   

   public function show($id)
    {
        // 1. Buscamos la noticia por su ID y que esté activa
        $noticia = Noticia::where('id_noticia', $id)
                          ->where('estado_activo', 1)
                          ->first();

        


    //2.0  Si no existe, devolvemos un arreglo vacío con un 200 OK
    if (!$noticia) {
        return response()->json([], Response::HTTP_OK);
    }


        // 3. Si existe, devolvemos la noticia con éxito
        return response()->json($noticia, Response::HTTP_OK);
    } 






    
public function latest($n)
{
    // Validamos que 'n' sea un número para evitar errores
    if (!is_numeric($n) || $n <= 0) {
        return response()->json(['error' => 'El número de noticias debe ser un entero positivo'], 400);
    }

    $noticias = Noticia::where('estado_activo', 1)
        // Ordenamos por fecha de publicación (o id_noticia si prefieres el orden de inserción)
        ->orderBy('fecha_publicacion', 'desc') 
        ->limit($n)
        ->get();

    return response()->json($noticias, Response::HTTP_OK);
}




}
