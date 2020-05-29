<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class AgendamientoPaciente extends Model
{
    protected $table = 'agendamiento_pacientes';
    protected $fillable = [
		'bloque_id',
		'consulta_id',
		'fecha',
    ];   
    public $timestamps = false;
}
