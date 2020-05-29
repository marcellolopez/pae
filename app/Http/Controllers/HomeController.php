<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Entities\Paciente;
use App\Entities\MotivoConsulta;
use App\Entities\Consulta;
use App\Entities\Responsable;
use App\Entities\EstadoCierre;
use Illuminate\Support\Facades\Auth;
use Redirect,Response;
use DB;
use Illuminate\Support\Facades\Validator;
Use \Carbon\Carbon;
use Freshwork\ChileanBundle\Rut;
use \Yajra\Datatables\Datatables;


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
                $estados_cierres = EstadoCierre::all();
                $motivo_consultas = MotivoConsulta::all();
                $responsables = Responsable::all();
                return view('comercial/mi_historial', compact('motivo_consultas', 'estados_cierres', 'responsables'));      
                break;
        }            

    }

    public function mi_historial()
    {
        $pacientes = Paciente::with('motivo_consulta')->paginate(10);
        $motivo_consultas = MotivoConsulta::all();
        $estados_cierres = EstadoCierre::all();
        $responsables = Responsable::all();
        return view('mi_historial', compact('pacientes', 'motivo_consultas','estados_cierres', 'responsables'));
    }

    public function cambio_estado(Request $request)
    {

        $consulta = Consulta::find($request->id);

        switch ($request->val) {
            case 'gestionar':
                $consulta->estado_id = 2;
                $consulta->fecha_gestionado = date('Y-m-d H:i:s');
                $consulta->responsable_id = $request->responsable;
                break;
            
            case 'cerrar':
                $consulta->estado_id = 3;
                $consulta->fecha_cerrado = date('Y-m-d H:i:s');
                $consulta->estado_id = 3;
                $consulta->comentario_cierre = $request->comentario_cierre;
                $consulta->estado_cierre_id = $request->estado_cierre;
                break; 
        }
        $consulta->save();

        return Response::json($consulta->getAttributes());
    }

    public function consultar_paciente(Request $request)
    {
        $rut = $request->rut;
        $paciente = Paciente::where('rut', $rut)->first();
        $motivo_consultas = MotivoConsulta::all();
        if($paciente)
        {

            return view('registrar_consulta',compact('paciente','motivo_consultas'));
        }
        else
        {
            return redirect()->route('showRegistrarConsultaPaciente', compact('rut'))->with('info', 'El paciente no se encuentra registrado, por favor ingrese los datos.');
        }
        
    }    

    public function showRegistrarConsultaPaciente(Request $request)
    {
        $rut = $request->rut;
        $motivo_consultas = MotivoConsulta::all();
        return view('registrar_consulta_paciente',compact('rut','motivo_consultas'));
    }

    public function enviadoList(Request $paciente)
    {
        $pacientes_enviado = $this->lista(1);
        return DataTables()->of($pacientes_enviado)
            ->addColumn('fullname', function($paciente) {
                    return mb_strtoupper($paciente->nombres.' '.$paciente->apellidoPaterno,'utf-8');
                } 
            )
            ->addColumn('rut', function($paciente) {
                    return Rut::set($paciente->rut)->fix()->format() ;
                }                
            )          
            ->addIndexColumn()
            ->make(true);
    }

    public function gestionList(Request $paciente)
    {
        $pacientes_gestion = $this->lista(2);
        return DataTables()->of($pacientes_gestion)
            ->addColumn('fullname', function($paciente) {
                    return mb_strtoupper($paciente->nombres.' '.$paciente->apellidoPaterno,'utf-8');
                } 
            )
            ->addColumn('rut', function($paciente) {
                    return Rut::set($paciente->rut)->fix()->format() ;
                }                
            )          
            ->addIndexColumn()
            ->make(true);
    }

    public function cerradoList(Request $paciente)
    {
        $pacientes_cerrado = $this->lista(3);
        return DataTables()->of($pacientes_cerrado)
            ->addColumn('fullname', function($paciente) {
                    return mb_strtoupper($paciente->nombres.' '.$paciente->apellidoPaterno,'utf-8');
                } 
            )
            ->addColumn('rut', function($data) {
                    return Rut::set($data->rut)->fix()->format() ;
                }                
            )         
            ->addColumn('diff_gestion', function($data) {
                    $start  = new Carbon($data->fecha_enviado);
                    $end    = new Carbon($data->fecha_gestionado);
                    return $start->diff($end)->format('%H:%I');
                }                
            )             
            ->addColumn('diff_cerrado', function($data) {
                    $start  = new Carbon($data->fecha_gestionado);
                    $end    = new Carbon($data->fecha_cerrado);
                    return $start->diff($end)->format('%H:%I');
                }                
            )         
            ->addColumn('diff_total', function($data) {
                    $start  = new Carbon($data->fecha_enviado);
                    $end    = new Carbon($data->fecha_cerrado);
                    return $start->diff($end)->format('%H:%I');
                }                
            )                               
            ->addIndexColumn()
            ->make(true);
    }


    public function register_paciente_consulta(Request $request)
    {

        
        $rut_sin_dv = substr($request->rut, 0, -2);
        $paciente = Paciente::where('rut', $request->rut)->first();

        if($paciente)
        {
            $data               = $this->validator_paciente($request->all())->validate();
            $paciente->telefono = $request->telefono;
           //$paciente->celular  = $request->celular;
            $paciente->save();



        }
        else
        {
            $data               = $this->validator($request->all())->validate();
            $paciente = Paciente::create([
                'nombres'            => $request->nombres,
                'apellidoPaterno'    => $request->apellidoPaterno,
                'apellidoMaterno'    => $request->apellidoMaterno,
                'rut'                => $request->rut,                
                'email'              => $request->email,
                'telefono'           => $request->telefono,
                //'celular'            => $request->celular
            ]);
        }

        $consulta                     = New Consulta();
        $consulta->user_id            = Auth::user()->id;
        $consulta->paciente_id        = $paciente->id;
        $consulta->motivo_consulta_id = $request->motivo_consulta;
        $consulta->estado_id          = 1;
        $consulta->fecha_enviado      = date('Y-m-d H:i:s');
        $consulta->comentario         = $request->comentario;
        $consulta->save();


        /*/
        $paciente_array =[
            'nombre'             => $paciente->nombres.' '.$paciente->apellidoPaterno.' '.$paciente->apellidoMaterno,
            'rut'                => Rut:sete($request->rut)->fix()->format(),
            'email'              => $paciente->email,
            'telefono'           => $paciente->telefono,
            'celular'            => $request->celular,
            'motivo_consulta' => $paciente->motivo_consulta->motivo,
            'comentario'         => $paciente->comentario,
        ];
        /*/
        //$paciente->notify(new ConfirmacionPaciente($paciente_array));
        //$paciente->notify(new ConfirmacionComercial($paciente_array));

        return $this->showInfo('Se ha registrado la consulta con exito.');
    }

    public function lista($gestion)
    {
        switch ($gestion) {
            case 1:
                $fecha = 'enviado';
                break;
            case 2:
                $fecha = 'gestionado';
                break;
            case 3:
                $fecha = 'cerrado';
                break;

        }
        $pacientes = Consulta::select(
            'pacientes.id as id',
            'consultas.id as consulta_id',
            'pacientes.nombres as nombres',
            'pacientes.apellidoPaterno as apellidoPaterno',
            'pacientes.apellidoMaterno as apellidoMaterno',
            'pacientes.telefono as telefono',
            'pacientes.celular as celular',
            'pacientes.activo as activo',
            DB::raw('DATE_FORMAT(consultas.fecha_'.$fecha.', "%d-%m-%Y") as fecha'),
            DB::raw('DATE_FORMAT(consultas.fecha_'.$fecha.', "%H:%i") as hora'),
            'pacientes.email as email',
            'pacientes.rut as rut',
            'motivo_consultas.motivo as motivo',
            'consultas.motivo_consulta_id as motivo_consulta_id',
            'consultas.comentario as comentario',
            'consultas.comentario_cierre as comentario_cierre',
            'estados_cierres.nombre_estado as estado_cierre',
            'consultas.responsable as responsable',
            'consultas.fecha_enviado',
            'consultas.fecha_gestionado',
            'consultas.fecha_cerrado',
            'consultas.nombre_emergencia as contacto_emergencia',
            'consultas.telefono_emergencia as telefono_emergencia',
            DB::raw("CONCAT(DATE_FORMAT(agendamiento_pacientes.fecha, '%d-%m-%Y'),' ',bloques.bloque) AS agendamiento")

        )
        ->join('motivo_consultas', 'consultas.motivo_consulta_id', '=', 'motivo_consultas.id')
        ->join('estados_cierres', 'consultas.estado_cierre_id', '=', 'estados_cierres.id')
        ->join('pacientes', 'consultas.paciente_id', '=', 'pacientes.id')
        ->join('agendamiento_pacientes', 'agendamiento_pacientes.consulta_id', '=', 'consultas.id')
        ->join('bloques', 'agendamiento_pacientes.bloque_id', '=', 'bloques.id')        
        ->where('consultas.estado_id', $gestion);
        if(Auth::user()->roles[0]->id == 1)
        {
            $pacientes = $pacientes->where('consultas.user_id',Auth::user()->id);
        }
        $pacientes = $pacientes->get();      

        return $pacientes;  
    }

    public function showInfo($info)
    {
        return redirect()->route('welcome')
        ->with('success',$info);
    }

    protected function validator(array $data)
    {

        return Validator::make($data, [
            'nombres'          => 'required|string|max:255',
            'apellidoPaterno'  => 'required|string|max:255',
            'apellidoMaterno'  => 'required|string|max:255',
            'rut'              => 'required|string|min:7|max:8',//|cl_rut
            'email'            => 'max:255',
            'telefono'         => 'required|digits:9',
            //'celular'          => 'required_without:telefono',
            'motivo_consulta'  => 'required'
        ]);   
            
    }

    protected function validator_paciente(array $data)
    {

        return Validator::make($data, [
            'telefono'         => 'required|digits:9',
            //'celular'          => 'required_without:telefono',
            'motivo_consulta'  => 'required'
        ]);   
            
    }  

    public function mis_datos(Request $request)
    {
        if(Auth::user()->roles[0]->id == 1)
        {
            return view('mis_datos');
        }
        else
        {
            return view('comercial.mis_datos');
        }
        
    }

    public function consultar_detalles(Request $request)
    {

        $consulta = Consulta::select(
            'pacientes.id as id',
            'consultas.id as consulta_id',
            'pacientes.nombres as nombres',
            'pacientes.apellidoPaterno as apellidoPaterno',
            'pacientes.apellidoMaterno as apellidoMaterno',
            'pacientes.telefono as telefono',
            'pacientes.celular as celular',
            'pacientes.activo as activo',
            'pacientes.email as email',
            'pacientes.rut as rut',
            'pacientes.edad as edad',
            'motivo_consultas.motivo as motivo',
            'consultas.motivo_consulta_id as motivo_consulta_id',
            'consultas.comentario as comentario',
            'consultas.comentario_cierre as comentario_cierre',
            'estados_cierres.nombre_estado as estado_cierre',
            'estados_cierres.id as estado_cierre_id',
            'consultas.responsable as responsable',
            'consultas.responsable_id as responsable_id',
            'consultas.fecha_enviado',
            'consultas.fecha_gestionado',
            'consultas.fecha_cerrado',
            'consultas.estado_id',
            'consultas.nombre_emergencia as contacto_emergencia',
            'consultas.telefono_emergencia as telefono_emergencia',
            DB::raw('DATE_FORMAT(agendamiento_pacientes.fecha, "%d-%m-%Y") as fecha_agendamiento'),
            'bloques.bloque'
        )
        ->join('motivo_consultas', 'consultas.motivo_consulta_id', '=', 'motivo_consultas.id')
        ->join('estados_cierres', 'consultas.estado_cierre_id', '=', 'estados_cierres.id')
        ->join('pacientes', 'consultas.paciente_id', '=', 'pacientes.id')
        ->join('agendamiento_pacientes', 'agendamiento_pacientes.consulta_id', '=', 'consultas.id')
        ->join('bloques', 'agendamiento_pacientes.bloque_id', '=', 'bloques.id')
        ->where('consultas.id', $request->consulta_id);

        $paciente = $consulta->first();  
        if($paciente->responsable_id != null) 
        {
        $consulta = Consulta::select(
            'pacientes.id as id',
            'consultas.id as consulta_id',
            'pacientes.nombres as nombres',
            'pacientes.apellidoPaterno as apellidoPaterno',
            'pacientes.apellidoMaterno as apellidoMaterno',
            'pacientes.telefono as telefono',
            'pacientes.celular as celular',
            'pacientes.activo as activo',
            'pacientes.email as email',
            'pacientes.rut as rut',
            'motivo_consultas.motivo as motivo',
            'consultas.motivo_consulta_id as motivo_consulta_id',
            'consultas.comentario as comentario',
            'consultas.comentario_cierre as comentario_cierre',
            'estados_cierres.nombre_estado as estado_cierre',
            'estados_cierres.id as estado_cierre_id',
            'consultas.responsable as responsable',
            'consultas.responsable_id as responsable_id',
            'consultas.fecha_enviado',
            'consultas.fecha_gestionado',
            'consultas.fecha_cerrado',
            'consultas.estado_id',
            'consultas.nombre_emergencia as contacto_emergencia',
            'consultas.telefono_emergencia as telefono_emergencia',
            'responsables.responsable as nombre_responsable',
            DB::raw('DATE_FORMAT(agendamiento_pacientes.fecha, "%d-%m-%Y") as fecha_agendamiento'),
            'bloques.bloque')
        ->join('motivo_consultas', 'consultas.motivo_consulta_id', '=', 'motivo_consultas.id')
        ->join('estados_cierres', 'consultas.estado_cierre_id', '=', 'estados_cierres.id')
        ->join('pacientes', 'consultas.paciente_id', '=', 'pacientes.id')
        ->join('responsables', 'consultas.responsable_id', '=', 'responsables.id')
        ->join('agendamiento_pacientes', 'agendamiento_pacientes.consulta_id', '=', 'consultas.id')
        ->join('bloques', 'agendamiento_pacientes.bloque_id', '=', 'bloques.id')
        ->where('consultas.id', $request->consulta_id);
        $paciente = $consulta->first();            

        

          
        }

        return view('assets.detalles',compact('paciente'));
    }

    public function lista_responsables(Request $request)
    {

        $paciente = Consulta::select(
            'pacientes.id as id',
            'consultas.id as consulta_id',
            'pacientes.nombres as nombres',
            'pacientes.apellidoPaterno as apellidoPaterno',
            'pacientes.apellidoMaterno as apellidoMaterno',
            'pacientes.telefono as telefono',
            'pacientes.celular as celular',
            'pacientes.activo as activo',
            'pacientes.email as email',
            'pacientes.rut as rut',
            'motivo_consultas.motivo as motivo',
            'consultas.motivo_consulta_id as motivo_consulta_id',
            'consultas.comentario as comentario',
            'consultas.comentario_cierre as comentario_cierre',
            'estados_cierres.nombre_estado as estado_cierre',
            'estados_cierres.id as estado_cierre_id',
            'consultas.responsable as responsable',
            'consultas.fecha_enviado',
            'consultas.fecha_gestionado',
            'consultas.fecha_cerrado',
            'consultas.nombre_emergencia as contacto_emergencia',
            'consultas.telefono_emergencia as telefono_emergencia'

        )
        ->join('motivo_consultas', 'consultas.motivo_consulta_id', '=', 'motivo_consultas.id')
        ->join('estados_cierres', 'consultas.estado_cierre_id', '=', 'estados_cierres.id')
        ->join('pacientes', 'consultas.paciente_id', '=', 'pacientes.id')
        ->where('consultas.id', $request->consulta_id);

        $paciente = $paciente->first();      
        return view('assets.detalles',compact('paciente'));
    }
}