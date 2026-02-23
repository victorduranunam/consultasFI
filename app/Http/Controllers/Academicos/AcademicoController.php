<?php

namespace App\Http\Controllers\Academicos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class AcademicoController extends Controller
{
    
    public function buscarProfesores(Request $request)
    {
        try {
            // Parámetros de búsqueda
            $param_nombre = $request->query('nombre');
            $param_ape_paterno = $request->query('ape_paterno');
            $param_ape_materno = $request->query('ape_materno');
            $param_correo = $request->query('correo_personal');
            $param_num_trabajador = $request->query('num_trabajador');

            // Parámetros de paginación
            $limit = (int) $request->query('limit', 50);
            $offset = (int) $request->query('offset', 0);

            // Validación: al menos un parámetro de búsqueda
            if (
                !$param_nombre &&
                !$param_ape_paterno &&
                !$param_ape_materno &&
                !$param_correo &&
                !$param_num_trabajador
            ) {
                return response()->json([
                    'error' => 'Debe proporcionar al menos un parámetro de búsqueda'
                ], 400);
            }

            // Contar total de registros que cumplen los filtros
            $total = DB::connection('consultasacad')->selectOne(
                'SELECT COUNT(*) as total
                 FROM public.buscar_profesores(?, ?, ?, ?, ?)',
                [
                    $param_nombre,
                    $param_ape_paterno,
                    $param_ape_materno,
                    $param_correo,
                    $param_num_trabajador
                ]
            );

            // Traer los registros con LIMIT y OFFSET
            $resultados = DB::connection('consultasacad')->select(
                'SELECT * FROM public.buscar_profesores(?, ?, ?, ?, ?) 
                 LIMIT ? OFFSET ?',
                [
                    $param_nombre,
                    $param_ape_paterno,
                    $param_ape_materno,
                    $param_correo,
                    $param_num_trabajador,
                    $limit,
                    $offset
                ]
            );

            return response()->json([
                'total' => $total->total ?? 0,
                'limit' => $limit,
                'offset' => $offset,
                'resultados' => $resultados
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'codigo' => $e->getCode()
            ], 500);
        }
    }




