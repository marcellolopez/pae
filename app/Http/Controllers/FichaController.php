<?php

namespace App\Http\Controllers;


use App\Entities\Paciente;
use App\Http\Controllers\Helpers\MainHelper;
use Illuminate\Http\Request;
use Freshwork\ChileanBundle\Rut;

class FichaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paciente = MainHelper::consulta_por_id($request->id);
        $rut = Rut::set($paciente->rut)->fix()->format(Rut::FORMAT_WITH_DASH);
        
        $isapres  = MainHelper::isapres();
        return view('comercial.ficha_met',compact('paciente', 'isapres', 'rut'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($id);
        
        $data = $this->validator($request->all())->validate();        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
}
