<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip({
            placement : 'top',
            trigger: 'hover'
        });

        setSteps();
    });

    $(document).ready(function() {
        $("nav ul li a").removeClass('active');
        $(".menuMis_consultas").addClass('active');

        $("#prestador").change(function(event) {
            getAgendaPrestadorAjax($("#prestador").val());
        });
        $("#btnContinuar").click(function(){
            var horaSeleccionada = $("input[name='horaSeleccionada']:checked").val();
            window.location.href = '/detalleReserva/' + {{ $paciente->id }} + '/' + horaSeleccionada;
        });
    });

    function setSteps(){
        $('.stepNumber').each(function(index, element){
             $(element).children('em').text(index + 1);
        });

        if($('select#convenio').length == 0){
            $(".stepNumber:eq(0)").parent().removeClass('col-md-4');
            $(".stepNumber:eq(0)").parent().addClass('col-md-6');
            $(".stepNumber:eq(1)").parent().removeClass('col-md-4');
            $(".stepNumber:eq(1)").parent().addClass('col-md-6');
        }
    }

    function getAgendaPrestadorAjax(idPrestador) {
        $.ajax({
            type: "GET",
            async: false,
            url: '/agendaPrestadorAjax/',
            data: {
                'id_prestador': idPrestador
            },
            success: function (data) {
                var proxima_hora_disponible = data[2];
                var fechas_disponibles = new Array();

                $.each(data[1], function(i){
                    fechas_disponibles.push(this['fecha']);
                });

                var proximaFechaDisponible =  fechas_disponibles[0] !== undefined ? formatoFecha(proxima_hora_disponible['fecha'], proxima_hora_disponible['hora']) : 'No hay horas disponibles';
                $("#proxHoraDisponible span").text(proximaFechaDisponible);
                $("#proxHoraDisponible button").remove();

                if(fechas_disponibles[0] !== undefined){
                    $("#proxHoraDisponible span").after('' +
                        '<button type="button" class="btn btn-sm btn-primary btnReservarProxHora"' +
                        'onclick="seleccionarProxHoraDisponible(\''+proxima_hora_disponible['fecha']+'\', \''+proxima_hora_disponible['idHora']+'\')">Seleccionar</button>');
                }

                $("#alertaPrevia").css('display', 'inherit');
                $(".tableContent").css('display', 'none');
                $(".btnContentAgendar").css('display', 'none');

                $( "#datepicker" ).datepicker( "option", "beforeShowDay", function(date){
                    fechas_disponibles = fechas_disponibles === undefined || fechas_disponibles === null ? [] : fechas_disponibles;

                    var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
                    return [ fechas_disponibles.indexOf(string) != -1 ];
                })
                // Remove the style for the default selected day (today)
                $('.ui-state-active').removeClass('ui-state-active');
                $('.ui-state-hover').removeClass('ui-state-hover');

                // Reset the current selected day
                $('#date').val('');

            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }

    function getHorasPrestadorAjax(idPrestador, fecha, idPaciente){
        $.ajax({
            type: "GET",
            async: false,
            url: '/horasPrestadorAjax/',
            data: {
                'id_prestador': idPrestador,
                'fecha': fecha,
                'idPaciente': idPaciente
            },
            success: function (data) {
                var horas_disponibles = data[0];

                $(".tableContent").css('display', 'inherit');
                $(".btnContentAgendar").css('display', 'inherit');
                $("#btnContinuar").prop('disabled', true);
                $("#alertaPrevia").css('display', 'none');
                $("#tableHoras tbody").html('');

                var windowHeight = $(window).outerHeight();
                var tablePosition = $(".tableContent").offset().top;
                var tableContentHeight = windowHeight - tablePosition - 100;
                $(".tableContent").css('height', tableContentHeight + 'px');

                $.each(horas_disponibles, function(){
                    if(this['bloquear'] === false){
                        $("#tableHoras tbody").append("" +
                            "<tr>" +
                            "<td>" + this['hora'] + "</td>" +
                            "<td>" + this['nombrePrestador'] + "</td>" +
                            "<td>" + this['especialidad'] + "</td>" +
                            "<td class='tdHoraSeleccion'><input type='radio' onchange='enableButton()' name='horaSeleccionada' value='" + this['idHora'] + "'></td>" +
                            "</tr>")
                    } else if(this['bloquear'] === true){
                        $("#tableHoras tbody").append("" +
                            "<tr style='color:rgba(0,0,0,.4);cursor: not-allowed' data-toggle='tooltip' title='Esta hora coincide con una hora ya reservada.' data-content='Esta hora coincide con una hora ya reservada.'>" +
                            "<td>" + this['hora'] + "</td>" +
                            "<td>" + this['nombrePrestador'] + "</td>" +
                            "<td>" + this['especialidad'] + "</td>" +
                            "<td class='tdHoraSeleccion'><input type='radio' onchange='enableButton()' name='horaSeleccionada' value='" + this['idHora'] + "' disabled></td>" +
                            "</tr>")
                    }
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }

    function enableButton() {
        if($("input[name='horaSeleccionada']:checked").val()){
            console.log($("input[name='horaSeleccionada']:checked").val());
            $("#btnContinuar").prop('disabled', false);
        }
    }

    $(function(){
        $.datepicker.regional['es'] = {
            closeText: 'Cerrar',
            prevText: '< Ant',
            nextText: 'Sig >',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
            weekHeader: 'Sm',
            dateFormat: 'dd/mm/yy',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        };
        $.datepicker.setDefaults($.datepicker.regional['es']);

        var fechas_disponibles = new Array();

        @foreach($fechas_disponibles as $fecha)
        fechas_disponibles.push( {!!  json_encode($fecha['fecha']) !!} );
        @endforeach

        var proximaHoraDisponible =  fechas_disponibles[0] !== undefined ? formatoFecha({!! json_encode($proxima_hora_disponible['fecha']) !!}, {!! json_encode($proxima_hora_disponible['hora']) !!}) : 'No hay horas disponibles';
        $("#proxHoraDisponible span").text(proximaHoraDisponible);
        $("#proxHoraDisponible button").remove();

        if(typeof fechas_disponibles[0] !== undefined){
            $("#proxHoraDisponible span").after('' +
                '<button type="button" class="btn btn-sm btn-primary btnReservarProxHora"' +
                'onclick="seleccionarProxHoraDisponible(\''+{!! json_encode($proxima_hora_disponible["fecha"]) !!}+'\',\''+{!! json_encode($proxima_hora_disponible['idHora']) !!}+'\')">Seleccionar</button>');
        }

        var current_date = new Date();
        var minDate = new Date(current_date.getFullYear(),
            current_date.getMonth(),
            current_date.getDate());
        var maxDate = new Date( current_date.getFullYear()+1, 12, 31);

        $("#datepicker").datepicker({
            altField: '#date', // ID of the hidden field
            altFormat: "yyyy-mm-dd",
            numberOfMonths: 1,
            changeMonth: true,
            changeYear: true,
            showOtherMonths: true,
            minDate: minDate,
            maxDate: maxDate,
            regional: 'es',
            beforeShowDay: function(date){
                var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
                return [ fechas_disponibles.indexOf(string) != -1 ];
            },
            onSelect: function(){
                var selectedDate = new Date($("#datepicker").datepicker('getDate'));
                var dateFormat = selectedDate.getFullYear() + '-' +
                    (selectedDate.getMonth()+1) + '-' +
                    selectedDate.getDate();

                getHorasPrestadorAjax($("#prestador").val(), dateFormat, {!! json_encode($paciente->id)!!});
            }
        });

        // Remove the style for the default selected day (today)
        $('.ui-state-active').removeClass('ui-state-active');
        $('.ui-state-hover').removeClass('ui-state-hover');

        // Reset the current selected day
        $('#date').val('');

    });

    function formatoFecha(fecha, hora){
        var splittedDate = fecha.split('-');
        var formattedDate = splittedDate[2] + '-' + splittedDate[1] + '-' + splittedDate[0];

        return formattedDate + ' a las ' + hora;
    }

    function seleccionarProxHoraDisponible(fecha, idHora){
        var splittedDate = fecha.split('-');

        $("#datepicker").datepicker("setDate", new Date(parseInt(splittedDate[0]), parseInt(splittedDate[1]) -1, parseInt(splittedDate[2])));
        $.each($("td[data-month="+ (parseInt(splittedDate[1]) - 1) +"][data-year='" + parseInt(splittedDate[0]) + "']"), function(){
            if(this.innerText == parseInt(splittedDate[2])){
                $(this).click();
            }
        });

        $.each($("input[type='radio']"), function(){
            if($(this).val() == idHora){
                $(this).prop('checked', true);
            }
        });
        enableButton();
    }
</script>