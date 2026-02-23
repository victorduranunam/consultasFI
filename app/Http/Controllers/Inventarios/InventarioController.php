<?php

namespace App\Http\Controllers\Inventarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Inventario\Inventario;
use Illuminate\Support\Facades\DB;

class InventarioController extends Controller
{
    public function index2()
    {
        return response()->json(
            inventario::all(),
            Response::HTTP_OK
        );
    }


    


public function index(Request $request)
{
    $limit = $request->get('limit', 20);
    $offset = $request->get('offset', 0);

    $query = Inventario::query();

    $total = $query->count();

    $data = $query
        ->limit($limit)
        ->offset($offset)
        ->get();

    return response()->json([
        'total' => $total,
        'limit' => (int) $limit,
        'offset' => (int) $offset,
        'data' => $data
    ]);
}





public function busqueda(Request $request)
{
    $request->validate([
        'campo' => 'required|string',
        'valor' => 'required|string',
        'limit' => 'sometimes|integer',
        'offset' => 'sometimes|integer',
    ]);

    $campo = $request->query('campo');
    $valor = $request->query('valor');
    $limit = (int) $request->query('limit', 20);
    $offset = (int) $request->query('offset', 0);

    try {
        // Total de registros
        $total = DB::connection('inventario')->selectOne(
            'SELECT count(*) as total 
             FROM staging_inventario 
             WHERE ' . ($campo == 'responsable' 
                 ? "trim(unaccent(lower(nombre || ' ' || a_paterno || ' ' || a_materno))) LIKE ?" 
                 : "trim(unaccent(lower($campo))) LIKE ?"),
            ["%".trim(strtolower($valor))."%"]
        )->total;

        // Datos paginados
        $resultados = DB::connection('inventario')->select(
            'SELECT * FROM public.fn_busqueda_inventario(?, ?, ?, ?)',
            [$campo, $valor, $limit, $offset]
        );

        return response()->json([
            'total' => (int) $total,
            'data' => $resultados
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'codigo' => $e->getCode()
        ], 500);
    }
}














public function estadisticasBnDesc(Request $request)
{
    try {
        // Parámetros de paginación
        $page = $request->query('page', 1);        // página actual
        $perPage = $request->query('per_page', 20); // resultados por página
        $offset = ($page - 1) * $perPage;

        // Consulta con LIMIT y OFFSET usando la conexión inventario
        $resultados = DB::connection('inventario')->select(
            'SELECT * 
             FROM public.fn_estadisticas_inventario_bn_desc() 
             ORDER BY total DESC 
             LIMIT ? OFFSET ?',
            [$perPage, $offset]
        );

        // Devolver resultados con info básica de paginación
        return response()->json([
            'data' => $resultados,
            'page' => $page,
            'per_page' => $perPage,
            'count' => count($resultados)
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'codigo' => $e->getCode()
        ], 500);
    }
}




public function estadisticasBnDescPorDivision(Request $request)
{
    try {
        // Parámetro obligatorio: division
        $division = $request->query('division');
        if (!$division) {
            return response()->json([
                'error' => 'Debe enviar el parámetro "division".'
            ], 400);
        }

        // Parámetros de paginación
        $page = (int) $request->query('page', 1);
        $perPage = (int) $request->query('per_page', 20);
        $offset = ($page - 1) * $perPage;

        // Consulta con LIMIT y OFFSET usando la conexión inventario
        $resultados = DB::connection('inventario')->select(
            'SELECT * 
             FROM public.fn_estadisticas_inventario_bn_desc_por_division(?) 
             ORDER BY total DESC 
             LIMIT ? OFFSET ?',
            [$division, $perPage, $offset]
        );

        // Devolver resultados con info de paginación
        return response()->json([
            'data' => $resultados,
            'division' => $division,
            'page' => $page,
            'per_page' => $perPage,
            'count' => count($resultados)
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'codigo' => $e->getCode()
        ], 500);
    }
}


public function estadisticasBnDescPorLaboratorio(Request $request)
{
    $request->validate([
        'laboratorio' => 'required|string',
        'page' => 'integer|min:1',
        'per_page' => 'integer|min:1|max:100',
    ]);

    $laboratorio = $request->input('laboratorio');
    $page = $request->input('page', 1);
    $perPage = $request->input('per_page', 20);
    $offset = ($page - 1) * $perPage;

    try {
        $resultados = DB::connection('inventario')->select(
            'SELECT * FROM public.fn_estadisticas_inventario_bn_desc_por_laboratorio(?) ORDER BY lab_nombre, div_nombre, total DESC OFFSET ? LIMIT ?',
            [$laboratorio, $offset, $perPage]
        );

        return response()->json($resultados);

    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'codigo' => $e->getCode()
        ], 500);
    }
}


