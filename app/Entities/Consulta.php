<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = 'consultas';
    protected $fillable = [
		'user_id',
		'paciente_id',
		'motivo_consulta_id',
		'estado_id',
		'fecha_enviado',
		'fecha_gestionado',
		'fecha_cerrado',
		'comentario',
		'responsable',
		'comentario_cierre',
		'estado_cierre',
		'nombre_emergencia',
        'telefono_emergencia',
        'responsable_id'
    ];   
    public function motivo_consulta()
    {
        return $this->belongsTo(MotivoConsulta::class, 'motivo_consulta_id');
    }      
     
}
