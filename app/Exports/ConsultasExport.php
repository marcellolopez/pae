<?php

namespace App\Exports;

use App\Entities\Consulta;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ConsultasExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($estado)
    {
        $this->estado = $estado;
    }

    public function headings(): array
    {
        return [
			'Fecha enviado',
			'Fecha cerrado',
			'Nombres',
			'Apellido Paterno',
			'Apellido Materno',
			'Rut',
			'Activo',
			'Correo electrónico',
			'Sexo',
			'Isapre',
            'Comuna',
            'Región',
            'Edad',
            'Teléfono 1',
            'Teléfono 2',
			'Nombre emergencia',
			'Teléfono emergencia',
			'Motivo consulta (Paciente)',
			'Comentario',
			'Motivo consulta (Profesional)',
			'Comentario',
			'Otros',
			'Estado',
			'Estado cierre',
			'Comentario Cierre',			
			'Responsable',
			'Explicación',
			'Consideraciones',
			'Mesa de ayuda',
			'Especialidad',
			'Condiciones de cierres de caso',
			'Responsable de cierre'
			
			
            


        ];
    }

    public function collection()
    {
    	$gestion = $this->estado;

        $results = Consulta::select(
			'consultas.fecha_enviado',
			'consultas.fecha_cerrado',
			'pacientes.nombres',
			'pacientes.apellidoPaterno',
			'pacientes.apellidoMaterno',
			'pacientes.rut',
			'pacientes.activo',
			'pacientes.email',
			'pacientes.sexo',
			DB::raw('IF(registroisapre.ISAPRE=1,"Banmédica","Vida Tres") as ISAPRE'),
			'comunas.comuna',
            'regiones.region',
            'pacientes.edad',
            'pacientes.telefono as telefono 1',
            'pacientes.celular as telefono 2',
			'consultas.nombre_emergencia',
			'consultas.telefono_emergencia',
			'motivo_consultas.motivo',
			'consultas.comentario',
			'motivo_consultas_profesionales.motivo',
			'consultas.comentario_profesional',
			'consultas.otros_profesional',
			'estados.estado',
			'estados_cierres.nombre_estado',
			'consultas.comentario_cierre',
			'consultas.responsable',
			'consultas.explicacion_foco',
			'consultas.consideraciones',
			'consultas.confirma_mesa_ayuda',
			'especialidad.especialidad',
			'condiciones_cierre.condicion',
			'r.responsable as responsable_cierre'

        )
        ->join('responsables as r', 'consultas.responsable_cierre_id', '=', 'responsables.id')
        ->join('condiciones_cierre', 'consultas.especialidad_id', '=', 'condiciones_cierre.id')
        ->join('especialidad', 'consultas.especialidad_id', '=', 'especialidad.id')
        ->join('motivo_consultas', 'consultas.motivo_consulta_id', '=', 'motivo_consultas.id')
        ->join('estados_cierres', 'consultas.estado_cierre_id', '=', 'estados_cierres.id')
        ->join('motivo_consultas_profesionales', 'consultas.motivo_consultas_profesionales_id', 'motivo_consultas_profesionales.id')
        
        ->join('estados', 'consultas.estado_id', '=', 'estados.id')
        ->join('pacientes', 'consultas.paciente_id', '=', 'pacientes.id')
        ->join('comunas', 'pacientes.comuna_id', '=', 'comunas.id')
        ->join('regiones', 'comunas.padre', '=', 'regiones.id')
        ->join('agendamiento_pacientes', 'agendamiento_pacientes.consulta_id', '=', 'consultas.id')
        ->join('bloques', 'agendamiento_pacientes.bloque_id', '=', 'bloques.id')        
        ->where('consultas.estado_id', $gestion) 	
        ->where('pacientes.activo', 1) 	
        ->join('registroisapre', 'pacientes.rut', '=', 'registroisapre.RUT_AFILIADO')
        ->get();

        return $results;
    }
}