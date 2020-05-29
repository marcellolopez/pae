<?php

namespace App\Http\Controllers;


use App\Entities\Paciente;
use App\Entities\Region;
use App\Entities\Comuna;
use App\Entities\CondicionCierre;
use App\Entities\Responsable;
use App\Entities\Consulta;
use App\Entities\Especialidad;
use App\Entities\MotivoConsultaProfesional;
use App\Http\Controllers\Helpers\MainHelper;
use Illuminate\Http\Request;
use Freshwork\ChileanBundle\Rut;
use Illuminate\Support\Facades\Validator;

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
        $regiones = Region::where('activo',1)->orderBy('id')->get();
        $responsables = Responsable::all();
        $isapres  = MainHelper::isapres();
        $especialidades  = Especialidad::where('ver','si')->get();
        $condiciones_cierre  = CondicionCierre::all();
        $motivos_profesional = MotivoConsultaProfesional::all();
        $region = null;
        $comuna = null;
        if($paciente->comuna_id != null){
            $comuna = Comuna::find($paciente->comuna_id);
            $region = Region::find($comuna->padre);
        }

        return view('comercial.ficha_met',compact('paciente', 'isapres', 'rut', 'responsables', 'regiones', 'condiciones_cierre','especialidades','comuna', 'region', 'motivos_profesional'));
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
        dd($request);
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
        $data = $this->validator($request->all())->validate();    
        $consulta = Consulta::find($id);
        $paciente = Paciente::find($consulta->paciente_id);
  
        $paciente->sexo = $request->sexo;
        $paciente->edad = $request->edad;
        $paciente->comuna_id = $request->comuna;
        $paciente->ubicacion_actual = $request->ubicacion_actual;
        $paciente->save();

        $consulta->explicacion_foco = $request->explicacion;
        $consulta->consideraciones = $request->consideraciones;
        $consulta->confirma_mesa_ayuda =  filter_var($request->acepta_mesa, FILTER_VALIDATE_BOOLEAN);;
        $consulta->otros = $request->otros;
        $consulta->responsable_cierre_id = $request->responsable_cierre;
        $consulta->especialidad_id = $request->especialidad;
        $consulta->cierre_caso_id = $request->responsable_cierre;
        $consulta->motivo_consultas_profesionales_id = $request->motivo_consulta_profesional;
        $consulta->otros_profesional = $request->otros_profesional;
        $consulta->comentario_profesional      = $request->comentario_profesional;
        $consulta->save();

         return redirect()->back()->withSuccess('Los datos han sido guardados con exito.');   
      
            
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

    public function cargar_comunas(Request $request)
    {
        $comunas = Comuna::where('padre', $request->val)->get();

        return $comunas;
    }

    protected function validator(array $data)
    {

        return Validator::make($data, [
            'sexo'                => 'required|string',
            'edad'                => 'required|numeric',
            'comuna'              => 'required',
            'ubicacion_actual'    => 'required|string',
            'explicacion'         => 'required|string',
            'consideraciones'     => 'required|string',
            //'celular'             => 'numeric',
            'acepta_mesa'         => 'required',
            'responsable_cierre'  => 'required',

        ]);   
            
    }    
}
