<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Entities\Paciente;
use App\Entities\Prestador;
use App\User;
use App\Role;
use App\RoleUser;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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

    public function login(Request $request)
    {
        // validate the info, create rules for the inputs
        $rules = array(
            'rut'    => 'required', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:6' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);
        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {
            
            $user = User::where('rut' , $request->rut)->first();
            // attempt to do the login
            if ($user && (Hash::check($request->password,$user->password))) {
           
                $auth = Auth::loginUsingId($user->id);
                // validation successful!
                // redirect them to the secure section or whatever
                // return Redirect::to('secure');
                // for now we'll just echo success (even though echoing in a controller is bad)

                return Redirect::to('welcome');

                

            } else {   
               
                // validation not successful, send back to form 
                return Redirect::to('login')->with('error','No es posible autenticar' );
                //var_dump($userdata);

            }

        }
    }
    public function logout()
    {
        Auth::logout();
        return Redirect::to('login');

    }

    public function crearUsuario()
    {
        $user = new User;
        $user->nombres          = 'Marcello';
        $user->apellido_paterno = 'López';
        $user->apellido_materno = 'Cáceres';

        $user->rut      = '16366326';
        $user->telefono = '974163322';
        $user->email    = 'mlc74163322@gmail.com';
        $user->password = Hash::make('123456');
        $user->save();

        $user = new User;
        $user->nombres          = 'Departamento';
        $user->apellido_paterno = 'área';
        $user->apellido_materno = 'Comercial';
        $user->rut      = '11111111';
        $user->telefono = '974163322';
        $user->email    = 'mlopez@cetep.cl';
        $user->password = Hash::make('123456');
        $user->save();        

    }

    public function crearRoles()
    {
        $user = new Role;
        $user->name          = 'Enfermera';
        $user->save();

    
        $user = new Role;
        $user->name          = 'Comercial';
        $user->save();   

        $user = new RoleUser;
        $user->user_id          = 1;
        $user->role_id          = 1;
        $user->save();

    
        $user = new RoleUser;
        $user->user_id          = 2;
        $user->role_id          = 2;
        $user->save();                

    }
}
