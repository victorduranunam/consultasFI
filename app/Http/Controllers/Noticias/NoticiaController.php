<?php

namespace App\Http\Controllers\Noticias;

use App\Http\Controllers\Controller;
use App\Models\Noticia\Noticia;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;



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







public function listarNoticias(Request $request)
{
    $page = (int) $request->query('page', 1);
    $perPage = (int) $request->query('per_page', 5);

    try {
        // Llamada a la función almacenada en PostgreSQL
        $noticias = DB::connection('Noticias')->select(
            'SELECT * FROM get_noticias_paginated(:page, :per_page)',
            [
                'page' => $page,
                'per_page' => $perPage
            ]
        );

        // Total de noticias activas
        $total = DB::connection('Noticias')
            ->table('noticias_sitio_swcc')
            ->where('estado_activo', 1)
            ->count();

        return response()->json([
            'success' => true,
            'data' => $noticias,
            'meta' => [
                'page' => $page,
                'per_page' => $perPage,
                'total' => $total,
                'total_pages' => ceil($total / $perPage)
            ]
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error al consultar noticias',
            'error' => $e->getMessage()
        ], 500);
    }
}






public function recientes(Request $request)
{
    try {

        // Obtener parámetro limit desde la URL
        $limit = $request->query('limit', 10); // default 10

        // Validar que sea número válido
        if (!is_numeric($limit) || $limit <= 0) {
            $limit = 10;
        }

        $noticias = DB::connection('Noticias')->select(
            'SELECT * FROM public.fn_ultimas_n_noticias(?)',
            [(int)$limit]
        );

        return response()->json([
            'success' => true,
            'limit' => (int)$limit,
            'total' => count($noticias),
            'data' => $noticias
        ]);

    } catch (\Exception $e) {

        return response()->json([
            'success' => false,
            'message' => 'Error al obtener noticias recientes',
            'error' => $e->getMessage()
        ], 500);
    }
}


public function buscar(Request $request)
{
    try {

        $titulo       = $request->input('titulo');
        $sintesis     = $request->input('sintesis');
        $contenido    = $request->input('contenido');
        $autor        = $request->input('autor');
        $fotografo    = $request->input('fotografo');
        $fecha        = $request->input('fecha');
        $id_noticia   = $request->input('id_noticia');
        $limit        = (int) $request->input('limit', 10);
        $offset       = (int) $request->input('offset', 0);

        // Validación básica de paginación
        if ($limit < 1 || $limit > 100) {
            $limit = 10;
        }

        if ($offset < 0) {
            $offset = 0;
        }

        $params = [
            $titulo,
            $sintesis,
            $contenido,
            $autor,
            $fotografo,
            $fecha,
            $id_noticia,
            $limit,
            $offset
        ];

        $noticias = DB::connection('Noticias')
            ->select(
                'SELECT * FROM public.fn_buscar_noticias_avanzada(?,?,?,?,?,?,?,?,?)',
                $params
            );

        return response()->json([
            'success' => true,
            'filters' => [
                'titulo' => $titulo,
                'sintesis' => $sintesis,
                'contenido' => $contenido,
                'autor' => $autor,
                'fotografo' => $fotografo,
                'fecha' => $fecha,
                'id_noticia' => $id_noticia,
                'limit' => $limit,
                'offset' => $offset
            ],
            'total' => count($noticias),
            'data' => $noticias
        ]);

    } catch (\Exception $e) {

        return response()->json([
            'success' => false,
            'message' => 'Error en búsqueda avanzada',
            'error' => $e->getMessage()
        ], 500);
    }
}



public function secciones(Request $request, $id_seccion)
{
    if (!is_numeric($id_seccion)) {
        return response()->json([
            'success' => false,
            'message' => 'Sección inválida'
        ], 400);
    }

    $page = (int) $request->query('page', 1);
    $perPage = (int) $request->query('per_page', 10);

    $offset = ($page - 1) * $perPage;

    try {

        $noticias = DB::connection('Noticias')
            ->select('SELECT * FROM public.fn_noticias_por_seccion_paginado(?, ?, ?)', [
                (int)$id_seccion,
                $perPage,
                $offset
            ]);

        $total = count($noticias) > 0 ? $noticias[0]->total_registros : 0;

        return response()->json([
            'success' => true,
            'total' => $total,
            'page' => $page,
            'per_page' => $perPage,
            'last_page' => ceil($total / $perPage),
            'data' => $noticias
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error al obtener noticias por sección',
            'error' => $e->getMessage()
        ], 500);
    }
}


