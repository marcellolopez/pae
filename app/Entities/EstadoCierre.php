<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class EstadoCierre extends Model
{
    protected $table = 'estados_cierres';
    protected $fillable = [
		'nombre_estado'
    ];   
}
