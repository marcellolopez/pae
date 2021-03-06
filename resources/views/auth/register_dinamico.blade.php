    @extends('auth.layouts.master')

    @section('content')
    <div class="container">
        <div class="col-lg-8 offset-lg-2">
            <div class="card ">
                <div class="card-header bg-primary text-white">
                   
                        Registrar consulta
                    
                </div>
                <div class="card-body">
                <div class="col-6 offset-lg-3"> 
                    <img class="mb-4 img-fluid" src="{{ asset('img/Logos_MET_V3_DTI_png.png') }}" alt="">                   
                </div>                    
                        <form method="POST" class="" action="{{ url('register/'.$logo) }}" aria-label="{{ __('Register') }}">
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
                                        <input id="rut" type="rut" class="form-control{{ $errors->has('rut') ? ' is-invalid' : '' }}" name="rut" value="{{ old('rut') }}" placeholder="12345678-K" regexp="[0-9]{0,10}(\-([0-9kK]{0,1})){0,1}" data-toggle="popover" title="" data-content="Debe ingresar el RUT sin puntos, con dígito verificador y con guion"  required>
                                    </div>

                                    <div class="form-group ">
                                        <label class="control-label"  for="nombres">Nombres *</label>
                                        
                                        <input id="nombres" type="text" class=" form-control{{ $errors->has('nombres') ? ' is-invalid' : '' }}" name="nombres" value="{{ old('nombres') }}" placeholder="Nombres" required >
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="apellidoPaterno">Apellido Paterno *</label>                                        
                                        <input id="apellidoPaterno" type="text" class=" form-control{{ $errors->has('apellidoPaterno') ? ' is-invalid' : '' }}" name="apellidoPaterno" value="{{ old('apellidoPaterno') }}" placeholder="Apellido Paterno" required  >

                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="apellidoMaterno">Apellido Materno *</label>  
                                          
                                        <input id="apellidoMaterno" type="text" class=" form-control{{ $errors->has('apellidoMaterno') ? ' is-invalid' : '' }}" name="apellidoMaterno" value="{{ old('apellidoMaterno') }}" placeholder="Apellido Materno" required  >
                                    </div>
                                </div>

                                <div class="col-6">                        
                                    <div class="form-group ">
                                        <label class="control-label" for="email">Email *</label>
   
                                        <input id="email" type="email" class=" form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>
                                        

                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="telefono">Teléfono 1*</label>
                                        <input id="telefono" type="number" class=" form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono') }}" placeholder="Teléfono"  regexp="[0-9]{0,9}" minlength="9" maxlength="9" data-toggle="popover" title="" data-content="El télefono 1 debe contener 9 números">

                                    </div>   
                                    
                                    <div class="form-group ">
                                        <label class="control-label" for="celular">Teléfono 2 </label>
                                        <input id="celular" type="number" class=" form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" value="{{ old('celular') }}" placeholder="Teléfono 2"  regexp="[0-9]{0,9}" minlength="9" maxlength="9" data-toggle="popover" title="" data-content="El télefono 2 debe contener 9 números">

                                    </div>
                                

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
                                    <div class="row">               
                                        <div class="col-6">                        
                                            <div class="form-group ">
                                                <label class="control-label"  for="nombre_emergencia">Contacto de Emergencia *</label>
                                                
                                                <input id="nombre_emergencia" type="text" class=" form-control{{ $errors->has('nombre_emergencia') ? ' is-invalid' : '' }}" name="nombre_emergencia" value="{{ old('nombre_emergencia') }}" placeholder="Nombre de contacto" required >

                                            </div> 
                                        </div>                                         
                                        <div class="col-6">                        
                                            <div class="form-group ">
                                                <label class="control-label" for="telefono_emergencia">Teléfono de Emergencia*</label>
                                                <input id="telefono_emergencia" type="number" class=" form-control{{ $errors->has('telefono_emergencia') ? ' is-invalid' : '' }}" name="telefono_emergencia" value="{{ old('telefono_emergencia') }}" placeholder="Teléfono de Emergencia"  regexp="[0-9]{0,9}" minlength="9" maxlength="9" required data-toggle="popover" title="" data-content="El télefono de emergencia debe contener 9 números">

                                            </div>    
                                        </div> 
                                    </div>                                    
                                </div>
                                <div class="col-12">                              

                                    <div class="form-group ">
                                        <label class="control-label" for="comentario">Comentario </label>
                                        <textarea id="comentario"  class=" form-control{{ $errors->has('comentario') ? ' is-invalid' : '' }}" name="comentario" value="" placeholder="Escriba un comentario (Opcional) " rows="3" >{{ old('comentario') }}</textarea>

                                    </div>                                           

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12  col-sm-12 ">
                                    <div class="form-group  text-center">
                                        <label class="text-center">
                                          <input class="text-center" type="checkbox" id="chk_tyc" name="acept" required> He leído y acepto los <a href="#" id="tyc">términos y condiciones</a> de uso *
                                        </label>                                            
                                        <button id="registrar" type="submit" class="btn btn-primary btn-block" disabled>
                                            Enviar
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <legend><br></legend>
                            <div class="row">
                                @if($img != null)
                                <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3">
                                    <img class="mb-4 img-fluid" src="{{ asset('img/'.$img) }}" alt="">
                                </div>
                                @endif
                            </div>

                     
                        </form>                
                </div>
            </div>
        </div>
    </div>


</div>
@endsection

@section('jsScripts')
    <script type="text/javascript">

        $(function () {
            $('#chk_tyc').click(function(){
                if($("#chk_tyc").is(':checked')) {  
                    
                    $("#registrar").attr('disabled', false);  
                } else {  
                    $("#registrar").attr('disabled', true);
                }  

            });
            $('[data-toggle="popover"]').popover({trigger: 'focus', placement: 'top'}); 
        });

    </script>
    
@endsection

