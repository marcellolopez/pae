<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Entities\Paciente;
use App\Entities\MotivoConsulta;
use Illuminate\Support\Facades\Auth;
use Redirect,Response;
use DB;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);        
        return view('home');
    }
    public function welcome()
    {
        switch (Auth::user()->roles[0]->id) {
            case 1:
                $pacientes = Paciente::with('motivo_consulta')->paginate(10);
                $motivo_consultas = MotivoConsulta::all();
                return view('welcome', compact('pacientes', 'motivo_consultas'));
                break;
            case 2:
                $pacientes_enviado = Paciente::with('motivo_consulta')->where('estado_id', 1)->get();
                $pacientes_en_gestion = Paciente::with('motivo_consulta')->where('estado_id', 2)->get();
                $pacientes_cerrado = Paciente::with('motivo_consulta')->where('estado_id', 3)->get();
                $motivo_consultas = MotivoConsulta::all();
                return view('comercial/mi_historial', compact('pacientes_enviado', 'pacientes_en_gestion','pacientes_cerrado', 'motivo_consultas'));      
                break;
        }            

    }



    public function mi_historial()
    {
        $pacientes = Paciente::with('motivo_consulta')->paginate(10);
        $motivo_consultas = MotivoConsulta::all();
        return view('mi_historial', compact('pacientes', 'motivo_consultas'));
    }

    public function cambio_estado(Request $request)
    {

        $paciente = Paciente::find($request->id);

        switch ($request->val) {
            case 'gestionar':
                $paciente->estado_id = 2;
                break;
            
            case 'cerrar':
                $paciente->estado_id = 3;
                break;
        }
        $paciente->save();

        return Response::json($paciente->getAttributes());
    }

    public function consultar_paciente(Request $request)
    {

        $paciente = Paciente::where('rut', $request->rut)->first();
        if($paciente)
        {
            return Response::json($paciente);
        }
        else
        {
            return Response::json(null);
        }
        
    }    

    public function enviadoList(Request $paciente)
    {
        //$pacientes_enviado = Paciente::query();
        $pacientes_enviado = Paciente::select(
            'pacientes.id as id',
            'nombres',
            'apellidoPaterno',
            'apellidoMaterno',
            'telefono',
            DB::raw('DATE_FORMAT(pacientes.created_at, "%d-%m-%Y") as fecha'),
            DB::raw('DATE_FORMAT(pacientes.created_at, "%H:%i") as hora'),
            'email',
            'rut',
            'motivo_consultas.motivo as motivo',
            'motivo_consulta_id',
            'comentario'

        )
        ->join('motivo_consultas', 'pacientes.motivo_consulta_id', '=', 'motivo_consultas.id')
        ->where('pacientes.estado_id', 1)
        ->get();
        return DataTables()->of($pacientes_enviado)
            ->addColumn('fullname',
                '{{$nombres}} {{$apellidoPaterno}} {{$apellidoMaterno}}'
            )
            ->addIndexColumn()
            ->make(true);
    }

    public function gestionList(Request $paciente)
    {
        //$pacientes_enviado = Paciente::query();
        $pacientes_gestion = Paciente::select(
            'pacientes.id as id',
            'nombres',
            'apellidoPaterno',
            'apellidoMaterno',
            'telefono',
            DB::raw('DATE_FORMAT(pacientes.created_at, "%d-%m-%Y") as fecha'),
            DB::raw('DATE_FORMAT(pacientes.created_at, "%H:%i") as hora'),
            'email',
            'rut',
            'motivo_consultas.motivo as motivo',
            'motivo_consulta_id',
            'comentario'

        )
        ->join('motivo_consultas', 'pacientes.motivo_consulta_id', '=', 'motivo_consultas.id')
        ->where('pacientes.estado_id', 2)
        ->get();
        return DataTables()->of($pacientes_gestion)
            ->addColumn('fullname',
                '{{$nombres}} {{$apellidoPaterno}} {{$apellidoMaterno}}'
            )
            ->addIndexColumn()
            ->make(true);
    }

    public function cerradoList(Request $paciente)
    {
        //$pacientes_enviado = Paciente::query();
        $pacientes_cerrado = Paciente::select(
            'pacientes.id as id',
            'nombres',
            'apellidoPaterno',
            'apellidoMaterno',
            'telefono',
            DB::raw('DATE_FORMAT(pacientes.created_at, "%d-%m-%Y") as fecha'),
            DB::raw('DATE_FORMAT(pacientes.created_at, "%H:%i") as hora'),
            'email',
            'rut',
            'motivo_consultas.motivo as motivo',
            'motivo_consulta_id',
            'comentario'

        )
        ->join('motivo_consultas', 'pacientes.motivo_consulta_id', '=', 'motivo_consultas.id')
        ->where('pacientes.estado_id', 3)
        ->get();
        return DataTables()->of($pacientes_cerrado)
            ->addColumn('fullname',
                '{{$nombres}} {{$apellidoPaterno}} {{$apellidoMaterno}}'
            )
            ->addIndexColumn()
            ->make(true);
    }
}