<div id="modal_acciones" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
<script>
  $(document).on('click', '.ajax_cambio_estado', function(){
        if (confirm('¿Desea cambiar el estado de esta consulta?')) {
          var val  = $(this).attr('id');
          var id   = $(this).attr('value');
          var responsable   = $('#responsable').val();
          var comentario_cierre   = $('#comentario_cierre').val();
          var estado_cierre   = $('#estado_cierre').val();
          $.ajax({
            data: {'id':id, 'val':val, 'responsable':responsable, 'comentario_cierre':comentario_cierre, 'estado_cierre':estado_cierre, "_token": "{{ csrf_token() }}"},
            url:'{{ url('/cambio_estado') }}',
            type: "POST",
            dataType: 'json',
            success: function (response) {
              console.log(response);
                    enviado.ajax.reload();
                    gestion.ajax.reload();
                    cerrado.ajax.reload();
                    $('#modal_acciones').modal('hide');
                  },
                  error: function (data) {
                    console.log('Error:', data);
                  }
          });
        }   
  });
      $(".datatables").on("click", ".cambio_estado", function(){
        var val  = $(this).attr('id');
        var id   = $(this).attr('value');   
        if(val == 'gestionar')
        {
          $('.modal-body').empty();
          $('.modal-footer').empty();
          $('.modal-title').text('Cambiar estado consulta');
          $('.modal-body').append('<div class="row-fluid">');
          $('.modal-body').append('<div class="form-group "><input id="responsable" type="text" class=" form-control" name="responsable" value="" placeholder="Nombre del Responsable" ></div>');
          $('.modal-footer').append('<button class="btn btn-primary ajax_cambio_estado" id="'+ $(this).attr('id')+'" value="'+$(this).attr('value')+'" >Cambiar estado</button>');
          $('.modal-footer').append('<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>');
          $('#modal_acciones').modal('show'); // abrir
        }
        else
        {
          $('.modal-body').empty();
          $('.modal-footer').empty();
          $('.modal-title').text('Cambiar estado consulta');
          $('.modal-body').append('<div class="row-fluid">');
            $('.modal-body').append('<div class="form-group">');
            $('.modal-body').append('<select class="form-control" id="estado_cierre"></select>');
            $('#estado_cierre').append('<option >Seleccione un motivo de cierre</option>');
              $('#estado_cierre').append('<option value="Cerrado">Cerrado</option>');
              $('#estado_cierre').append('<option value="Paciente rechaza atención">Paciente rechaza atención</option>');
              $('#estado_cierre').append('<option value="No contactabilidad">No contactabilidad</option>');
              $('#estado_cierre').append('<option value="Derivado">Derivado</option>');
      
          $('.modal-body').append('</div>');
          $('.modal-body').append('<div class="form-group ">');
          $('.modal-body').append('<textarea id="comentario_cierre" class=" form-control" name="comentario_cierre" placeholder="Comentario" ></textarea>');
          $('.modal-body').append('</div>');
          $('.modal-footer').append('<button class="btn btn-primary ajax_cambio_estado" id="'+ $(this).attr('id')+'" value="'+$(this).attr('value')+'" >Cambiar estado</button>');
          $('.modal-footer').append('<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>');
          $('#modal_acciones').modal('show'); // abrir
        }
      });
</script>
