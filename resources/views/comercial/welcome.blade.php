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
                    <form method="POST" class="" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                    <!--
                    <div class="row">
                        <div class="col-12">
                           
                            @csrf
                            
                            <div class="d-flex justify-content-center">
                                <div class="col-lg-6 "> 
                                    <img class="mb-4 img-fluid text-center" src="{{ asset('img/banmedica-logo.png') }}" alt="">
                                </div>
                                <div class="col-lg-6 ">
                                    <img class="mb-4 img-fluid text-center" src="{{ asset('img/vidatres-logo.png') }}" alt="">
                                </div>
                            </div>
               
                            <div class="d-flex justify-content-center">
                            <h1 class="h3 mb-3 font-weight-normal">{{ config('app.name') }}</h1>

                            </div>
                            

                        </div>
                    </div>
                    -->
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
                        <div class="col-6">
                            <div class="form-group">
                                <label class="control-label text-left" for="rut">Rut:</label>
                                <input id="rut" type="rut" class="form-control{{ $errors->has('rut') ? ' is-invalid' : '' }}" name="rut" value="{{ old('rut') }}" placeholder="12345678" autofocus required>
                  
                            </div>

                            <div class="form-group">
                                <label class="control-label text-left" for="nombres">Nombre:</label>
                                <input id="nombres" type="text" class="form-control{{ $errors->has('nombres') ? ' is-invalid' : '' }}" name="nombres" value="{{ old('nombres') }}" placeholder="Nombres" required autofocus >

                            </div>
                            <div class="form-group">
                                <label class="control-label text-left" for="apellidoPaterno">Apellido paterno:</label>
                                <input id="apellidoPaterno" type="text" class="form-control{{ $errors->has('apellidoPaterno') ? ' is-invalid' : '' }}" name="apellidoPaterno" value="{{ old('apellidoPaterno') }}" placeholder="Apellido paterno" required autofocus >

                            </div>
                            <div class="form-group">
                                <label class="control-label text-left" for="apellidoMaterno">Apellido materno:</label>       
                                <input id="apellidoMaterno" type="text" class="form-control{{ $errors->has('apellidoMaterno') ? ' is-invalid' : '' }}" name="apellidoMaterno" value="{{ old('apellidoMaterno') }}" placeholder="Apellido materno" required autofocus >

                            </div>

                            <div class="form-group">
                                <label class="control-label text-left" for="telefono">Teléfono:</label>
                                <input id="telefono" type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono') }}" placeholder="Teléfono" required autofocus>

                            </div>
                        </div>
                        <div class="col-6">                        
                            <div class="form-group">
                                <label class="control-label text-left" for="email">Email:</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>

                            </div>
                            <div class="form-group">
                                <label class="control-label text-left" for="motivo_consulta">Motivo consulta:</label>
                                <select  class="form-control{{ $errors->has('motivo_consulta') ? ' is-invalid' : '' }}" name="motivo_consulta" required>
                                    @foreach($motivo_consultas as $motivo)
                                        @if (old('motivo_consulta') == $motivo->id)
                                              <option value="{{ $motivo->id }}" selected>{{ $motivo->motivo }}</option>
                                        @else
                                              <option value="{{ $motivo->id }}">{{ $motivo->motivo }}</option>
                                        @endif
                                    @endforeach

                                </select>                            
                            </div>     
                            <div class="form-group">
                                <label class="control-label text-left" for="comentario">Comentario:</label>
                                <textarea id="comentario"  class="form-control{{ $errors->has('comentario') ? ' is-invalid' : '' }}" name="comentario" value="" placeholder="Escriba un comentario (Opcional) " rows="6" >{{ old('comentario') }}</textarea>

                            </div>                                           

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group ">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Enviar
                                </button>
                            </div>
                        </div>
                    </div>
               
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!--
    <div class="row d-flex justify-content-center">
        <div class="col-xs-12 col-md-10">
            @if($pacientes ->isEmpty())
                <p class="text-center"><strong>No existen registros en la B.D.</strong></p>
            @else
            <table class="table table-striped table-sm">
                <thead>
                    <tr class="table-success">
                        <th>Estado</th>

                        <th>Nombre</th>

                        <th>Rut</th>

                        <th>Correo electrónico</th>

                        <th>Teléfono</th>

                        <th>Motivo</th>

                        <th>Comentario</th>

                        <th>Acciones</th>

                    </tdr>
                </thead>
                <tbody><tr>
                    @foreach ($pacientes as $paciente)
                        <tr>
                            <td>Activo</td>

                            <td>{{ $paciente->nombres }} {{ $paciente->apellido_paterno }} {{ $paciente->apellido_materno }}</td>

                            <td>{{ $paciente->rut }}</td>

                            <td>{{ $paciente->email }}</td>

                            <td>{{ $paciente->telefono }}</td>

                            <td>{{ $paciente->motivo_consulta->motivo }}</td>

                            <td>{{ $paciente->comentario }}</td>

                            <td><a href="#">Gestionar</a></td>
                        </tr>
                    @endforeach                    
                </tbody>
            </table>     
            @endif                       
        </div>
    </div>
    {{ $pacientes->links() }}
    -->



@endsection

@section('jsScripts')
    @parent
    @include('js.jsWelcomePaciente')
@endsection