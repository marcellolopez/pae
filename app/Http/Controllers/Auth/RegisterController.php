<?php

namespace App\Http\Controllers\Auth;

//use App\Role;
use App\Entities\Paciente;
use App\Entities\Consulta;
use App\Entities\MotivoConsulta;
use App\Entities\CargaIsapre;
use App\Entities\RegistroIsapre;
use App\Notifications\ConfirmacionPaciente;
use App\Notifications\ConfirmacionComercial;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Freshwork\ChileanBundle\Rut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');

    }



    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    public function register(Request $request)
    {

        if(strpos($request->rut, '-'))
        {
            
        }
        else
        {
            $request->rut = Rut::parse($request->rut)->format(Rut::FORMAT_WITH_DASH);
        }

        $rut_sin_dv = substr($request->rut, 0, -2);
        $data       = $this->validator($request->all())->validate();

        $paciente        = Paciente::where('rut', $rut_sin_dv)->first();
        $registro_isapre = RegistroIsapre::where('RUT_AFILIADO', $rut_sin_dv)->first();
        $carga_isapre    = CargaIsapre::where('RUT_CARGA', $rut_sin_dv)->first();

        if($registro_isapre || $carga_isapre)
        {
            $activo = true;
        }
        else
        {
            $activo = false;
        }

     
        if($paciente)
        {
           
            return $this->showInfoGuest('Usted ya registra una solicitud, por favor contactarse con su isapre.');
        

        }
        else
        {
          
            $paciente = Paciente::create([
                'nombres'            => $request->nombres,
                'apellidoPaterno'    => $request->apellidoPaterno,
                'apellidoMaterno'    => $request->apellidoMaterno,
                'rut'                => $rut_sin_dv,                
                'email'              => $request->email,
                'telefono'           => $request->telefono,
                'celular'            => $request->celular,
                'activo'             => $activo,
            ]);
        }
        


        $consulta                      = New Consulta();
        $consulta->user_id             = null;
        $consulta->paciente_id         = $paciente->id;
        $consulta->motivo_consulta_id  = $request->motivo_consulta;
        $consulta->estado_id           = 1;
        $consulta->fecha_enviado       = now();
        $consulta->comentario          = $request->comentario;
        $consulta->telefono_emergencia = $request->telefono_emergencia;
        $consulta->nombre_emergencia   = $request->nombre_emergencia;
        $consulta->comentario_cierre   = 'Sin comentario';
        $consulta->estado_cierre_id       = 1;        
        $consulta->save();

        //$consulta = Consulta::where('id', $consulta->id)->with('motivo_consulta')->first();
                
        $paciente_array =[
            'nombre'             => $paciente->nombres.' '.$paciente->apellidoPaterno.' '.$paciente->apellidoMaterno,
            'rut'                => Rut::parse($request->rut)->fix()->format(),
            'email'              => $paciente->email,
            'telefono'           => $paciente->telefono,
            'celular'            => $request->celular,
            'motivo_consulta'    => $consulta->motivo_consulta->motivo,
            'comentario'         => $consulta->comentario,
            'activo'             => $activo,
        ];

        if($activo == true)
        {
            $paciente->notify(new ConfirmacionComercial($paciente_array));
            $paciente->notify(new ConfirmacionPaciente($paciente_array));
            return $this->showInfoGuest('Su solicitud ha sido registrada con éxito, será contactado a la brevedad por un psicólogo especialista de nuestro equipo.');
        }
        else
        {
            $paciente->notify(new ConfirmacionComercial($paciente_array));
            return $this->showInfoGuest('Su solicitud ha registrado un problema, nos contactaremos con su Isapre para aclarar su situación.');
        }
        
    }

    public function register_dinamico(Request $request)
    {
        dd($request);
        if(strpos($request->rut, '-'))
        {
            
        }
        else
        {
            $request->rut = Rut::parse($request->rut)->format(Rut::FORMAT_WITH_DASH);
        }

        $rut_sin_dv = substr($request->rut, 0, -2);
        $data       = $this->validator($request->all())->validate();

        $paciente        = Paciente::where('rut', $rut_sin_dv)->first();
        $registro_isapre = RegistroIsapre::where('RUT_AFILIADO', $rut_sin_dv)->first();
        $carga_isapre    = CargaIsapre::where('RUT_CARGA', $rut_sin_dv)->first();

        if($registro_isapre || $carga_isapre)
        {
            $activo = true;
        }
        else
        {
            $activo = false;
        }

     
        if($paciente)
        {
           
            return $this->showInfoGuest('Usted ya registra una solicitud, por favor contactarse con su isapre.');
        

        }
        else
        {
          
            $paciente = Paciente::create([
                'nombres'            => $request->nombres,
                'apellidoPaterno'    => $request->apellidoPaterno,
                'apellidoMaterno'    => $request->apellidoMaterno,
                'rut'                => $rut_sin_dv,                
                'email'              => $request->email,
                'telefono'           => $request->telefono,
                'celular'            => $request->celular,
                'activo'             => $activo,
            ]);
        }
        


        $consulta                      = New Consulta();
        $consulta->user_id             = null;
        $consulta->paciente_id         = $paciente->id;
        $consulta->motivo_consulta_id  = $request->motivo_consulta;
        $consulta->estado_id           = 1;
        $consulta->fecha_enviado       = now();
        $consulta->comentario          = $request->comentario;
        $consulta->telefono_emergencia = $request->telefono_emergencia;
        $consulta->nombre_emergencia   = $request->nombre_emergencia;
        $consulta->comentario_cierre   = 'Sin comentario';
        $consulta->estado_cierre_id       = 1;        
        $consulta->save();

        //$consulta = Consulta::where('id', $consulta->id)->with('motivo_consulta')->first();
                
        $paciente_array =[
            'nombre'             => $paciente->nombres.' '.$paciente->apellidoPaterno.' '.$paciente->apellidoMaterno,
            'rut'                => Rut::parse($request->rut)->fix()->format(),
            'email'              => $paciente->email,
            'telefono'           => $paciente->telefono,
            'celular'            => $request->celular,
            'motivo_consulta'    => $consulta->motivo_consulta->motivo,
            'comentario'         => $consulta->comentario,
            'activo'             => $activo,
        ];

        if($activo == true)
        {
            $paciente->notify(new ConfirmacionComercial($paciente_array));
            $paciente->notify(new ConfirmacionPaciente($paciente_array));
            return $this->showInfoGuest('Su solicitud ha sido registrada con éxito, será contactado a la brevedad por un psicólogo especialista de nuestro equipo.');
        }
        else
        {
            $paciente->notify(new ConfirmacionComercial($paciente_array));
            return $this->showInfoGuest('Su solicitud ha registrado un problema, nos contactaremos con su Isapre para aclarar su situación.');
        }
        
    }

    public function register_paciente_consulta(Request $request)
    {

        
        $rut_sin_dv = substr($request->rut, 0, -2);
        $paciente = Paciente::where('rut', $request->rut)->first();
      
        if($paciente)
        {
            $data               = $this->validator_paciente($request->all())->validate();
            $paciente->email    = $request->email;
            $paciente->telefono = $request->telefono;
            $paciente->celular  = $request->celular;
            $paciente->save();



        }
        else
        {
            $paciente = Paciente::create([
                'nombres'            => $request->nombres,
                'apellidoPaterno'    => $request->apellidoPaterno,
                'apellidoMaterno'    => $request->apellidoMaterno,
                'rut'                => $request->rut,                
                'email'              => $request->email,
                'telefono'           => $request->telefono,
                'celular'            => $request->celular,
            ]);


        }

        $consulta                     = New Consulta();
        $consulta->user_id            = Auth::user()->id;
        $consulta->paciente_id        = $paciente->id;
        $consulta->motivo_consulta_id = $request->motivo_consulta;
        $consulta->estado_id          = 1;
        $consulta->fecha_enviado      = now();
        $consulta->comentario         = $request->comentario;
        $consulta->nombre_emergencia  = $request->nombre_emergencia;
        $consulta->telefono_emergencia= $request->telefono_emergencia;
        $consulta->save();


        /*/
        $paciente_array =[
            'nombre'             => $paciente->nombres.' '.$paciente->apellidoPaterno.' '.$paciente->apellidoMaterno,
            'rut'                => Rut::parse($request->rut)->fix()->format(),
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

    public function showRegistrationDinamicoForm($logo = null)
    {
        switch ($logo) {
            case 'banmedica':
                $img = 'banmedica-logo.png';
                break;
            case 'vidatres':
                $img = 'vidatres-logo.png';
                break;            
            default:
                $img = null;
                break;
        }
        $motivo_consultas = MotivoConsulta::all();
        return view('auth.register_dinamico',compact('motivo_consultas', 'logo', 'img'));
    }

    public function showRegistrationForm()
    {
        $motivo_consultas = MotivoConsulta::all();
        return view('auth.register',compact('motivo_consultas'));
    }

    public function showInfo($info)
    {
        return redirect()->route('welcome')
        ->with('success',$info);
    }
    public function showInfoGuest($info)
    {
        return view('auth.info', compact('info'));
    }
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'nombres'             => 'required|string|max:255',
            'apellidoPaterno'     => 'required|string|max:255',
            'apellidoMaterno'     => 'required|string|max:255',
            'rut'                 => 'required|string|min:9|max:10|cl_rut',
            'email'               => 'required|string|email|max:255',
            'telefono'            => 'required|digits:9',
            //'celular'             => 'numeric',
            'motivo_consulta'     => 'required',
            'nombre_emergencia'   => 'required|string|max:255',
            'telefono_emergencia' => 'required|digits:9',

        ],
        [
            'rut.cl_rut' => 'El campo RUT debe contener guion y digito verificador, ejemplo : 1234567-8'
        ]);   
    
    }

    protected function validator_paciente(array $data)
    {

        return Validator::make($data, [
            'email'               => 'required|string|email|max:255',
            'telefono'            => 'required|digits:9',
            //'celular'             => 'numeric',
            'motivo_consulta'     => 'required',
            'nombre_emergencia'   => 'required|string|max:255',
            'telefono_emergencia' => 'required|digits:9',
        ]);   


            
    }    

}