public function buscarNoticias(Request $request)
{
    try {

        $palabra = $request->query('palabra');

        // Validación básica
        if (!$palabra) {
            return response()->json([
                'success' => false,
                'message' => 'El parámetro palabra es obligatorio'
            ], 400);
        }

        // Ejecutar función PostgreSQL
        $noticias = DB::connection('Noticias')
            ->select('SELECT * FROM public.fn_buscar_noticias(?)', [$palabra]);

        return response()->json([
            'success' => true,
            'data' => $noticias
        ], 200);

    } catch (\Exception $e) {

        return response()->json([
            'success' => false,
            'message' => 'Error al buscar noticias',
            'error' => $e->getMessage()
        ], 500);
    }
}



public function buscar2(Request $request)
{
    $palabra = $request->query('palabra');   // ?palabra=ingenieria
    $limite  = $request->query('limite', 10); // default 10
    $offset  = $request->query('offset', 0);  // default 0

    if (!$palabra) {
        return response()->json([
            'error' => 'Debe enviar el parámetro palabra'
        ], 400);
    }

    $resultados = DB::connection('Noticias')->select(
        "SELECT * FROM fn_buscar_noticias_fts_paginado(?, ?, ?)",
        [$palabra, (int)$limite, (int)$offset]
    );

    return response()->json([
        'success' => true,
        'total' => count($resultados),
        'data' => $resultados
    ]);
}




public function noticiasPorDependencia(Request $request)
{
    try {
        $dependencia = $request->query('dependencia');   // ej: DIMEI
        $limit = (int) $request->query('limit', 10);     // default 10
        $offset = (int) $request->query('offset', 0);    // default 0

        if (!$dependencia) {
            return response()->json([
                'success' => false,
                'message' => 'El parámetro "dependencia" es obligatorio'
            ], 400);
        }
        
        
        
        


        
        $noticias = DB::connection('Noticias')->select(
          'SELECT id_noticia, titulo, sintesis, direccion_foto_principal, fecha_publicacion, nombre_dependencia
           FROM fn_noticias_por_dependencia_paginado_simple(?, ?, ?)',
          [$dependencia, $limit, $offset]
        );

        return response()->json([
            'success' => true,
            'params' => [
                'dependencia' => $dependencia,
                'limit' => $limit,
                'offset' => $offset
            ],
            'total' => count($noticias),
            'data' => $noticias
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error al consultar noticias por dependencia',
            'error' => $e->getMessage()
        ], 500);
    }
}






public function noticiasPorPersonaQuery(Request $request)
{
    try {

        // Obtener query params
        $persona = $request->query('persona');
        $limit   = $request->query('limit', 10);
        $offset  = $request->query('offset', 0);

        // Validaciones
        if (!$persona) {
            return response()->json([
                'success' => false,
                'message' => 'El parámetro persona es obligatorio'
            ], 400);
        }

        if (!is_numeric($limit) || $limit <= 0) {
            $limit = 10;
        }

        if (!is_numeric($offset) || $offset < 0) {
            $offset = 0;
        }

        // Ejecutar función PostgreSQL
        $noticias = DB::connection('Noticias')->select(
            'SELECT 
                id_noticia, 
                titulo, 
                sintesis, 
                direccion_foto_principal, 
                autor, 
                fotografo, 
                fecha_publicacion
             FROM fn_noticias_por_persona_fts_paginado_simple(?, ?, ?)',
            [$persona, $limit, $offset]
        );


        return response()->json([
            'success' => true,
            'meta' => [
                'persona' => $persona,
                'limit'   => (int)$limit,
                'offset'  => (int)$offset
            ],
            'data' => $noticias
        ], 200);

    } catch (\Exception $e) {

        return response()->json([
            'success' => false,
            'message' => 'Error al consultar noticias por persona',
            'error' => $e->getMessage()
        ], 500);
    }
}




}