       public function alumnosTotalesPorMateria(Request $request)
    {
        $materia = $request->query('materia'); // clave o nombre de materia
        $limit = $request->query('limit', 50); // por defecto 50 resultados
        $offset = $request->query('offset', 0); // por defecto desde 0

        if (!$materia) {
            return response()->json([
                'error' => 'Debes proporcionar la clave o el nombre de la materia'
            ], 400);
        }

        try {
            $resultados = DB::connection('consultasacad')->select(
                'SELECT * FROM public.alumnos_totales_por_materia(?) ORDER BY nombre_asignatura ASC LIMIT ? OFFSET ?',
                [$materia, $limit, $offset]
            );

            return response()->json([
                'limit' => $limit,
                'offset' => $offset,
                'count' => count($resultados),
                'data' => $resultados
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'codigo' => $e->getCode()
            ], 500);
        }
    }



public function buscarAlumnos(Request $request)
{
    // Parámetros opcionales para búsqueda
    $nombre = $request->query('nombre');
    $apellido_paterno = $request->query('apellido_paterno');
    $apellido_materno = $request->query('apellido_materno');
    $correo_personal = $request->query('correo_personal');
    $numero_cuenta = $request->query('numero_cuenta');

    // Paginación opcional
    $limit = $request->query('limit', 50);
    $offset = $request->query('offset', 0);

    try {
        $resultados = DB::connection('consultasacad')->select(
            'SELECT * FROM public.buscar_alumnos(?, ?, ?, ?, ?) LIMIT ? OFFSET ?',
            [$nombre, $apellido_paterno, $apellido_materno, $correo_personal, $numero_cuenta, $limit, $offset]
        );

        return response()->json([
            'limit' => $limit,
            'offset' => $offset,
            'count' => count($resultados),
            'data' => $resultados
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'codigo' => $e->getCode()
        ], 500);
    }
}





public function buscarMateria(Request $request)
{
    $clave = $request->query('clave');
    $nombre = $request->query('nombre');
    $limit = min((int) $request->query('limit', 50), 100); // límite máximo 100
    $offset = max((int) $request->query('offset', 0), 0);

    if (!$clave && !$nombre) {
        return response()->json([
            'error' => 'Debes proporcionar la clave o el nombre de la materia'
        ], 400);
    }

    try {
        if ($clave) {
            $resultados = DB::connection('consultasacad')->select(
                'SELECT clave_asignatura, nombre_asignatura FROM public.buscar_materia_por_clave(?) LIMIT ? OFFSET ?',
                [$clave, $limit, $offset]
            );
        } else {
            $resultados = DB::connection('consultasacad')->select(
                'SELECT clave_asignatura, nombre_asignatura 
                 FROM materias 
                 WHERE nombre_asignatura ILIKE ? 
                 LIMIT ? OFFSET ?',
                ["%$nombre%", $limit, $offset]
            );
        }

        return response()->json([
            'limit' => $limit,
            'offset' => $offset,
            'count' => count($resultados),
            'data' => $resultados
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Error al consultar la base de datos',
            'detalle' => $e->getMessage(),
            'codigo' => $e->getCode()
        ], 500);
    }
}



public function gruposPorAlumno(Request $request)
{
    $busqueda = $request->query('busqueda'); // número de cuenta, nombre o correo
    $limit = (int) $request->query('limit', 50);
    $offset = (int) $request->query('offset', 0);

    if (!$busqueda) {
        return response()->json([
            'error' => 'Debes proporcionar un término de búsqueda (número de cuenta, nombre o correo del alumno)'
        ], 400);
    }

    try {
        $resultados = DB::connection('consultasacad')->select(
            'SELECT * FROM public.grupos_por_alumno(?) LIMIT ? OFFSET ?',
            [$busqueda, $limit, $offset]
        );

        return response()->json([
            'limit' => $limit,
            'offset' => $offset,
            'count' => count($resultados),
            'data' => $resultados
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'codigo' => $e->getCode()
        ], 500);
    }
}



public function gruposPorMaestro(Request $request)
{
    $num_trabajador = $request->query('num_trabajador');
    $nombre = $request->query('nombre');
    $correo = $request->query('correo');
    $limit = (int) $request->query('limit', 50);
    $offset = (int) $request->query('offset', 0);

    if (!$num_trabajador && !$nombre && !$correo) {
        return response()->json([
            'error' => 'Debes proporcionar al menos uno de los siguientes: num_trabajador, nombre o correo'
        ], 400);
    }

    try {
        if ($num_trabajador) {
            // Buscar por número de trabajador
            $resultados = DB::connection('consultasacad')->select(
                'SELECT * FROM public.grupos_por_maestro(?) LIMIT ? OFFSET ?',
                [$num_trabajador, $limit, $offset]
            );
        } else {
            // Buscar por nombre o correo directamente en la tabla profesores
            $query = 'SELECT
                        g.id_grupo,
                        g.clave_asignatura,
                        m.nombre_asignatura,
                        g.numero_grupo,
                        g.modalidad,
                        g.estatus_grupo,
                        COUNT(ga.numero_cuenta) AS total_alumnos
                      FROM profesores p
                      INNER JOIN grupos g ON g.rfc = p.rfc
                      INNER JOIN materias m ON m.clave_asignatura = g.clave_asignatura
                      LEFT JOIN grupos_alumnos ga 
                        ON ga.clave_asignatura = g.clave_asignatura
                       AND ga.numero_grupo = g.numero_grupo
                       AND ga.rfc = g.rfc
                      WHERE 1=1';

            $params = [];

            if ($nombre) {
                $query .= " AND (p.nombre || ' ' || p.ape_paterno || ' ' || COALESCE(p.ape_materno, '')) ILIKE ?";
                $params[] = "%$nombre%";
            }

            if ($correo) {
                $query .= " AND p.correo_personal ILIKE ?";
                $params[] = "%$correo%";
            }

            $query .= " GROUP BY g.id_grupo, g.clave_asignatura, m.nombre_asignatura, g.numero_grupo, g.modalidad, g.estatus_grupo
                        ORDER BY m.nombre_asignatura ASC, g.numero_grupo ASC
                        LIMIT ? OFFSET ?";

            $params[] = $limit;
            $params[] = $offset;

            $resultados = DB::connection('consultasacad')->select($query, $params);
        }

        return response()->json([
            'limit' => $limit,
            'offset' => $offset,
            'count' => count($resultados),
            'data' => $resultados
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'codigo' => $e->getCode()
        ], 500);
    }
}


public function gruposPorMateria(Request $request)
{
    $materia = $request->query('materia'); // clave o nombre de la materia
    $limit = (int) $request->query('limit', 50);
    $offset = (int) $request->query('offset', 0);

    if (!$materia) {
        return response()->json([
            'error' => 'Debes proporcionar la clave o el nombre de la materia'
        ], 400);
    }

    try {
        $resultados = DB::connection('consultasacad')->select(
            'SELECT * FROM public.grupos_por_materia(?) LIMIT ? OFFSET ?',
            [$materia, $limit, $offset]
        );

        return response()->json([
            'limit' => $limit,
            'offset' => $offset,
            'count' => count($resultados),
            'data' => $resultados
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'codigo' => $e->getCode()
        ], 500);
    }
}


public function materiasPorDivision(Request $request)
{
    $division = $request->query('division');
    $limit = (int) $request->query('limit', 200);
    $offset = (int) $request->query('offset', 0);

    if (!$division) {
        return response()->json([
            'error' => 'Debes proporcionar la división (nombre o alias)'
        ], 400);
    }

    try {
        // Primero contamos el total de registros que coinciden
        $total = DB::connection('consultasacad')->selectOne(
            "SELECT COUNT(*) as total 
             FROM public.materias_por_division(?)",
            [$division]
        );

        // Ahora traemos solo el bloque solicitado con LIMIT y OFFSET
        $resultados = DB::connection('consultasacad')->select(
            'SELECT * FROM public.materias_por_division(?) LIMIT ? OFFSET ?',
            [$division, $limit, $offset]
        );

        return response()->json([
            'total' => $total->total ?? 0,
            'limit' => $limit,
            'offset' => $offset,
            'count' => count($resultados),
            'data' => $resultados
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'codigo' => $e->getCode()
        ], 500);
    }
}


public function materiasPorSemestre(Request $request)
{
    $division = $request->query('division'); // nombre o alias de la división
    $semestre = $request->query('semestre'); // número de semestre
    $limit = (int) $request->query('limit', 50);
    $offset = (int) $request->query('offset', 0);

    if (!$division || !$semestre) {
        return response()->json([
            'error' => 'Debes proporcionar division y semestre'
        ], 400);
    }

    try {
        // Contar total de registros que coinciden
        $total = DB::connection('consultasacad')->selectOne(
            'SELECT COUNT(*) AS total FROM public.materias_por_semestre(?, ?)',
            [$division, $semestre]
        );

        // Traer solo el bloque solicitado con LIMIT y OFFSET
        $resultados = DB::connection('consultasacad')->select(
            'SELECT * FROM public.materias_por_semestre(?, ?) LIMIT ? OFFSET ?',
            [$division, $semestre, $limit, $offset]
        );

        return response()->json([
            'total' => $total->total ?? 0,
            'limit' => $limit,
            'offset' => $offset,
            'count' => count($resultados),
            'data' => $resultados
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'codigo' => $e->getCode()
        ], 500);
    }
}


public function obtenerAlumnosPorGrupoAsignatura(Request $request)
{
    $clave_asignatura = $request->query('clave_asignatura');
    $numero_grupo = $request->query('numero_grupo');
    $limit = (int) $request->query('limit', 50);
    $offset = (int) $request->query('offset', 0);

    if (!$clave_asignatura || !$numero_grupo) {
        return response()->json([
            'error' => 'Debes proporcionar clave_asignatura y numero_grupo'
        ], 400);
    }

    try {
        // Contar total de alumnos en el grupo
        $total = DB::connection('consultasacad')->selectOne(
            'SELECT COUNT(*) as total 
             FROM public.obtener_alumnos_por_grupo_asignatura(?, ?)',
            [$clave_asignatura, $numero_grupo]
        );

        // Traer el bloque solicitado
        $resultados = DB::connection('consultasacad')->select(
            'SELECT * FROM public.obtener_alumnos_por_grupo_asignatura(?, ?) LIMIT ? OFFSET ?',
            [$clave_asignatura, $numero_grupo, $limit, $offset]
        );

        return response()->json([
            'total' => $total->total ?? 0,
            'limit' => $limit,
            'offset' => $offset,
            'count' => count($resultados),
            'data' => $resultados
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'codigo' => $e->getCode()
        ], 500);
    }
}


public function profesoresPorDivisionDetalladoXXX(Request $request)
{
    $division = $request->query('division');
    $search   = $request->query('search', '');  
    $limit    = (int) $request->query('limit', 50);
    $offset   = (int) $request->query('offset', 0);
    $orden    = $request->query('orden', 'apellido');

    if (!$division) {
        return response()->json([
            'error' => 'Debes proporcionar la división'
        ], 400);
    }

    try {
        $query = "
            SELECT
                p.rfc,
                p.num_trabajador,
                (p.nombre || ' ' || p.ape_paterno || ' ' || COALESCE(p.ape_materno, '')) AS nombre_completo,
                p.correo_personal,
                m.division,
                m.alias_division,
                COUNT(DISTINCT g.id_grupo) AS total_grupos,
                COUNT(DISTINCT m.clave_asignatura) AS total_materias
            FROM profesores p
            LEFT JOIN grupos g
                ON g.rfc = p.rfc
            LEFT JOIN materias m
                ON m.clave_asignatura = g.clave_asignatura
                AND (UPPER(m.division) = UPPER(?) OR UPPER(m.alias_division) = UPPER(?))
            WHERE p.status = 'A'
        ";

        if ($search) {
            $query .= " AND (
                p.num_trabajador ILIKE '%' || ? || '%' OR
                p.nombre ILIKE '%' || ? || '%' OR
                p.ape_paterno ILIKE '%' || ? || '%' OR
                p.ape_materno ILIKE '%' || ? || '%' OR
                p.correo_personal ILIKE '%' || ? || '%'
            )";
        }

        $query .= " GROUP BY 
                p.rfc, 
                p.num_trabajador, 
                p.nombre, 
                p.ape_paterno, 
                p.ape_materno, 
                p.correo_personal, 
                m.division,
                m.alias_division
        ";

        switch(strtolower($orden)) {
            case 'nombre':
                $query .= " ORDER BY p.nombre ASC, p.ape_paterno ASC";
                break;
            case 'apellido':
            default:
                $query .= " ORDER BY p.ape_paterno ASC, p.nombre ASC";
        }

        $query .= " LIMIT ? OFFSET ?";

        $params = [$division, $division];
        if ($search) {
            $params = array_merge($params, [$search, $search, $search, $search, $search]);
        }
        $params[] = $limit;
        $params[] = $offset;

        $profesores = DB::connection('consultasacad')->select($query, $params);

        return response()->json([
            'limit' => $limit,
            'offset' => $offset,
            'count' => count($profesores),
            'data' => $profesores
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'codigo' => $e->getCode()
        ], 500);
    }
}

public function profesoresPorDivisionActivos(Request $request)
{
    $division = strtoupper(trim($request->query('division')));
    $limit    = (int) $request->query('limit', 15);
    $offset   = (int) $request->query('offset', 0);

    if (!$division) {
        return response()->json([
            'error' => 'Debes proporcionar la division'
        ], 400);
    }

    try {

        $profesores = DB::connection('consultasacad')
            ->select(
                "SELECT *
                 FROM profesores_por_division_activos(?::varchar)
                 LIMIT ? OFFSET ?",
                [$division, $limit, $offset]
            );

        $total = !empty($profesores)
            ? $profesores[0]->total_registros
            : 0;

        return response()->json([
            'division' => $division,
            'limit'    => $limit,
            'offset'   => $offset,
            'total'    => $total,
            'count'    => count($profesores),
            'data'     => $profesores
        ]);

    } catch (\Exception $e) {

        return response()->json([
            'error'  => $e->getMessage(),
            'codigo' => $e->getCode()
        ], 500);
    }
}



}
