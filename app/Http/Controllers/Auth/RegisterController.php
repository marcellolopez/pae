<?php

namespace App\Http\Controllers\Auth;

//use App\Role;
use App\Entities\Paciente;
use App\Entities\Consulta;
use App\Entities\MotivoConsulta;
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

        $rut_sin_dv = substr($request->rut, 0, -2);
        $paciente = Paciente::where('rut', $rut_sin_dv)->first();

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
                'rut'                => $rut_sin_dv,                
                'email'              => $request->email,
                'telefono'           => $request->telefono,
                'celular'            => $request->celular,
            ]);
        }

        $consulta                     = New Consulta();
        $consulta->user_id            = null;
        $consulta->paciente_id        = $paciente->id;
        $consulta->motivo_consulta_id = $request->motivo_consulta;
        $consulta->estado_id          = 1;
        $consulta->fecha_enviado      = now();
        $consulta->comentario         = $request->comentario;
        $consulta->save();


        return $this->showInfoGuest('La consulta se ha registrado, será contactado a la brevedad por nuestro centro.');
    }

    public function register_auth(Request $request)
    {


        $data = $this->validator($request->all())->validate();
        $rut_sin_dv = substr($request->rut, 0, -2);
        //$paciente = Paciente::where('rut', $rut_sin_dv)->first();
        //$password = Hash::make($request->password);

        $paciente = Paciente::create([
            'nombres'            => $request->nombres,
            'apellidoPaterno'    => $request->apellidoPaterno,
            'apellidoMaterno'    => $request->apellidoMaterno,
            'rut'                => $rut_sin_dv,
            'email'              => $request->email,
            'telefono'           => $request->telefono,
            'celular'            => $request->celular,
            'motivo_consulta_id' => $request->motivo_consulta,
            'comentario'         => $request->comentario,
        ]);


        $paciente_array =[
            'nombre'             => $paciente->nombres.' '.$paciente->apellidoPaterno.' '.$paciente->apellidoMaterno,
            'rut'                => Rut::parse($request->rut)->fix()->format(),
            'email'              => $paciente->email,
            'telefono'           => $paciente->telefono,
            'celular'            => $request->celular,
            'motivo_consulta' => $paciente->motivo_consulta->motivo,
            'comentario'         => $paciente->comentario,
        ];
        //$paciente->notify(new ConfirmacionPaciente($paciente_array));
        //$paciente->notify(new ConfirmacionComercial($paciente_array));

        return $this->showInfo('Se ha registrado la consulta, será contactado por nuestro centro a la brevedad.');
    }

    public function register_paciente_consulta(Request $request)
    {

        
        $rut_sin_dv = substr($request->rut, 0, -2);
        $paciente = Paciente::where('rut', $request->rut)->first();
        dd($paciente);
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
        return redirect()->route('login')
        ->with('success',$info);
    }
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'nombres'          => 'required|string|max:255',
            'apellidoPaterno'  => 'required|string|max:255',
            'apellidoMaterno'  => 'required|string|max:255',
            'rut'              => 'required|string|min:9|max:10|cl_rut',
            'email'            => 'required|string|email|max:255',
            'telefono'         => 'required_without:celular',
            'celular'          => 'required_without:telefono',
            'motivo_consulta'  => 'required'
        ]);   
            
    }

    protected function validator_paciente(array $data)
    {

        return Validator::make($data, [
            'email'            => 'required|string|email|max:255',
            'telefono'         => 'required_without:celular',
            'celular'          => 'required_without:telefono',
            'motivo_consulta'  => 'required'
        ]);   
            
    }    

}
