@extends('comercial/layout')

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
                   
                        Inicio
                    
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
                                <a class=" pull-left hover" type="button" onclick="tableToExcel('enviado', 'Enviados')" value="Exportar a excel">Exportar a excel <i class="fa fa-file-excel-o" aria-hidden="true"></i></a>
                                <table id="enviado" class="table  table-sm datatables  compact nowrap" style="width:100%">
                                    <thead>
                                        <tr class="table-primary small">

                                            

                                            <th>Fecha</th>                                            

                                            <th>Hora</th>                                            

                                            <th>Rut</th>

                                            <th>Nombre</th>


                                            

                                            <th>Teléfono</th> 

                                            <th>Agendamiento</th>                                           

                                            <th>Motivo Consulta</th>

                                            <th>Detalles</th>

                                            <th><i class="fa fa-cog" aria-hidden="true" data-toggle="tooltip" title="Acciones"></i></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                
                                    </tbody>
                                </table>                     
                            </div>
                        </div>                        
                      </div>
                      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="row d-flex justify-content-center">
                            <div class="col-xs-12 col-lg-12">

                                <a class=" pull-left hover" type="button" onclick="tableToExcel('gestion', 'Gestion')" value="Exportar a excel">Exportar a excel <i class="fa fa-file-excel-o" aria-hidden="true"></i></a>
                                <table id="gestion" class="table  table-sm datatables compact nowrap" style="width:100%">
                                    <thead>
                                        <tr class="table-primary small">
                                            
                                            <th>Fecha</th>                                            

                                            <th>Hora</th>                                            

                                            <th>Rut</th>

                                            <th>Nombre</th>                                            

                                            <th>Teléfono</th> 

                                            <th>Agendamiento</th>                                    

                                            <th>Motivo Consulta</th>

                                             <th>Detalles</th>

                                            <th><i class="fa fa-cog" aria-hidden="true" data-toggle="tooltip" title="Acciones"></i></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                
                                    </tbody>
                                </table>                      
                            </div>
                        </div>                     
                      </div>
                      <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="row d-flex justify-content-center">
                            <div class="col-xs-12 col-lg-12">
                                <a class=" pull-left hover" type="button" onclick="tableToExcel('cerrado', 'Cerrado')" value="Exportar a excel">Exportar a excel <i class="fa fa-file-excel-o" aria-hidden="true"></i></a>
                                <table id="cerrado" class="table  table-sm datatables compact nowrap" style="width:100%">
                                    <thead>
                                        <tr class="table-primary small">

                                            

                                            <th>Fecha</th>                                            

                                            <th>Hora</th>                                            

                                            <th>Rut</th>

                                            <th>Nombre</th>


                                            

                                            <th>Teléfono</th> 

                                                                                   

                                            <th>Motivo Consulta</th>

                                            <th>Detalles</th>

                                            <th><i class="fa fa-cog" aria-hidden="true"></i></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                         
                                    </tbody>
                                </table>     
                                         
                            </div>
                        </div>
                                              
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


   
        var enviado = $('#enviado').DataTable({
            createdRow: function( row, data, dataIndex ) {
                if ( data['activo'] != 1 ) {
                    $(row).addClass( 'bg-danger' );
                    $(row).addClass( 'text-white' );
                }

                $(row).addClass( 'small' );
                
            },   
            autoWidth: false,
            processing: true,
            serverSide: true,
            bPaginate: true,
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            drawCallback: function() {
              $('[data-toggle="popover"]').popover();
            },
            ajax: "{{ route('comercial.enviado') }}",
            columns: [
                {data: 'fecha', name: 'fecha'},
                {data: 'hora', name: 'hora'},
                {data: 'rut', name: 'rut'},
                {data: 'fullname', name: 'fullname'}, 
                
                {data: 'telefono', name: 'telefono'},
                {data: 'agendamiento', name: 'agendamiento'},                    
                {data: 'motivo', name: 'motivo'},  
                {
                    "data": null,
                    "sortable": false,
                    "className": "text-center",
                    "searchable": false,                        
                    "render": function (o) {

                            return '<a type="button" id="detalles" class="btn-small hover" value="'+o.consulta_id+'"><i class="fa fa-search" aria-hidden="true"  ></i></a>';     
                    }
                },                                   
                {
                    "data": null,
                    "sortable": false,
                    "className": "",
                    "searchable": false,                        
                    "render": function (o) {
                        return '<a data-toggle="tooltip" title="Gestionar" type="button" class="btn-small hover cambio_estado " id="gestionar" value="'+o.consulta_id+'" ><i class="fa fa-envelope-o" alt="Gestionar" aria-hidden="true"></i></a>';
                    }
                }
            ]
        });

        var gestion = $('#gestion').DataTable({
            createdRow: function( row, data, dataIndex ) {
                if ( data['activo'] != 1 ) {
                    $(row).addClass( 'bg-danger' );
                    $(row).addClass( 'text-white' );
                }
                $(row).addClass( 'small' );
            },               
            processing: true,
            serverSide: true,
            bPaginate: true,
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            drawCallback: function() {
              $('[data-toggle="popover"]').popover();
            },
            ajax: "{{ route('comercial.gestion') }}",
            columns: [
                {data: 'fecha', name: 'fecha'},
                {data: 'hora', name: 'hora'},
                {data: 'rut', name: 'rut'},
                {data: 'fullname', name: 'fullname'}, 
                
                {data: 'telefono', name: 'telefono'},    
                {data: 'agendamiento', name: 'agendamiento'},             
                {data: 'motivo', name: 'motivo'},  
                {
                    "data": null,
                    "sortable": false,
                    "className": "text-center",
                    "searchable": false,                        
                    "render": function (o) {
                           if(o.activo == 1)
                           {
                           var ficha    = '<a  type="button" data-toggle="tooltip" title="Ficha MET" id="ficha" class="btn-small hover" href="{{url("ficha_met")}}/'+o.consulta_id+'" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true"></i></a>';   
                           }
                           else
                           {
                                var ficha = '';
                           }
                           var detalles = '<a  type="button" id="detalles" data-toggle="tooltip" title="Detalles" class="btn-small hover" value="'+o.consulta_id+'"><i class="fa fa-search" aria-hidden="true"  ></i></a>'; 

                           return ficha+' '+detalles;   
                    }
                },                
                {
                    "data": null,
                    "sortable": false,
                    "className": "",
                    "searchable": false,                        
                    "render": function (o) {
                        return '<a data-toggle="tooltip" title="Cerrar" type="button" class="btn-small hover cambio_estado " id="cerrar" value="'+o.consulta_id+'" ><i class="fa fa-lock" alt="Cerrar" aria-hidden="true"></i></a> ';
                    }
                }
            ]
        });

        var cerrado = $('#cerrado').DataTable({
            createdRow: function( row, data, dataIndex ) {
                if ( data['activo'] != 1 ) {
                    $(row).addClass( 'bg-danger' );
                    $(row).addClass( 'text-white' );
                }
                $(row).addClass( 'small' );
                
            },               
            processing: true,
            serverSide: true,
            bPaginate: true,
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            drawCallback: function() {
              $('[data-toggle="popover"]').popover();
            },
            ajax: "{{ route('comercial.cerrado') }}",
            columns: [
                {data: 'fecha', name: 'fecha'},
                {data: 'hora', name: 'hora'},
                {data: 'rut', name: 'rut'},
                {data: 'fullname', name: 'fullname'}, 
                
                {data: 'telefono', name: 'telefono'},            
                {data: 'motivo', name: 'motivo'},  
                {
                    "data": null,
                    "sortable": false,
                    "className": "text-center",
                    "searchable": false,                        
                    "render": function (o) {


                           if(o.activo == 1)
                           {
                           var ficha    = '<a  type="button" data-toggle="tooltip" title="Ficha MET" id="ficha" class="btn-small hover" href="{{url("ficha_met")}}/'+o.consulta_id+'" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true"></i></a>';   
                           }
                           else
                           {
                                var ficha = '';
                           }
                           var detalles = '<a  type="button" id="detalles" data-toggle="tooltip" title="Detalles" class="btn-small hover" value="'+o.consulta_id+'"><i class="fa fa-search" aria-hidden="true"  ></i></a>'; 

                           return ficha+' '+detalles;   
                    }
                },    
                {
                    "data": null,
                    "sortable": false,
                    "className": "text-center",
                    "searchable": false,                        
                    "render": function (o) {
                        return '<a type="button" class="btn-small hover"  id="trazabilidad" name="trazabilidad" diff_gestion="'+o.diff_gestion+'" diff_cerrado="'+o.diff_cerrado+'" diff_total="'+o.diff_total+'" fecha_enviado="'+o.fecha_enviado+'" fecha_gestionado="'+o.fecha_gestionado+'" fecha_cerrado="'+o.fecha_cerrado+'">Trazabilidad</a>';
                    }
                }
            ]
        });

    $(".datatables").on("click", "#detalles", function(){

        var consulta_id   = $(this).attr('value'); 

         
        $.ajax({
            type: "POST",
            url: 'consultar_detalles',
            data: {"consulta_id": consulta_id, "_token": "{{ csrf_token() }}",} ,
            success: function(response)
            {
               $('.modal-body').empty();
                $('.modal-footer').empty();
                $('.modal-body').append(response);
            },
            beforeSend: function(){
                $('.modal-body').empty();
                $('.modal-footer').empty();
                $('.modal-body').html('<center><div class="loader text-center center-block"></div></center>');
            },
        });


        $('.modal-title').text('Detalles');

        $('.modal-footer').append('<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>');
        $('#modal_acciones').modal('show'); // abrir

    });
 
      var tableToExcel = (function() {
        var uri = 'data:application/vnd.ms-excel;base64,'
          , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
          , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
          , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
        return function(table, name) {
          if (!table.nodeType) table = document.getElementById(table)
          var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
          window.location.href = uri + base64(format(template, ctx))
        }
      })()
   
        $('.datatables').on('draw.dt', function () {
                    $('[data-toggle="tooltip"]').tooltip();
        });        
    </script>

    @include('assets.modal_acciones')
@endsection