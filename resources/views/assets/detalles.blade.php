<div class="container">
  <!--<h2>Basic Table</h2>-->
  <table class="table">
    <thead>
      <tr>
        <th>Nombre completo</th>
        <th>Telefono 2</th>
        <th>Comentario paciente</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{$paciente->nombres}} {{$paciente->apellidoPaterno}} {{$paciente->apellidoMaterno}}</td>
        <td>{{$paciente->celular}}</td>
        <td>{{$paciente->comentario}}</td>
      </tr>
    </tbody>
  </table>
</div>