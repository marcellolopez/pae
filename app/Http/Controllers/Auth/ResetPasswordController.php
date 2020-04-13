<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Entities\Paciente;
use App\Entities\User;
use App\Notifications\CambioPassword;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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

    }

    public function showCreatePasswordPrestador(){
        $usuario = Auth::guard('prestador')->user();
        $url = 'prestador';
        return view('auth.createPassword', compact('usuario', 'url'));
    }

    function createPasswordPrestador(Request $request){
        $prestador = Auth::guard('prestador')->user();
        $validator = $this->validateFormCreatePassword($request);

        if($validator->fails()){
            return redirect()->route('showCreatePasswordPrestador')
                ->withErrors($validator)
                ->withInput();
        }

        if(Auth::guard('prestador')->attempt(['rut' => $prestador->rut, 'password' => $request->input('currentPassword')])){
            $info['password'] = bcrypt($request->input('password'));

            $prestador->update($info);
            return redirect()->route('welcomePrestador', compact('prestador'));
        }else{
            $validator->errors()->add('actualizacion', 'Las credenciales ingresadas son incorrectas');
            return redirect()->route('showCreatePasswordPrestador', compact('prestador'))
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function showCreatePasswordPaciente(){
        $usuario = Auth::guard('paciente')->user()->paciente;
        $url = 'paciente';
        return view('auth.createPassword', compact('usuario', 'url'));
    }

    function createPasswordPaciente(Request $request){
        $paciente = Auth::guard('paciente')->user()->paciente;
        $validator = $this->validateFormCreatePassword($request);

        if($validator->fails()){
            return redirect()->route('showCreatePasswordPaciente')
                ->withErrors($validator)
                ->withInput();
        }

        if(Auth::guard('paciente')->attempt(['rut' => $paciente->rut, 'password' => $request->input('currentPassword')])){
            $info['password'] = bcrypt($request->input('password'));
            $usuario = User::find(Auth::user()->id);
            $usuario->update($info);

            $paciente->notify(new CambioPassword($paciente));
            
            Auth::logout();
            return redirect()->route('showLoginPaciente')
                ->with('success','Has cambiado tu contraseña correctamente. Por favor, ingresa nuevamente.');
        }else{
            $validator->errors()->add('actualizacion', 'Las credenciales ingresadas son incorrectas');
            return redirect()->route('showCreatePasswordPaciente', compact('prestador'))
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function showUpdatePasswordPaciente(){
        $usuario = Auth::guard('paciente')->user();
        $url = 'paciente';
        $btnVolver = true;
        return view('auth.createPassword', compact('usuario', 'url', 'btnVolver'));
    }

    public function showUpdatePasswordPrestador(){
        $usuario = Auth::guard('prestador')->user();
        $url = 'prestador';
        $btnVolver = true;
        return view('auth.createPassword', compact('usuario', 'url', 'btnVolver'));
    }


    public function validateFormCreatePassword($request){
        return Validator::make($request->all(),[
            'username' => 'required',
            'currentPassword' => 'required',
            'password' => 'required|min:5',
            'password_confirmation' => 'same:password',
        ],[
            'username.required' => 'El campo username es obligatorio',
            'currentPassword.required' => 'El campo contraseña actual es obligatorio',
            'password.required' => 'El campo nueva constraseña es obligatorio',
            'password.min' => 'El campo nueva constraseña debe contener al menos 5 caracteres',
            'password_confirmation.same' => 'Las contraseñas no coinciden'
        ]);
    }
}
