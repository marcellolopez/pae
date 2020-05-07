@extends('comercial.layout')
@section('customCss')
@endsection


@section('content')

    <div class="row d-flex justify-content-center mb-1">
        <div class="col-md-12">
            <div class="container">
                <br>
                <!--Accordion wrapper-->
                <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                    <!-- Accordion card -->
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header" role="tab" id="headingOne1">
                            <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
                            aria-controls="collapseOne1">
                            <h5 class="mb-0">
                            Datos Consultante
                            </h5>
                            </a>
                        </div>
                        <!-- Card body -->
                        <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">
                            <div class="card-body">        
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
                                            <input id="rut" type="rut"  class="form-control{{ $errors->has('rut') ? ' is-invalid' : '' }}" name="rut" value="{{ old('rut',$paciente->rut) }}" placeholder="12345678-K" regexp="[0-9]{0,10}(\-([0-9kK]{0,1})){0,1}" data-toggle="popover" title="" data-content="Debe ingresar el RUT sin puntos, con dígito verificador y con guion"  disabled>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label"  for="nombres">Nombres *</label>
                                            
                                            <input id="nombres" type="text" class=" form-control" name="nombres" value="{{ old('nombres', $paciente->apellidoPaterno) }}" placeholder="Nombres" disabled>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="apellidoPaterno">Apellido Paterno *</label>                                        
                                            <input id="apellidoPaterno" type="text" class=" form-control" name="apellidoPaterno" value="{{ old('apellidoPaterno', $paciente->apellidoPaterno) }}" placeholder="Apellido Paterno" disabled >
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="apellidoMaterno">Apellido Materno *</label>  
                                            <input id="apellidoMaterno" type="text" class=" form-control" name="apellidoMaterno" value="{{ old('apellidoMaterno', $paciente->apellidoMaterno) }}" placeholder="Apellido Materno" disabled >
                                        </div>
                                    </div>
                                    <div class="col-6">                        
                                        <div class="form-group ">
                                            <label class="control-label" for="sexo">Sexo *</label>
                                            <div class="form-control">
                                                <div class="form-check-inline">
                                                  <label class="form-check-label">
                                                    <input type="radio" class="" id="sexo" name="sexo"> Masculino
                                                  </label>
                                                </div>
                                                <div class="form-check-inline">
                                                  <label class="form-check-label">
                                                    <input type="radio" class="" id="sexo" name="sexo"> Femenino
                                                  </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="motivo_consulta">Comuna *</label>
                                            <select  class=" form-control{{ $errors->has('motivo_consulta') ? ' is-invalid' : '' }}" name="motivo_consulta" required>
                                            </select>                            
                                        </div>        
                                        <div class="form-group ">
                                            <label class="control-label" for="motivo_consulta">Isapre *</label>
                                            <select  class=" form-control{{ $errors->has('motivo_consulta') ? ' is-invalid' : '' }}" name="motivo_consulta" required>
                                            </select>                            
                                        </div>   
                                        <div class="form-group ">
                                            <label class="control-label" for="motivo_consulta">Ubicación actual *</label>
                                            <select  class=" form-control{{ $errors->has('motivo_consulta') ? ' is-invalid' : '' }}" name="motivo_consulta" required>
                                            </select>                            
                                        </div>                                                               
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- Accordion card -->
                        <!-- Accordion card -->
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header" role="tab" id="headingTwo2">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                            <h5 class="mb-0">
                              Motivo Consulta
                            </h5>
                            </a>
                        </div>
                        <!-- Card body -->
                        <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2"data-parent="#accordionEx">
                            <div class="card-body">
                 
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group ">
                                            <label class="control-label" for="comentario">Motivo Consulta </label>
                                            <input id="motivo_consulta" type="text" class=" form-control" name="motivo_consulta" value="{{ old('motivo_consulta', $paciente->motivo) }}" placeholder="" disabled >                      
                                        </div>                                         
                                    </div>
                                    <div class="col-12">                              

                                        <div class="form-group ">
                                            <label class="control-label" for="comentario">Comentario </label>
                                            <textarea id="comentario"  class=" form-control{{ $errors->has('comentario') ? ' is-invalid' : '' }}" name="comentario" value="" placeholder="" rows="3" disabled>{{ old('comentario', $paciente->comentario) }}</textarea>

                                        </div>                                           

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- Accordion card -->

                    <!-- Accordion card -->
                    <div class="card">

                        <!-- Card header -->
                        <div class="card-header" role="tab" id="headingThree3">
                            <a  class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree3"      aria-expanded="false" aria-controls="collapseThree3">
                            <h5 class="mb-0">
                              Foco y breve explicación de la intervención realizada
                            </h5>
                            </a>
                        </div>

                        <!-- Card body -->
                        <div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3"data-parent="#accordionEx">
                            <div class="card-body">
            
                                <div class="row">
                                    <div class="col-12">                              

                                        <div class="form-group ">
                                            <label class="control-label" for="comentario">Explicación </label>
                                            <textarea id="comentario"  class=" form-control{{ $errors->has('comentario') ? ' is-invalid' : '' }}" name="comentario" value="" placeholder="" rows="3" >{{ old('comentario') }}</textarea>

                                        </div>                                           

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Accordion card -->

                
                    <!-- Accordion wrapper -->

                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header" role="tab" id="headingFour4">
                            <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseFour4" aria-expanded="false"
                            aria-controls="collapseFour4">
                            <h5 class="mb-0">
                            Otras consideraciones relevantes para el caso
                            </h5>
                            </a>
                        </div>
                        <!-- Card body -->
                        <div id="collapseFour4" class="collapse" role="tabpanel" aria-labelledby="headingFour4" data-parent="#accordionEx">
                            <div class="card-body">
        
                                 
                                                           
                                <div class="row">

                                    <div class="col-12">                              

                                        <div class="form-group ">
                                            <label class="control-label" for="comentario">Consideraciones</label>
                                            <textarea id="comentario"  class=" form-control{{ $errors->has('comentario') ? ' is-invalid' : '' }}" name="comentario" value="" placeholder=" " rows="3" >{{ old('comentario') }}</textarea>

                                        </div>                                           

                                    </div>
                                </div>
                                    <div class="row">               
                                        <div class="col-6">                        
                                            <div class="form-group ">
                                                <label class="control-label"  for="nombre_emergencia">Confirma que acepta llamado de Mesa de Ayuda *</label>
                                                
                                                <div class="form-control">
                                                    <div class="form-check-inline">
                                                      <label class="form-check-label">
                                                        <input type="radio" class="" name="optradio"> Sí
                                                      </label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                      <label class="form-check-label">
                                                        <input type="radio" class="" name="optradio"> No
                                                      </label>
                                                    </div>
                                                </div>

                                            </div> 
                                        </div>                                         
                                        <div class="col-6">                        
                                            <div class="form-group ">
                                                <label class="control-label" for="telefono_emergencia">Especialidad *</label>
                                                <select  class=" form-control{{ $errors->has('motivo_consulta') ? ' is-invalid' : '' }}" name="motivo_consulta" required>

                                            </select>    

                                            </div>    
                                        </div> 
                                    </div>                                   

      

                            </div>
                        </div>

                    </div>
                        <!-- Accordion card -->

                        <!-- Accordion card -->
                    <div class="card">

                        <!-- Card header -->
                        <div class="card-header" role="tab" id="headingFive5">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseFive5" aria-expanded="false" aria-controls="collapseFive5">
                            <h5 class="mb-0">
                              Cierre de caso
                            </h5>
                            </a>
                        </div>

                        <!-- Card body -->
                        <div id="collapseFive5" class="collapse" role="tabpanel" aria-labelledby="headingFive5"data-parent="#accordionEx">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                          <label for="sel1">Seleccione la condición de cierre de caso</label>
                                          <select multiple class="form-control" id="condicion_cierre" style="height: 100%;" size="7.5">
                                            <option>Alta Clínica: Cierre del caso por tener logrados los objetivos terapéuticos</option>
                                            <option>Abandono: Paciente opta por no recibir la orientación</option>
                                            <option>Derivación a GES/AUGE: Se deriva a red para seguir tratamiento por tener un problema de salud GES/AUGE</option>
                                            <option>Derivación a Red privada: Se deriva a red privada para seguir tratamiento según la previsión de salud del sujeto</option>
                                            <option>Cierre administrativo: No se puede contactar</option>
                                            <option>Requiere un 2do llamado de seguimiento</option>
                                            <option value="7">Otros</option>
                                          </select>
                                        </div>                                       
                                    </div>
                        
                                    <div class="col-12">                              

                                        <div class="form-group otros">
                                            <label class="control-label" for="otros">Explique brevemente</label>
                                            <textarea id="otros"  class=" form-control{{ $errors->has('otros') ? ' is-invalid' : '' }}" name="otros" value="" placeholder=" " rows="3" >{{ old('otros') }}</textarea>
                                        </div>         
                                    </div>         
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Accordion card -->

                    <!-- Accordion card -->
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header" role="tab" id="headingSix6">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseSix6"      aria-expanded="false" aria-controls="collapseSix6">
                            <h5 class="mb-0">
                              Datos del Especialista
                            </h5>
                            </a>
                        </div>
                        <!-- Card body -->
                        <div id="collapseSix6" class="collapse" role="tabpanel" aria-labelledby="headingSix6"data-parent="#accordionEx">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">     
                                        <div class="form-group ">
                                            <label class="control-label" for="comentario">Comentario </label>
                                            <textarea id="comentario"  class=" form-control{{ $errors->has('comentario') ? ' is-invalid' : '' }}" name="comentario" value="" placeholder=" " rows="3" >{{ old('comentario') }}</textarea>
                                        </div>   
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Accordion card -->
                    </div>
                    <!-- Accordion wrapper -->



                </div>
                <legend></legend>
                <div class="row">
                    <div class="col-lg-12 col-md-12  col-sm-12 ">
                        <div class="form-group  text-center">                                        
                            <button id="registrar" type="submit" class="btn btn-primary btn-block">
                                Enviar
                            </button>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>

@endsection

@section('jsScripts')
    <script>
        $("nav ul li a").removeClass('active');
        $(".menuMis_datos").addClass('active');

        $(document).ready(function(){
            $('.otros').hide(500);
        });  
            $("#condicion_cierre").change(function(){
                var select = $(this).children("option:selected").val();
                if(select == 7)
                {
                    $('.otros').show(500);
                }
                else
                {
                    $('.otros').hide(500);
                }
            });
              
    </script>
@endsection