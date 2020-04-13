{{--mauricio troncoso--}}
<script>
    $(function($) {
        $("nav ul li a").removeClass('active');
        $(".menuMi_historial").addClass('active');

        jQuery(document).ready(function() {
            jQuery.extend( jQuery.fn.dataTableExt.oSort, {
                "date-uk-pre": function ( a ) {
                    var ukDatea = a.split('-');
                    return (ukDatea[2] + ukDatea[1] + ukDatea[0]) * 1;
                },
                "date-uk-asc": function ( a, b ) {
                    return ((a < b) ? -1 : ((a > b) ? 1 : 0));
                },
                "date-uk-desc": function ( a, b ) {
                    return ((a < b) ? 1 : ((a > b) ? -1 : 0));
                }
            } );


            var tablaHistorialDelPaciente = $('#tablaHistorialDelPaciente').DataTable({
                language: {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "No hay datos disponibles",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Visibilidad"
                    }
                },
                dom: '<"top"<"float-right"l>>rtip',
                pageLength: 10,
                scrollCollapse: true,
                scrollX: true,
                autoWidth: true,
                ajax: {
                    type: 'GET',
                    url: '/mi_historial_ajax/',
                    data: {
                        'id_paciente': {!! $paciente->id !!},
                    },
                    'dataSrc': function(json){
                        return json.data;
                    }
                },
                columns: [
                    {data: "hora"},
                    {data: "fecha"},
                    {data: "prestador"},
                    {data: "especialidad"},
                    {data: "prestacion"},
                    {data: "asiste"},
                ],
                aoColumnDefs: [
                    {"type": "date-uk", "aTargets": [1]},
                ],
                order: [[1, "desc"]],
                deferRender: true

            });

        });
    });
</script>