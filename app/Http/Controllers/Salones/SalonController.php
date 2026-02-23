<?php

namespace App\Http\Controllers\Salones;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;


class SalonController extends Controller
{
    public function info(Request $request)
    {
        try {
            $nombreSalon = $request->input('nombre_salon');
                 
                           
            $salonInfo = DB::connection('salones')
               ->select("SELECT * FROM public.fn_salon_info(?)", [$nombreSalon]);


            // Convertimos a array y aseguramos UTF-8
            $salonInfo = json_decode(json_encode($salonInfo), true);

            return response()->json($salonInfo, 200);

        } catch (\Exception $e) {
            // Retornamos JSON del error para APIs
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }






    public function listadoSalones()
    {
        try {
            // Ejecuta la función almacenada usando la conexión 'salones'
            $salones = DB::connection('salones')
                ->select("SELECT nombre_salon AS nombre FROM public.fn_listado_salones_alfabetico()");
    
            // Convertimos a array para asegurar compatibilidad JSON
            $salones = json_decode(json_encode($salones), true);
    
            return response()->json($salones, 200);
    
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }



public function buscarPorRecurso(Request $request)
{
    try {
        $criterio = $request->input('criterio'); // parámetro de búsqueda

        if (!$criterio) {
            return response()->json([
                'error' => 'Debes proporcionar un criterio de búsqueda'
            ], 400);
        }

        $salones = DB::connection('salones')
            ->select("SELECT * FROM public.fn_buscar_salon_por_recurso(?)", [$criterio]);

        // Convertimos a array y aseguramos UTF-8
        $salones = json_decode(json_encode($salones), true);

        return response()->json([
            'count' => count($salones),
            'data' => $salones
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage()
        ], 500);
    }
}





public function capacidadPorEdificio()
{
    try {

        $data = DB::connection('salones')
            ->select("SELECT * FROM public.fn_capacidad_por_edificio()");

        return response()->json([
            'success' => true,
            'total' => count($data),
            'data' => $data
        ], 200);

    } catch (\Exception $e) {

        return response()->json([
            'success' => false,
            'error' => 'Error al consultar capacidad por edificio',
            'detalle' => $e->getMessage()
        ], 500);
    }
}




public function caracteristicasSalon(Request $request)
{
    try {

        $nombre = $request->query('nombre_salon');

        if (!$nombre) {
            return response()->json([
                'success' => false,
                'message' => 'El parámetro nombre_salon es obligatorio'
            ], 400);
        }

        $data = DB::connection('salones')
            ->select(
                "SELECT * FROM public.fn_salon_caracteristicas(?)",
                [$nombre]
            );

        return response()->json([
            'success' => true,
            'total' => count($data),
            'data' => $data
        ], 200);

    } catch (\Exception $e) {

        return response()->json([
            'success' => false,
            'error' => 'Error al consultar características del salón',
            'detalle' => $e->getMessage()
        ], 500);
    }
}



public function recursosPorSalon(Request $request)
{
    try {
        $nombreSalon = $request->query('nombre_salon');

        if (!$nombreSalon) {
            return response()->json([
                'error' => 'El parámetro nombre_salon es obligatorio'
            ], 400);
        }

        $recursos = DB::connection('salones')
            ->select(
                "SELECT * FROM public.fn_salon_recursos(?)",
                [$nombreSalon]
            );

        // Convertir a array
        $recursos = json_decode(json_encode($recursos), true);

        return response()->json([
            'count' => count($recursos),
            'data' => $recursos
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage()
        ], 500);
    }
}




}
