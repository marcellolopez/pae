<?php

namespace App\Http\Controllers\Helpers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entities\Consulta;

class MainHelper extends Controller
{
    public static function cantidad_consultas_cerradas()
    {
    	$cantidad = Consulta::where('estado_id', 3)->count();
    	return $cantidad;
    }
}
