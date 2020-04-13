<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Paciente extends Model
{
    use Notifiable;

    protected $table = 'pacientes';
    protected $fillable = [
        'nombres',
        'apellidoPaterno',
        'apellidoMaterno',
        'rut',
        'email',
        'telefono',
        'celular',
        'motivo_consulta_id',
        'comentario'
    ];    
    public function motivo_consulta()
    {
        return $this->belongsTo(MotivoConsulta::class, 'motivo_consulta_id');
    }   
}
