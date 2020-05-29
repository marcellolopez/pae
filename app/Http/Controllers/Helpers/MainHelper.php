<?php

namespace App\Http\Controllers\Helpers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entities\Consulta;
use App\Entities\Isapre;
use App\Entities\Bloque;
use App\Entities\AgendamientoPaciente;
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
            'consultas.telefono_emergencia as telefono_emergencia',
            'pacientes.sexo',
            'pacientes.edad',
            'pacientes.comuna_id',
            'pacientes.ubicacion_actual',
            'consultas.explicacion_foco',
            'consultas.consideraciones',
            'consultas.confirma_mesa_ayuda',
            'consultas.especialidad_id',
            'consultas.cierre_caso_id',
            'consultas.responsable_cierre_id',
            'consultas.motivo_consultas_profesionales_id',
            'consultas.otros_profesional',
            'consultas.comentario_profesional',
            DB::raw("(
            CASE 
                WHEN registroisapre.ISAPRE = 1 THEN 'Banmedica'
                ELSE 'Vida tres'
            END) AS isapre")

        )
        ->join('motivo_consultas', 'consultas.motivo_consulta_id', '=', 'motivo_consultas.id')
        ->join('estados_cierres', 'consultas.estado_cierre_id', '=', 'estados_cierres.id')
        ->join('pacientes', 'consultas.paciente_id', '=', 'pacientes.id')
        ->join('registroisapre', 'pacientes.rut', '=', 'registroisapre.RUT_AFILIADO')
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

            $feriado = DB::table('feriado')->where('fecha', $actual->toDateString())->count();
       
            if($dia != 'domingo'  && $feriado == 0)
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
        $hora = now()->format('Hi');
        $hoy = ($fecha == $actual);
        $cont = 0;
        if($hoy == true)
        {
            if($dia->isoFormat('dddd') != 'sábado' || $fecha == null)
            {
                $bloques = Bloque::where('dias','!=','sábado')->get();


                foreach ($bloques as $bloque) {
                            $agendamiento_total = AgendamientoPaciente::whereDate('fecha',$dia->toDateString())
                                ->where('bloque_id',$bloque->id)
                                ->count();   
                            $cupos = $bloque->cupos - $agendamiento_total;                                   
                    if($hora < $bloque->hora_fin - 1 - 1)
                        {
                            

                            if($cupos > 0)
                            {
                                $array[$bloque->id]['bloque'] = $bloque->bloque;
                                $array[$bloque->id]['id'] = $bloque->id;
                                $array[$bloque->id]['tachado'] = false;

                            }
                        }
                        else
                        {
                                $array[$bloque->id]['bloque'] = $bloque->bloque;
                                $array[$bloque->id]['id'] = $bloque->id;
                                $array[$bloque->id]['tachado'] = true;                            
                        }
               
                }
            }
            else
            {

                $bloques = Bloque::where('dias','sábado')->get();
                foreach ($bloques as $bloque) {
                    $hora_fin = new Carbon($bloque->hora_fin);
                    $agendamiento_total = AgendamientoPaciente::whereDate('fecha',$dia->toDateString())
                        ->where('bloque_id',$bloque->id)
                        ->count();                        
                    if($hora < $bloque->hora_fin - 1){
                        $cupos = $bloque->cupos - $agendamiento_total;
                        if($cupos > 0)
                        {
                            $array[$bloque->id]['bloque'] = $bloque->bloque;
                            $array[$bloque->id]['id'] = $bloque->id;
                            $array[$bloque->id]['tachado'] = false;

                        }
                    }    

                }
            } 
        }  
        else
        {

            if($dia->isoFormat('dddd') != 'sábado' || $fecha == null)
            {
                $bloques = Bloque::where('dias','!=','sábado')->get();
                foreach ($bloques as $bloque) {
                    $agendamiento_total = AgendamientoPaciente::whereDate('fecha',$dia->toDateString())
                        ->where('bloque_id',$bloque->id)
                        ->count();    
                    $cupos = $bloque->cupos - $agendamiento_total;
                    if($cupos > 0)
                    {
                        $array[$bloque->id]['bloque'] = $bloque->bloque;
                        $array[$bloque->id]['id'] = $bloque->id;
                        $array[$bloque->id]['tachado'] = false;

                    }
                }
            }
            else
            {
                $bloques = Bloque::where('dias','sábado')->get();
                foreach ($bloques as $bloque) {
                    $agendamiento_total = AgendamientoPaciente::whereDate('fecha',$dia->toDateString())
                        ->where('bloque_id',$bloque->id)
                        ->count();                           
                    $cupos = $bloque->cupos - $agendamiento_total; 
                    if($cupos > 0)
                    {
                       $array[$bloque->id]['bloque'] = $bloque->bloque;
                       $array[$bloque->id]['id'] = $bloque->id;
                       $array[$bloque->id]['tachado'] = false;

                    }
                }
            }      
        }  

        return ((object) $array);        
    }    
}
