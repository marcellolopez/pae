@extends('layout')

@section('customCss')
    <link rel="stylesheet" href="{{ asset('css/paciente/pacienteWelcome.css') }}">
@endsection

@section('content')


    <div class="row d-flex justify-content-center mb-1">
        <div class="col-md-10">
            <div class="container">
            <br>
            <div class="card ">
                <div class="card-header bg-primary text-white">
                   
                        Registrar consulta
                    
                </div>
                <div class="card-body">
                        <form method="POST" class="" action="{{ route('register_paciente_consulta') }}" aria-label="{{ __('Register') }}">

                            @csrf
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <h5>¡Atención!</h5>
                                <ul style="list-style: none; margin: 0; padding: 0">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="control-label text-left" for="rut">RUT</label>
                                        <label id="" class="form-control text-label">{{ old('rut',$paciente->rut) }}</label>
                                        <input id="rut" type="hidden" class="form-control{{ $errors->has('rut') ? ' is-invalid' : '' }}" name="rut" value="{{ old('rut', $paciente->rut) }}" >

                                    </div>                                    
                                </div>
                                <div class="col-4">
                                    <div class="form-group ">
                                        <label class="control-label text-left"  for="nombres">Nombre completo</label>
                                        
                                        <label id="nombres" class="form-control text-label">{{ old('nombres',$paciente->nombres) }} {{ old('apellidoPaterno',$paciente->apellidoPaterno) }} {{ old('apellidoMaterno',$paciente->apellidoMaterno) }}</label>

                                    </div>                                    
                                </div>
                                <div class="col-4">
                                    <div class="form-group ">
                                        <label class="control-label text-left" for="email">Email</label>
   
                                        <label id="email" class="form-control text-label">{{ old('nombres',$paciente->email) }}</label>
                                        

                                    </div>                                    
                                </div>                                                                
                            </div>
                            <hr>
                            <div class="row">

                                    <div class="col-6">                        
                                        <div class="form-group ">
                                            <label class="control-label text-left" for="telefono">Teléfono Contacto *</label>
                                            <input id="telefono" type="number" class=" form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono',$paciente->telefono) }}" placeholder="Teléfono"  >
                                        </div>   
                                    </div>

                                    <div class="col-6">   
                                        <div class="form-group ">
                                            <label class="control-label text-left" for="motivo_consulta">Motivo Consulta *</label>
                                            <select  class=" form-control{{ $errors->has('motivo_consulta') ? ' is-invalid' : '' }}" name="motivo_consulta" required>
                                                <option value="">Seleccione</option>
                                                @foreach($motivo_consultas as $motivo)
                                                @if (old('motivo_consulta') == $motivo->id)
                                                <option value="{{ $motivo->id }}" selected>{{ $motivo->motivo }}</option>
                                                @else
                                                <option value="{{ $motivo->id }}">{{ $motivo->motivo }}</option>
                                                @endif
                                                @endforeach

                                            </select>                            
                                        </div>   
                                    </div>                             
                                </div>
                                <div class="row">
                                    <div class="col-12">                              


                                 
                                        <div class="form-group ">
                                            <label class="control-label text-left" for="comentario">Comentario </label>
                                            <textarea id="comentario"  class=" form-control{{ $errors->has('comentario') ? ' is-invalid' : '' }}" name="comentario" value="" placeholder="Escriba un comentario (Opcional) " rows="3" >{{ old('comentario') }}</textarea>

                                        </div>                                           

                                
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 offset-lg-4 col-md-4 offset-md-4 col-sm-4 offset-sm-4">
                                    <div class="form-group  ">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Enviar
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <legend></legend>
                            <div class="row">
                                <div class="col-lg-4 offset-lg-2 col-sm-4 offset-sm-2 col-xs-4 offset-xs-2"> 
                                    <img class="mb-4 img-fluid" src="{{ asset('img/banmedica-logo.png') }}" alt="">
                                </div>
                                <div class="col-lg-4 col-sm-4 col-xs-4 pull-right">
                                    <img class="mb-4 img-fluid" src="{{ asset('img/vidatres-logo.png') }}" alt="">
                                </div>
                            </div>

                     
                        </form>                
                </div>
            </div>
            </div>
        </div>
    </div>

@endsection

@section('jsScripts')
    @parent

<style type="text/css">
.text-label {
  background: rgba(0, 0, 0, 0);
  border: none;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

</style>
@endsection