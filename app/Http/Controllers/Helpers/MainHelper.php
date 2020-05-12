<?php

namespace App\Http\Controllers\Helpers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entities\Consulta;
use App\Entities\Isapre;
use DB;
use Carbon\Carbon;

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

    public static function isapres()
    {
        $consulta = Isapre::all();
        return $consulta;  
    }       

    public static function horarios()
    {
        $actual = Carbon::now();
        $cont = 0;
        while ( $cont < 7) {

            $dia = $actual->isoFormat('dddd');
            if($dia != 'domingo')
            {
                $array[$cont]['value'] = $actual->toDateString();
                $array[$cont]['fecha'] = ucfirst($dia).', '.$actual->day.' de '.$actual->isoFormat('MMMM');
                $cont++;
            }     
            $actual = $actual->add(1, 'day');   
        }
        return ($array);        
    }

    public static function bloques($fecha)
    {
        $dia = new Carbon($fecha);  
        $actual = now()->format('Y-m-d');
        $hora = now()->format('H');
        $hoy = ($fecha == $actual);
        $cont = 0;
     
        if($hoy == true)
        {

            if($dia->isoFormat('dddd') != 'sábado' || $fecha == null)
            {

                if($hora < 11){$array[$cont] = "8:00  a 11:00 Hrs (20 cupos restantes)"; $cont++;}
                if($hora < 14){$array[$cont] = "11:00 a 14:00 Hrs (20 cupos restantes)"; $cont++;}
                if($hora < 17){$array[$cont] = "14:00 a 17:00 Hrs (20 cupos restantes)"; $cont++;}
                if($hora < 20){$array[$cont] = "17:00 a 20:00 Hrs (20 cupos restantes)"; $cont++;}

            }
            else
            {
                if($hora < 14){$array[$cont] = "9:00  a 14:00 Hrs (20 cupos restantes)";}

            } 
   
        }  
        else
        {

            if($dia->isoFormat('dddd') != 'sábado' || $fecha == null)
            {
                
                $array[1] = "8:00  a 11:00 Hrs (20 cupos restantes)";
                $array[2] = "11:00 a 14:00 Hrs (20 cupos restantes)";
                $array[3] = "14:00 a 17:00 Hrs (20 cupos restantes)";
                $array[4] = "17:00 a 20:00 Hrs (20 cupos restantes)";

            }
            else
            {
                $array[1] = "9:00  a 14:00 Hrs (20 cupos restantes)";

            }      
        }  

        return ((object) $array);        
    }    
}
