<div class="container">
  <!--<h2>Basic Table</h2>-->
  <table class="table table-borderless table-sm ">
    <thead>
      <tr>
        <th>Nombre Completo</th>
        <th>Teléfono 1</th>
        <th>Teléfono 2</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="text-transform: uppercase;">{{strtoupper($paciente->nombres)}} {{strtoupper($paciente->apellidoPaterno)}} {{strtoupper($paciente->apellidoMaterno)}}</td>
        <td>{{$paciente->telefono}}</td>
        <td>{{$paciente->celular}}</td>

      </tr>
    </tbody>  
    <thead>
      <tr>
        <th>Email</th>
        <th>Contacto Emergencia</th>
        <th>Teléfono Emergencia</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{$paciente->email}}</td>
        <td>{{$paciente->contacto_emergencia}}</td>
        <td>{{$paciente->telefono_emergencia}}</td>
      </tr>
    </tbody>  
    <thead>
      <tr>
        <th colspan="3">Comentario paciente</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td colspan="3">
          @if($paciente->comentario)
            {{$paciente->comentario}}
          @else
            Sin comentarios
          @endif

        </td>
      </tr>
    </tbody> 


<thead>
      <tr>
        <th colspan="3">Fecha de agendamiento</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td colspan=1>
          {{ $paciente->fecha_agendamiento}} 
        </td>
        <td colspan=1>
          {{ $paciente->bloque}} 
        </td>        
      </tr>
    </tbody> 


    @if($paciente->responsable != null)
    <thead>
      <tr>
        <th colspan="3">Responsable</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td colspan="3">{{strtoupper($paciente->responsable)}}</td>
      </tr>
    </tbody> 
    @endif
    @if($paciente->responsable_id != null)
    <thead>
      <tr>
        <th colspan="3">Responsable</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td colspan="3">{{strtoupper($paciente->nombre_responsable)}}</td>
      </tr>
    </tbody> 
    @endif

    @if($paciente->estado_cierre_id > 1)
    <thead>
      <tr>
        <th>Motivo Cierre</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        
        <td colspan="2">{{$paciente->estado_cierre}}</td>
      </tr>
    </tbody>
    <thead>
      <tr>
        <th >Comentario Cierre</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td colspan="3">{{$paciente->comentario_cierre}}</td>
      </tr>
    </tbody> 
    @endif

  </table>
</div>

<style type="text/css">
.borderless td, .borderless th, .borderless tr {
    border: none !important;
}
</style>