<?php

namespace App\Http\Controllers\Helpers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entities\Consulta;
use DB;

class MainHelper extends Controller
{
    public static function cantidad_consultas_cerradas()
    {
    	$cantidad = Consulta::where('estado_id', 3)->count();
    	return $cantidad;
    }

    public static function consulta_por_id($consulta_id)
    {
        $consulta = Consulta::select(
            'pacientes.id as id',
            'consultas.id as consulta_id',
            'pacientes.nombres as nombres',
            'pacientes.apellidoPaterno as apellidoPaterno',
            'pacientes.apellidoMaterno as apellidoMaterno',
            'pacientes.telefono as telefono',
            'pacientes.celular as celular',
            'pacientes.activo as activo',
            /*/
            DB::raw('DATE_FORMAT(consultas.fecha_'.$fecha.', "%d-%m-%Y") as fecha'),
            DB::raw('DATE_FORMAT(consultas.fecha_'.$fecha.', "%H:%i") as hora'),
            /*/
            'pacientes.email as email',
            'pacientes.rut as rut',
            'motivo_consultas.motivo as motivo',
            'consultas.motivo_consulta_id as motivo_consulta_id',
            'consultas.comentario as comentario',
            'consultas.comentario_cierre as comentario_cierre',
            'estados_cierres.nombre_estado as estado_cierre',
            'consultas.responsable as responsable',
            'consultas.fecha_enviado',
            'consultas.fecha_gestionado',
            'consultas.fecha_cerrado',
            'consultas.nombre_emergencia as contacto_emergencia',
            'consultas.telefono_emergencia as telefono_emergencia'

        )
        ->join('motivo_consultas', 'consultas.motivo_consulta_id', '=', 'motivo_consultas.id')
        ->join('estados_cierres', 'consultas.estado_cierre_id', '=', 'estados_cierres.id')
        ->join('pacientes', 'consultas.paciente_id', '=', 'pacientes.id')
        ->where('consultas.id', $consulta_id)
        ->first();      

        return $consulta;  
    }    
}
