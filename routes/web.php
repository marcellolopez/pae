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

Route::get('crear_usuario', 'Auth\LoginController@crearUsuario')->name('crear_usuario');

Auth::routes();
Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('welcome', 'HomeController@welcome')
	    ->name('welcome');
        
Route::post('cambio_estado','HomeController@cambio_estado');
Route::post('consultar_paciente','HomeController@consultar_paciente');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('welcome', 'HomeController@welcome')
            ->name('welcome');
    Route::get('comercial.enviado','HomeController@enviadoList')->name('comercial.enviado');
    Route::get('comercial.gestion','HomeController@gestionList')->name('comercial.gestion');
    Route::get('comercial.cerrado','HomeController@cerradoList')->name('comercial.cerrado');

    Route::get('mi_historial', 'HomeController@mi_historial')
            ->name('mi_historial');
	    //->middleware('auth:paciente');
	Route::get('logout', 'Auth\LoginController@logout')
	    ->name('logout');	    


});

