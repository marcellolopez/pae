@extends('comercial.layout')
@section('customCss')
    <style>
        h3{
            margin-top: 20px;
            margin-bottom: 10px;
            text-transform: uppercase;
            font-family: 'Roboto', sans-serif;
            font-size: 1.2em;
        }
        .alert{
            margin-top: 20px;
        }
    </style>
@endsection


@section('content')

    <h1 id="pageTitle">Mis Datos</h1>
    <div class="row">
        <div class="col-md-10 m-auto">

            <h3>Actualizar información</h3>
            <form  class="form-control" action="{{ url('/mis_datos/'.Auth::user()->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-row">
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            @if($errors->any())
                                <input type="text" name="nombres" class="form-control" placeholder="Nombre" value="{{ old('nombres') }}">
                            @else
                                <input type="text" name="nombres" class="form-control" placeholder="Nombre" value="{{ Auth::user()->nombres }}">
                            @endif
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="apellidoPaterno">Apellido Paterno</label>
                            @if($errors->any())
                                <input type="text" name="apellidoPaterno" class="form-control" placeholder="Apellido Paterno" value="{{ old('apellidoPaterno') }}">
                            @else
                                <input type="text" name="apellidoPaterno" class="form-control" placeholder="Apellido Paterno" value="{{ Auth::user()->apellido_paterno }}">
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="apellidoMaterno">Apellido Materno</label>
                            @if($errors->any())
                                <input type="text" name="apellidoMaterno" class="form-control" placeholder="Apellido Materno" value="{{ old('apellidoMaterno') }}">
                            @else
                                <input type="text" name="apellidoMaterno" class="form-control" placeholder="Apellido Materno" value="{{ Auth::user()->apellido_materno }}">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="rut">RUT</label>
                            <input type="text" name="rut" class="form-control" placeholder="RUT" value="{{ Auth::user()->rut }}" disabled>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            @if($errors->any())
                                <input type="text" name="email" class="form-control" placeholder="Correo electrónico" value="{{ old('email') }}">
                            @else
                                <input type="text" name="email" class="form-control" placeholder="Correo electrónico" value="{{ Auth::user()->email }}">
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="celular">Teléfono celular</label>
                            @if($errors->any())
                                <input type="text" name="celular" class="form-control" placeholder="Teléfono de contacto" value="{{ old('celular') }}">
                            @else
                                <input type="text" name="celular" class="form-control" placeholder="Teléfono de contacto" value="{{ Auth::user()->celular }}">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="btnContent d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>

            </form>
            @if (isset($mensaje))
                @if($flag)
                    <div class="alert alert-success">
                        {{ $mensaje }}
                    </div>
                @else
                    <div class="alert alert-danger">
                        {{ $mensaje }}
                    </div>
                @endif
            @endif

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
        </div>
    </div>
@endsection

@section('jsScripts')
    <script>
        $("nav ul li a").removeClass('active');
        $(".menuMis_datos").addClass('active');
    </script>
@endsection