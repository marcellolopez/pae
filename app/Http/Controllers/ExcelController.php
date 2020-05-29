<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ConsultasExport;

class ExcelController
{

    public function export($estado)
    {
        switch ($estado) {
            case 1:
                $nombre = 'enviado';
                break;
            case 2:
                $nombre = 'gestionado';
                break;
            case 3:
                $nombre = 'cerrado';
                break;

        }        
        return Excel::download(new ConsultasExport($estado), $nombre.'.xlsx');
    }
}


