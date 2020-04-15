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
                            <div class="row">
                                <div class="col-12">

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

                                    @if (session('info'))

                                    <div class="alert  alert-info alert-dismissible fade show" role="alert">
                                        {{ session('info') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    @endif
                                </div>

                            </div>



                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="control-label" for="rut">RUT *</label>
                                        <input id="rut" type="rut" class="form-control{{ $errors->has('rut') ? ' is-invalid' : '' }}" name="rut" value="{{ old('rut', $rut) }}" placeholder="12345678-K"  required>

                                    </div>
                                </div>
                                <div class="col-6">                        
                                    <div class="form-group ">
                                        <label class="control-label" for="email">Email </label>
   
                                        <input id="email" type="email" class=" form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" >
                                     </div> 

                                </div>
                                <div class="col-4">

                                    <div class="form-group ">
                                        <label class="control-label"  for="nombres">Nombres *</label>
                                        
                                        <input id="nombres" type="text" class=" form-control{{ $errors->has('nombres') ? ' is-invalid' : '' }}" name="nombres" value="{{ old('nombres') }}" placeholder="Nombres" required >

                                    </div>
                                </div>
                                <div class="col-4">                                    
                                    <div class="form-group ">
                                        <label class="control-label" for="apellidoPaterno">Apellido Paterno *</label>                                        
                                        <input id="apellidoPaterno" type="text" class=" form-control{{ $errors->has('apellidoPaterno') ? ' is-invalid' : '' }}" name="apellidoPaterno" value="{{ old('apellidoPaterno') }}" placeholder="Apellido Paterno" required  >

                                    </div>
                                </div>
                                <div class="col-4">                                    
                                    <div class="form-group ">
                                        <label class="control-label" for="apellidoMaterno">Apellido Materno *</label>  
                                          
                                        <input id="apellidoMaterno" type="text" class=" form-control{{ $errors->has('apellidoMaterno') ? ' is-invalid' : '' }}" name="apellidoMaterno" value="{{ old('apellidoMaterno') }}" placeholder="Apellido Materno" required  >
                                        
                                    </div>


                                </div>
  
                                <div class="col-6">                                       
                                    <div class="form-group ">
                                        <label class="control-label" for="telefono">Teléfono Contacto *</label>
                                        <input id="telefono" type="number" class=" form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono') }}" placeholder="Teléfono"  >

                                    </div>   

                                </div>
                                <div class="col-6">   
                                    <div class="form-group ">
                                        <label class="control-label" for="motivo_consulta">Motivo Consulta *</label>
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
                                <div class="col-12">                              

                                    <div class="form-group ">
                                        <label class="control-label" for="comentario">Comentario </label>
                                        <textarea id="comentario"  class=" form-control{{ $errors->has('comentario') ? ' is-invalid' : '' }}" name="comentario" value="" placeholder="Escriba un comentario (Opcional) " rows="3" >{{ old('comentario') }}</textarea>

                                    </div>                                           

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
<script type="text/javascript">
    $(document).ready( function () { 

    });

</script>

@endsection