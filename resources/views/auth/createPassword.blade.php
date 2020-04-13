<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
</head>

<body class="text-center">

<form class="form-update" method="POST" action=" {{ url("createPassword/$url") }}">

    {{ method_field('PUT') }}
    {{ csrf_field() }}

    <img class="mb-4" src="{{ asset('grupo_cetep.png') }}" alt="" width="120" height="120">
    <h1 class="h3 mb-3 font-weight-normal">Actualiza tu contraseña</h1>

    <label for="username" class="sr-only">Usuario</label>
    <input type="text" id="username" name="username" class="form-control" placeholder="Usuario" required autofocus value="{{ $usuario->rut  }}" readonly>

    <label for="currentPassword" class="sr-only">Contraseña actual</label>
    <input type="password" id="currentPassword" name="currentPassword" class="form-control" placeholder="Contraseña actual" required>

    <label for="password" class="sr-only">Nueva contraseña</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Nueva contraseña. Mínimo 6 caracteres" required>

    <label for="password_confirmation" class="sr-only">Confirmar contraseña</label>
    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirmar contraseña" required>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Cambiar contraseña</button>

    @isset($btnVolver)
    @if($url == 'paciente')
        <a href="{{route('welcome', $usuario)}}" class="btn btn-lg btn-secondary btn-block">Volver</a>
    @elseif($url == 'prestador')
            <a href="{{route('welcomePrestador', $usuario)}}" class="btn btn-lg btn-secondary btn-block">Volver</a>
    @endif
    @endisset
    <p class="mt-2 text-muted">&copy; 2019 - {{date('Y')}}</p>
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
</form>
</body>
</html>
