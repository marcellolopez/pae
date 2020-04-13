<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class MotivoConsulta extends Model
{
    protected $table = 'motivo_consultas';
    protected $fillable = [
        'motivo',
    ];    

    
}
