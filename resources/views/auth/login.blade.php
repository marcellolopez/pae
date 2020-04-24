    @extends('auth.layouts.master')

    @section('title', 'Iniciar sesión')


    @section('content')
    <div class="card">
    <div class="card-body">

        @isset($url)
        <form class="form-signin" method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
        @else
        <form class="form-signin" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
        @endisset
      
                <div class="col-md-12"> 
                    <img class="mb-4 img-fluid" src="{{ asset('img/Logos_MET_V3_DTI_png.png') }}" alt="">                   
                </div>
        

            <label for="rut" class="sr-only">Usuario</label>
            <input type="text" id="rut" name="rut" class="form-control" placeholder="Usuario" required autofocus value="{{ old('rut') }}"  regexp="[0-9]{0,8}" autocomplete="off" minlength="7" maxlength="8" data-toggle="popover" title="" data-content="Debe ingresar el RUT sin puntos, sin dígito verificador y sin guión">

            <label for="password" class="sr-only">Contraseña</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>

            {{ csrf_field() }}

            <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sesión</button>
            <!--
            <a class="btn btn-link" href="{{ route('register') }}">
                Crear una cuenta
            </a>
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
            -->
            <legend></legend>
            <div class="row">
                <div class="col-md-6"> 
                    <img class="mb-4 img-fluid" src="{{ asset('img/banmedica-logo.png') }}" alt="">
                </div>
                <div class="col-md-6 pull-right">
                    <img class="mb-4 img-fluid" src="{{ asset('img/vidatres-logo.png') }}" alt="">
                </div>
            </div>


            <p class="mt-2 text-muted text-center">            
                <small class="text-center">Gestionado por Grupo Cetep &copy; {{date('Y')}} </small>
                <img class="img-fluid" src="{{asset('grupo_cetep.png')}}" alt="Logo de GrupoCetep" style="max-width: 100%;height: 50px;">
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


                @if(session()->has('success'))
                    <div class="alert alert-success text-center">
                        <ul style="list-style: none; margin: 0; padding: 0">
                                    {{ session()->get('success') }}
                        </ul>            
                    </div>
                @endif
                @if(session()->has('register'))
                    <div class="alert alert-danger">
                        <ul style="list-style: none; margin: 0; padding: 0">
                                    No se encuentra en el sistema. Si desea registrarse, haga click <a href="{{ route('register') }}">Aquí</a>.'                
                        </ul>            
                    </div>
                @endif
            </p>
        </form>
    </div>
    </div>
    @endsection

    @section('jsScripts')
        <script>
            $(function () {
                $('[data-toggle="popover"]').popover({trigger: 'focus', placement: 'top'}); 
            });
        </script>
    @endsection