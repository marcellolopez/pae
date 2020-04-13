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
                            @if ($errors->any())
                            <div class="alert alert-info">
                                <h5>¡Atención!</h5>
                                <ul style="list-style: none; margin: 0; padding: 0">
                                    !Registro realizado con éxito!
                                </ul>
                            </div>
                            @endif

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="control-label text-left" for="rut">RUT *</label>
                                        <input id="rut" type="rut" class="form-control{{ $errors->has('rut') ? ' is-invalid' : '' }}" name="rut" value="{{ old('rut') }}" placeholder="12345678-K"  required>

                                    </div>

                                    <div class="form-group  datos">
                                        <label class="control-label text-left"  for="nombres">Nombres *</label>
                                        
                                        <label id="nombres" class="form-control text-label"></label>
                                        <!--<input id="nombres" type="text" class="text-label form-control{{ $errors->has('nombres') ? ' is-invalid' : '' }}" name="nombres" value="{{ old('nombres') }}" placeholder="Nombres" required  readonly>-->

                                    </div>
                                    <div class="form-group  datos">
                                        <label class="control-label text-left" for="apellidoPaterno">Apellido Paterno *</label>
                                        <br>
                                        <label id="apellidoPaterno" class="form-control text-label"></label>
                                        <!--
                                        <input id="apellidoPaterno" type="text" class="text-label form-control{{ $errors->has('apellidoPaterno') ? ' is-invalid' : '' }}" name="apellidoPaterno" value="{{ old('apellidoPaterno') }}" placeholder="Apellido Paterno" required readonly  >
                                        -->

                                    </div>
                                    <div class="form-group  datos">
                                        <label class="control-label text-left" for="apellidoMaterno">Apellido Materno *</label>  
                                        <label id="apellidoMaterno" class="form-control text-label"></label> 
                                        <!--    
                                        <input id="apellidoMaterno" type="text" class="text-label form-control{{ $errors->has('apellidoMaterno') ? ' is-invalid' : '' }}" name="apellidoMaterno" value="{{ old('apellidoMaterno') }}" placeholder="Apellido Materno" required readonly  >
                                        -->

                                    </div>


                                </div>
                                <div class="col-6">                        
                                    <div class="form-group  datos">
                                        <label class="control-label text-left" for="email">Email *</label>
   
                                        <input id="email" type="email" class=" form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>
                                        

                                    </div>
                                    <div class="form-group  datos">
                                        <label class="control-label text-left" for="telefono">Teléfono 1 *</label>
                                        <input id="telefono" type="number" class=" form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono') }}" placeholder="Teléfono 1"  >

                                    </div>   
                                    <div class="form-group  datos">
                                        <label class="control-label text-left" for="celular">Teléfono 2 </label>
                                        <input id="celular" type="number" class=" form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" value="{{ old('celular') }}" placeholder="Teléfono 2"  >

                                    </div>

                                    <div class="form-group  datos">
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
                                <div class="col-12">                              

                                    <div class="form-group  datos">
                                        <label class="control-label text-left" for="comentario">Comentario </label>
                                        <textarea id="comentario"  class=" form-control{{ $errors->has('comentario') ? ' is-invalid' : '' }}" name="comentario" value="" placeholder="Escriba un comentario (Opcional) " rows="5" >{{ old('comentario') }}</textarea>

                                    </div>                                           

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 offset-lg-4 col-md-4 offset-md-4 col-sm-4 offset-sm-4">
                                    <div class="form-group  datos ">
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
            $( ".datos" ).css( "display","none" );
        });
        $('#rut').keypress(function(event){
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if(keycode == '13'){
              $.ajax({
                  data: {'rut':$(this).val(),"_token": "{{ csrf_token() }}"},
                  url:'{{ url('/consultar_paciente') }}',
                  type: "POST",
                  dataType: 'json',
                      success: function (response) {
                        
                        $("#nombres").text(response.nombres);
                        $("#apellidoPaterno").text(response.apellidoPaterno);
                        $("#apellidoMaterno").text(response.apellidoMaterno);
                        //$("#email").val(response.email);
                        //$("#telefono").val(response.telefono);
                        //$("#celular").val(response.celular);
                        $( ".datos" ).css( "display","block" );                        
                      },
                    beforeSend: function(){
                        $( ".datos" ).css( "display","none" );
                    },                      
                  error: function (data) {
                      $( ".datos" ).css( "display","block" );
                      console.log('Error:', data);
                  }

              });  
            }
        });       
   </script>
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