@extends('layout')

@section('customCss')
    <link rel="stylesheet" href="{{ asset('css/paciente/pacienteWelcome.css') }}">
@endsection

@section('content')


    <div class="row d-flex justify-content-center mb-1">
        <div class="col-md-12">
            <div class="container">
            <br>
            <div class="card ">
                <div class="card-header bg-primary text-white">
                   
                        Mi historial
                    
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Enviado</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">En Gestión</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Cerrado</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="row d-flex justify-content-center">
                            <div class="col-xs-12 col-lg-12">
                                @if($pacientes ->isEmpty())
                                    <p class="text-center"><strong>No existen registros en la B.D.</strong></p>
                                @else
                                <table class="table  table-sm  datatables" id="enviado">
                                    <thead>
                                        <tr class="table-primary">

                                            <th>Fecha</th>

                                            <th>Hora</th>

                                            <th>Rut</th>

                                            <th>Nombre</th>

                                            <th>Correo electrónico</th>

                                            <th>Teléfono</th>

                                            <th>Motivo consulta</th>

                                        </tdr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pacientes as $paciente)
                                            <tr>        
                                                <td>{{ date('d-m-y', strtotime($paciente->created_at)) }}</td>                                      
                                                <td>{{ date('H:i', strtotime($paciente->created_at)) }}</td>

                                                <td>{{ $paciente->rut }}</td>

                                                <td>{{ $paciente->nombres }} {{ $paciente->apellido_paterno }} {{ $paciente->apellido_materno }}</td>
                                                

                                                <td>{{ $paciente->email }}</td>

                                                <td>{{ $paciente->telefono }}</td>

                                                <td>
                                                    <a type="button" class="btn-small hover" data-toggle="popover" title="{{ $paciente->motivo_consulta->motivo }}" data-content="{{ $paciente->comentario }}">{{ $paciente->motivo_consulta->motivo }}</a>
                                                </td>

                                            </tr>
                                        @endforeach                    
                                    </tbody>
                                </table>     
                                @endif                       
                            </div>
                        </div>
                        {{ $pacientes->links() }}                          
                      </div>
                      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="row d-flex justify-content-center">
                            <div class="col-xs-12 col-lg-12">
                                @if($pacientes ->isEmpty())
                                    <p class="text-center"><strong>No existen registros en la B.D.</strong></p>
                                @else
                                <table class="table  table-sm  datatables" id="cerrado">
                                    <thead>
                                        <tr class="table-primary">

                                            <th>Fecha</th>

                                            <th>Hora</th>

                                            <th>Rut</th>

                                            <th>Nombre</th>

                                            <th>Correo electrónico</th>

                                            <th>Teléfono</th>

                                            <th>Motivo consulta</th>

                                        </tdr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pacientes as $paciente)
                                            <tr>          

                                                <td>{{ date('d-m-y', strtotime($paciente->created_at)) }}</td>                                   
                                                <td>{{ date('H:i', strtotime($paciente->created_at)) }}</td>

                                                <td>{{ $paciente->rut }}</td>

                                                <td>{{ $paciente->nombres }} {{ $paciente->apellido_paterno }} {{ $paciente->apellido_materno }}</td>
                                                

                                                <td>{{ $paciente->email }}</td>

                                                <td>{{ $paciente->telefono }}</td>

                                                <td>
                                                    <a type="button" class="btn-small hover" data-toggle="popover" title="{{ $paciente->motivo_consulta->motivo }}" data-content="{{ $paciente->comentario }}">{{ $paciente->motivo_consulta->motivo }}</a>
                                                </td>

                                            </tr>
                                        @endforeach                    
                                    </tbody>
                                </table>        
                                @endif                       
                            </div>
                        </div>
                        {{ $pacientes->links() }}                         
                      </div>
                      <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <div class="row d-flex justify-content-center">
                            <div class="col-xs-12 col-lg-12">
                                @if($pacientes ->isEmpty())
                                    <p class="text-center"><strong>No existen registros en la B.D.</strong></p>
                                @else
                                <table class="table  table-sm  datatables" id="engestion">
                                    <thead>
                                        <tr class="table-primary">

                                            <th>Fecha</th>

                                            <th>Hora</th>

                                            <th>Rut</th>

                                            <th>Nombre</th>

                                            <th>Correo electrónico</th>

                                            <th>Teléfono</th>

                                            <th>Motivo consulta</th>

                                        </tdr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pacientes as $paciente)
                                            <tr>                                              

                                                <td>{{ date('d-m-y', strtotime($paciente->created_at)) }}</td>

                                                <td>{{ date('H:i', strtotime($paciente->created_at)) }}</td>

                                                <td>{{ $paciente->rut }}</td>

                                                <td>{{ $paciente->nombres }} {{ $paciente->apellido_paterno }} {{ $paciente->apellido_materno }}</td>
                                                

                                                <td>{{ $paciente->email }}</td>

                                                <td>{{ $paciente->telefono }}</td>

                                                <td>
                                                    <a type="button" class="btn-small hover" data-toggle="popover" title="{{ $paciente->motivo_consulta->motivo }}" data-content="{{ $paciente->comentario }}">{{ $paciente->motivo_consulta->motivo }}</a>
                                                </td>

                                            </tr>
                                        @endforeach                    
                                    </tbody>
                                </table>     
                                @endif                       
                            </div>
                        </div>
                        {{ $pacientes->links() }}                          
                      </div>
                    </div>
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
            $('.datatables').DataTable({
                "language": {
                  "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
              });
        });
    </script>

@endsection