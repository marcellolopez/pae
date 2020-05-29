@extends('comercial.layout')
@section('customCss')
@endsection


@section('content')

    <div class="row d-flex justify-content-center mb-1">
        <div class="col-md-12">
            <div class="container">
                <br>
                <form class="" method="POST" action="{{ route('ficha_met.update', $paciente->consulta_id) }}">
                    @csrf @method('PATCH')
                    <div class="card ">
                        <div class="card-header bg-primary text-white">
                                Ficha MET
                        </div>                
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
                                                @if (session('success'))
                                                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                                        {{ session('success') }}
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
                                                    <label class="control-label" for="rut">RUT</label>
                                                    <input id="rut" type="rut"  class="form-control{{ $errors->has('rut') ? ' is-invalid' : '' }}" name="rut" value="{{ old('rut',$rut) }}" data-toggle="popover" title="" data-content="Debe ingresar el RUT sin puntos, con dígito verificador y con guion"  disabled>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="control-label"  for="nombres">Nombres</label>
                                                    
                                                    <input id="nombres" type="text" class=" form-control" name="nombres" value="{{ old('nombres', $paciente->nombres) }}" placeholder="Nombres" disabled>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="control-label" for="apellidoPaterno">Apellido Paterno</label>                                        
                                                    <input id="apellidoPaterno" type="text" class=" form-control" name="apellidoPaterno" value="{{ old('apellidoPaterno', $paciente->apellidoPaterno) }}" placeholder="Apellido Paterno" disabled >
                                                </div>
                                                <div class="form-group ">
                                                    <label class="control-label" for="apellidoMaterno">Apellido Materno</label>  
                                                    <input id="apellidoMaterno" type="text" class=" form-control" name="apellidoMaterno" value="{{ old('apellidoMaterno', $paciente->apellidoMaterno) }}" placeholder="Apellido Materno" disabled >
                                                </div>
                                                <div class="form-group ">
                                                    <label class="control-label" for="isapre">Isapre</label>  
                                                    <input id="isapre" type="text" class=" form-control" name="isapre" value="{{ old('isapre', $paciente->isapre) }}" disabled >
                                                </div>                                                
                                            </div>
                                            <div class="col-6">                        
                                                <div class="form-group ">
                                                    <label class="control-label" for="sexo">Sexo *</label>
                                                    <div class="form-control">
                                                        <div class="form-check-inline">
                                                          <label class="form-check-label">
                                                            <input {{ $paciente->sexo == 'M' ? 'checked' : '' }} type="radio" value="M" id="sexo" name="sexo" required>  Masculino
                                                          </label>
                                                        </div>
                                                        <div class="form-check-inline">
                                                          <label class="form-check-label">
                                                            <input {{ $paciente->sexo == 'F' ? 'checked' : '' }}  type="radio" value="F" id="sexo" name="sexo" required> Femenino
                                                          </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="control-label" for="edad">Edad *</label>
                                                    <input id="edad" type="number" class=" form-control" name="edad" value="{{ old('edad', $paciente->edad) }}"   min="1" max="100" required>
                                                </div>                                                
                                                <div class="form-group ">
                                                    <label class="control-label" for="region">Región *</label>
                                                    <select  class=" form-control{{ $errors->has('region') ? ' is-invalid' : '' }}" id="region" name="region" required>
                                                        @if($region == null)
                                                        <option value="">Seleccione región</option>
                                                        @foreach($regiones as $region)
                                                        <option value="{{$region->id}}">{{$region->region}}</option>
                                                        @endforeach
                                                        @else
                                                        <option value="">{{$region->region}}</option>
                                                        @endif
                                                    </select>                            
                                                </div>        
                                                <div class="form-group ">
                                                    <label class="control-label" for="comuna">Comuna *</label>

                                                    <select  class=" form-control{{ $errors->has('comuna') ? ' is-invalid' : '' }}" id="comuna" name="comuna" required>
                                                        @if($comuna == null)
                                                        <option value="">Seleccione región</option>
                                                        @else
                                                        <option value="">{{$comuna->comuna}}</option>
                                                        @endif                                                        
                                                    </select>                            
                                                </div>                                                    
           
                                                <div class="form-group ">
                                                    <label class="control-label" for="ubicacion_actual">Ubicación actual *</label>
                                                    <input id="ubicacion_actual" type="text" class=" form-control" name="ubicacion_actual" value="{{ old('ubicacion_actual', $paciente->ubicacion_actual) }}"  >
                                                </div>                                                                  
                                            </div>
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
                                                <div class="form-group">
                                                  <label for="sel1">Motivo Consulta</label>
                                                  <select  class="form-control" id="motivo_consulta_profesional" name="motivo_consulta_profesional">
                                                    <option value="">Seleccione motivo</option>
                                                    @foreach($motivos_profesional as $motivo)
                                                    <option value="{{$motivo->id}}" {{ $paciente->motivo_consultas_profesionales_id == $motivo->id ? 'selected' : '' }}>{{$motivo->motivo}}</option>
                                                    @endforeach
                                                  </select>
                                                </div>                                       
                                            </div>
                                
                                            <div class="col-12">                              

                                                <div class="form-group otros_profesional">
                                                    <label class="control-label" for="otros_profesional">Explique brevemente</label>
                                                    <textarea id="otros_profesional"  class=" form-control{{ $errors->has('otros_profesional') ? ' is-invalid' : '' }}" name="otros_profesional" value="" placeholder=" " rows="3" >{{ old('otros_profesional', $paciente->otros_profesional) }}</textarea>
                                                </div>         
                                            </div>   
                                            <div class="col-12">                              

                                                <div class="form-group ">
                                                    <label class="control-label" for="comentario_profesional">Comentario </label>
                                                    <textarea id="comentario_profesional"  class=" form-control{{ $errors->has('comentario_profesional') ? ' is-invalid' : '' }}" name="comentario_profesional" value="" placeholder="" rows="3" required>{{ old('comentario_profesional', $paciente->comentario_profesional) }}</textarea>

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
                                                    <label class="control-label" for="explicacion">Explicación </label>
                                                    <textarea id="explicacion"  class=" form-control{{ $errors->has('explicacion') ? ' is-invalid' : '' }}" name="explicacion" value="" placeholder="" rows="3" >{{ old('explicacion', $paciente->explicacion_foco) }}</textarea>

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
                                                    <label class="control-label" for="consideraciones">Consideraciones</label>
                                                    <textarea id="consideraciones"  class=" form-control{{ $errors->has('consideraciones') ? ' is-invalid' : '' }}" name="consideraciones" value="" placeholder=" " rows="3" required>{{ old('consideraciones', $paciente->consideraciones) }}</textarea>

                                                </div>                                           

                                            </div>
                                        </div>
                                            <div class="row">               
                                                <div class="col-6">                        
                                                    <div class="form-group ">
                                                        <label class="control-label"  for="acepta_mesa">Confirma que acepta llamado de Mesa de Ayuda *</label>
                                                        
                                                        <div class="form-control">
                                                            <div class="form-check-inline">
                                                              <label class="form-check-label">
                                                                <input value="true" type="radio" class="" name="acepta_mesa" required {{ $paciente->confirma_mesa_ayuda == '1' ? 'checked' : '' }}> Sí
                                                              </label>
                                                            </div>
                                                            <div class="form-check-inline">
                                                              <label class="form-check-label">
                                                                <input value="false" type="radio" class="" name="acepta_mesa" required {{ $paciente->confirma_mesa_ayuda == '0' ? 'checked' : '' }}> No
                                                              </label>
                                                            </div>
                                                        </div>

                                                    </div> 
                                                </div>                                         
                                                <div class="col-6">                        
                                                    <div class="form-group ">
                                                        <label class="control-label" for="especialidad">Especialidad *</label>
                                                        <select  class=" form-control{{ $errors->has('especialidad') ? ' is-invalid' : '' }}" name="especialidad">
                                                        <option value="">Seleccione Especialidad</option>
                                                        @foreach($especialidades as $especialidad)
                                                        <option value="{{$especialidad->id}}"  {{ $paciente->especialidad_id == $especialidad->id ? 'selected' : '' }}>{{$especialidad->especialidad}}</option>
                                                        @endforeach                                                            
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
                                                  <select  class="form-control" id="condicion_cierre" style="height: 100%;" size="7.5">
              
                                                    @foreach($condiciones_cierre as $condicion)
                                                    <option value="{{$condicion->id}}" {{ $paciente->cierre_caso_id == $condicion->id ? 'selected' : '' }}>{{$condicion->condicion}}</option>
                                                    @endforeach
                                                  </select>
                                                </div>                                       
                                            </div>
                                
                                            <div class="col-12">                              

                                                <div class="form-group otros">
                                                    <label class="control-label" for="otros">Explique brevemente</label>
                                                    <textarea id="otros"  class=" form-control{{ $errors->has('otros') ? ' is-invalid' : '' }}" name="otros" value="" placeholder=" " rows="3" >{{ old('otros', $paciente->otros) }}</textarea>
                                                </div>         
                                            </div>   
                                            <div class="col-12">
                                                <div class="form-group ">
                                                    <label class="control-label" for="responsable_cierre">Responsable de cierre *</label>

                                                    <select  class=" form-control{{ $errors->has('responsable_cierre') ? ' is-invalid' : '' }}" id="responsable_cierre" name="responsable_cierre" required>
                                                        <option value="">Seleccione responsable</option>
                                                        @foreach($responsables as $responsable)
                                                        <option value="{{$responsable->id}}" {{ $paciente->responsable_cierre_id == $responsable->id ? 'selected' : '' }}>{{$responsable->responsable}}</option>
                                                        @endforeach
                                                    </select>                            
                                                </div>                                                   
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Accordion card -->

                        </div>
                        <legend></legend>
                        <div class="row">
                            <div class="col-lg-12 col-md-12  col-sm-12 ">
                                <div class="form-group  text-center">                                        
                                    <button id="registrar" type="submit" class="btn btn-primary btn-block">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </div> 
                    </div>    
                </form>           
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
            $('.otros_profesional').hide(500);
            if ('{{$paciente->cierre_caso_id}}' != '') 
            {
                $(':input').prop("disabled", true);
                $('#registrar').hide();
            }
        });  
        $(document).on('change', '#region', function(){
            var val  = $(this).val();

            $.ajax({
                data: {'val':val, "_token": "{{ csrf_token() }}"},
                url:'{{ url('cargar_comunas') }}',
                type: "POST",
                dataType: 'json',
                success: function (response) {
                $('#comuna').empty();
                $('#comuna').append('<option value="">Seleccione comuna</option>')
                $.each(response,function(id, data) {

                        $('#comuna')
                         .append($("<option></option>")
                                    .attr("value",id)
                                    .text(data['comuna'])); 
        
            });

              },
              error: function (data) {
                console.log('Error:', data);
                $('#comuna').empty();
                $('#comuna').append('<option value="">Seleccione región</option>')
              }
            });
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
            $("#motivo_consulta_profesional").change(function(){
                var select = $(this).children("option:selected").val();
                if(select == 12)
                {
                    $('.otros_profesional').show(500);
                }
                else
                {
                    $('.otros_profesional').hide(500);
                }
            });
            jQuery(document).ready(function(){
                $('#registrar').click(function(){
                    var collapse_id = null;
                    $('input').each(function() {
                        if ($(this).is(":invalid")) 
                        {
                           collapse_id = '#'+$(this).parents('.collapse').attr("id");
                           input_id = '#'+$(this).attr("id");                                          
                        }                 
                    });     
                    
                    $(collapse_id).collapse('show');
                });
            });
    </script>
@endsection