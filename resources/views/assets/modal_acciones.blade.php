<div id="modal_acciones" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Terminos y condiciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<script>
  $('#tyc').click(function(){
    $('#modal_acciones').modal('show'); // abrir
  });
      $(".datatables").on("click", ".cambio_estado", function(){
        if (confirm('¿Desea cambiar el estado de esta consulta?')) {
          var val  = $(this).attr('id');
          var id   = $(this).attr('value');
          $.ajax({
            data: {'id':id, 'val':val, "_token": "{{ csrf_token() }}"},
            url:'{{ url('/cambio_estado') }}',
            type: "POST",
            dataType: 'json',
            success: function (response) {
              console.log(response);
                    enviado.ajax.reload();
                    gestion.ajax.reload();
                    cerrado.ajax.reload();
                  },
                  error: function (data) {
                    console.log('Error:', data);
                  }
          });
        }         
      });
</script>