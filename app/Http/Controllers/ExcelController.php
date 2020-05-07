<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExcelController implements FromCollection
{
    public function collection()
    {
        $consultas = Consulta::select(
            'pacientes.nombres as nombres',
            'pacientes.apellidoPaterno as apellidoPaterno',
            'pacientes.apellidoMaterno as apellidoMaterno',
            'pacientes.rut as rut',
            'pacientes.activo as activo',
            'estados,estado as estado',
            'motivo_consultas.motivo as motivo',
            'pacientes.telefono as telefono1',
            'pacientes.celular as telefono2',
            'pacientes.email as email',
            'consultas.nombre_emergencia as nombre_emergencia',
            'consultas.telefono_emergencia as telefono_emergencia',
            'consultas.responsable as responsable',
            'estados_cierres.nombre_estado as estado_cierre',
            'consultas.comentario_cierre as comentario_cierre'
        )
        ->join('motivo_consultas', 'consultas.motivo_consulta_id', '=', 'motivo_consultas.id')
        ->join('estados_cierres', 'consultas.estado_cierre_id', '=', 'estados_cierres.id')
        ->join('estados', 'consultas.estado_id', '=', 'estados.id')
        ->join('pacientes', 'consultas.paciente_id', '=', 'pacientes.id')
        ->where('consultas.estado_id', $estado)
        ->get();		    
		 
        return $consultas;
    }
}


