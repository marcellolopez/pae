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
		'comentario'
    ];    
}
