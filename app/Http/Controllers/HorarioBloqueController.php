<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Helpers\MainHelper;

class HorarioBloqueController extends Controller
{
    public static function cargar_bloques(Request $request)
    {
    	if($request->val == null)
    	{
    		return false;
    	}
    	else
    	{
	    	$var = MainHelper::bloques($request->val);
	    	return response()->json($var);   		
    	}
    }
}