public function inventarioPorDepartamento(Request $request)
{
    $request->validate([
        'departamento' => 'required|string',
        'page' => 'integer|min:1',
        'per_page' => 'integer|min:1|max:100',
    ]);

    $departamento = $request->input('departamento');
    $page = $request->input('page', 1);
    $perPage = $request->input('per_page', 20);
    $offset = ($page - 1) * $perPage;

    try {
        $resultados = DB::connection('inventario')->select(
            'SELECT * FROM public.fn_inventario_por_departamento(?) OFFSET ? LIMIT ?',
            [$departamento, $offset, $perPage]
        );

        return response()->json($resultados);

    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'codigo' => $e->getCode()
        ], 500);
    }
}


public function inventarioPorDescripcion(Request $request)
{
    $request->validate([
        'descripcion' => 'required|string',
        'page' => 'integer|min:1',
        'per_page' => 'integer|min:1|max:100',
    ]);

    $descripcion = $request->input('descripcion');
    $page = $request->input('page', 1);
    $perPage = $request->input('per_page', 20);
    $offset = ($page - 1) * $perPage;

    try {
        $resultados = DB::connection('inventario')->select(
            'SELECT * FROM public.fn_inventario_por_descripcion(?) OFFSET ? LIMIT ?',
            [$descripcion, $offset, $perPage]
        );

        return response()->json($resultados);

    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'codigo' => $e->getCode()
        ], 500);
    }
}


public function inventarioPorDivision(Request $request)
{
    $request->validate([
        'division' => 'required|string',
        'page' => 'integer|min:1',
        'per_page' => 'integer|min:1|max:100',
    ]);

    $division = $request->input('division');
    $page = $request->input('page', 1);
    $perPage = $request->input('per_page', 20);
    $offset = ($page - 1) * $perPage;

    try {
        $resultados = DB::connection('inventario')->select(
            'SELECT * FROM public.fn_inventario_por_division(?) OFFSET ? LIMIT ?',
            [$division, $offset, $perPage]
        );

        return response()->json($resultados);

    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'codigo' => $e->getCode()
        ], 500);
    }
}



public function inventarioPorEdificioLetra(Request $request)
{
    $request->validate([
        'letra' => 'required|string',
        'page' => 'integer|min:1',
        'per_page' => 'integer|min:1|max:100',
    ]);

    $letra = $request->input('letra');
    $page = $request->input('page', 1);
    $perPage = $request->input('per_page', 20);
    $offset = ($page - 1) * $perPage;

    try {
        $resultados = DB::connection('inventario')->select(
            'SELECT * FROM public.fn_inventario_por_edificio_letra(?) OFFSET ? LIMIT ?',
            [$letra, $offset, $perPage]
        );

        return response()->json($resultados);

    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'codigo' => $e->getCode()
        ], 500);
    }
}



public function inventarioPorResponsable(Request $request)
{
    $request->validate([
        'responsable' => 'required|string',
        'page' => 'integer|min:1',
        'per_page' => 'integer|min:1|max:100',
    ]);

    $responsable = $request->input('responsable');
    $page = $request->input('page', 1);
    $perPage = $request->input('per_page', 20);
    $offset = ($page - 1) * $perPage;

    try {
        $resultados = DB::connection('inventario')->select(
            'SELECT * FROM public.fn_inventario_por_responsable(?) OFFSET ? LIMIT ?',
            [$responsable, $offset, $perPage]
        );

        return response()->json($resultados);

    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'codigo' => $e->getCode()
        ], 500);
    }
}


public function totalesPorLaboratorio(Request $request)
{
    $request->validate([
        'page' => 'integer|min:1',
        'per_page' => 'integer|min:1|max:100',
    ]);

    $page = $request->input('page', 1);
    $perPage = $request->input('per_page', 20);
    $offset = ($page - 1) * $perPage;

    try {
        // Ordenamos por total_equipos DESC para mostrar de mayor a menor
        $resultados = DB::connection('inventario')->select(
            'SELECT * FROM public.fn_totales_por_laboratorio() ORDER BY total_equipos DESC OFFSET ? LIMIT ?',
            [$offset, $perPage]
        );

        return response()->json($resultados);

    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'codigo' => $e->getCode()
        ], 500);
    }
}



}
