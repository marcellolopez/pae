    @extends('auth.layouts.master')

    @section('content')
    <div class="container">
        <div class="col-lg-8 offset-lg-2">
            <div class="card" >
                <div class="card-body">
                    <div class="col-lg-8 offset-lg-2">

                        <form method="POST" class="" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                            <div class="row">
                                <div class="col-12">

                                    @csrf

                                    <h1 class="mb-3 font-weight-normal text-center">MET</h1>
                                    <h1 class="h3 mb-3 font-weight-normal text-center">"Mentalizados En Ti"</h1>

                                </div>

                            </div>

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
                                        <label class="control-label text-left" for="rut">RUT *</label>
                                        <input id="rut" type="rut" class="form-control{{ $errors->has('rut') ? ' is-invalid' : '' }}" name="rut" value="{{ old('rut') }}" placeholder="12345678-K" autofocus required>

                                    </div>

                                    <div class="form-group">
                                        <label class="control-label text-left" for="nombres">Nombres *</label>
                                        <input id="nombres" type="text" class="form-control{{ $errors->has('nombres') ? ' is-invalid' : '' }}" name="nombres" value="{{ old('nombres') }}" placeholder="Nombres" required autofocus >

                                    </div>
                                    <div class="form-group">
                                        <label class="control-label text-left" for="apellidoPaterno">Apellido Paterno *</label>
                                        <input id="apellidoPaterno" type="text" class="form-control{{ $errors->has('apellidoPaterno') ? ' is-invalid' : '' }}" name="apellidoPaterno" value="{{ old('apellidoPaterno') }}" placeholder="Apellido Paterno" required autofocus >

                                    </div>
                                    <div class="form-group">
                                        <label class="control-label text-left" for="apellidoMaterno">Apellido Materno *</label>       
                                        <input id="apellidoMaterno" type="text" class="form-control{{ $errors->has('apellidoMaterno') ? ' is-invalid' : '' }}" name="apellidoMaterno" value="{{ old('apellidoMaterno') }}" placeholder="Apellido Materno" required autofocus >

                                    </div>


                                </div>
                                <div class="col-6">                        
                                    <div class="form-group">
                                        <label class="control-label text-left" for="email">Email *</label>
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>

                                    </div>

                                    <div class="form-group">
                                        <label class="control-label text-left" for="celular">Teléfono 1 *</label>
                                        <input id="celular" type="number" class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" value="{{ old('celular') }}" placeholder="Teléfono 1"  autofocus>

                                    </div>
                                    <div class="form-group">
                                        <label class="control-label text-left" for="telefono">Teléfono 2 </label>
                                        <input id="telefono" type="number" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono') }}" placeholder="Teléfono 2"  autofocus>

                                    </div>   
                                    <div class="form-group">
                                        <label class="control-label text-left" for="motivo_consulta">Motivo Consulta *</label>
                                        <select  class="form-control{{ $errors->has('motivo_consulta') ? ' is-invalid' : '' }}" name="motivo_consulta" required>
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
                                <div class="col-12">                              

                                    <div class="form-group">
                                        <label class="control-label text-left" for="comentario">Comentario </label>
                                        <textarea id="comentario"  class="form-control{{ $errors->has('comentario') ? ' is-invalid' : '' }}" name="comentario" value="" placeholder="Escriba un comentario (Opcional) " rows="5" >{{ old('comentario') }}</textarea>

                                    </div>                                           

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 offset-lg-4 col-md-4 offset-md-4 col-sm-4 offset-sm-4">
                                    <div class="form-group ">
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
                            <p class="mt-2 text-muted text-center">           
                                <small class="text-center">Gestionado por Grupo Cetep &copy; {{date('Y')}} </small>
                                <img class="img-fluid" src="{{asset('grupo_cetep.png')}}" alt="Logo de GrupoCetep" style="max-width: 100%; height: 50px;">
                            </p>

                     
                        </form>
                </div>            
            </div>
        </div>
    </div>


</div>
@endsection

@section('jsScripts')

@endsection