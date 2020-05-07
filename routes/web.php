<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([    
    'namespace' => 'Auth',    
    'middleware' => 'api',    
    'prefix' => 'password'
], function () {    
    Route::post('create', 'PasswordResetController@create');
    Route::get('find/{token}', 'PasswordResetController@find');
    Route::post('reset', 'PasswordResetController@reset');
    Route::get('register', 'RegisterController@showRegistrationForm');

    Route::get('info', 'RegisterController@showInfo');
    Route::post('register', 'RegisterController@register');
});
// Fin


Route::get('export/{estado}', 'ExcelController@export');
Route::get('registro', function () {
    return redirect()->route('register');
});

Route::get('crear_usuario', 'Auth\LoginController@crearUsuario')->name('crear_usuario');

Auth::routes();

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('welcome', 'HomeController@welcome')
	    ->name('welcome');

Route::post('cambio_estado','HomeController@cambio_estado');



Route::group(['middleware' => ['auth']], function () {

    Route::get('ficha_met/{id}', 'FichaController@index')->name('ficha_met');

    Route::post('consultar_paciente','HomeController@consultar_paciente')->name('consultar_paciente');
    Route::post('consultar_detalles','HomeController@consultar_detalles')->name('consultar_detalles');
    Route::post('lista_responsables','HomeController@lista_responsables')->name('lista_responsables');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('welcome', 'HomeController@welcome')
            ->name('welcome');
    Route::get('comercial.enviado','HomeController@enviadoList')->name('comercial.enviado');
    Route::get('comercial.gestion','HomeController@gestionList')->name('comercial.gestion');
    Route::get('comercial.cerrado','HomeController@cerradoList')->name('comercial.cerrado');
    Route::post('register_paciente_consulta', 'HomeController@register_paciente_consulta')->name('register_paciente_consulta');
    Route::get('showRegistrarConsultaPaciente', 'HomeController@showRegistrarConsultaPaciente')->name('showRegistrarConsultaPaciente');
    Route::post('showRegistrarConsultaPaciente', 'HomeController@register_paciente_consulta')->name('showRegistrarConsultaPaciente');
    Route::get('mi_historial', 'HomeController@mi_historial')->name('mi_historial');
    Route::get('mis_datos', 'HomeController@mis_datos')->name('mis_datos');
	    //->middleware('auth:paciente');
	Route::get('logout', 'Auth\LoginController@logout')
	    ->name('logout');	    


});

