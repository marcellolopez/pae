<script>
    function setidHora(idPaciente, idHora){
        $("#btnLiberarHora").click(function () {
            liberarHora(idPaciente, idHora);
        });
    }

    function liberarHora(idPaciente, idHora){
        $.ajax({
            type: "GET",
            async: false,
            url: '/liberarHoraAjax/',
            data: {
                'id_paciente': idPaciente,
                'id_hora': idHora
            },
            success: function (data) {
                console.log(data);
                if(data[0]){
                    location.reload();
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }

    function comenzarTeleconsulta(idPaciente, idHora){
        window.location =  '/teleconsulta/'+ idPaciente +'/'+ idHora;
    }
</script>