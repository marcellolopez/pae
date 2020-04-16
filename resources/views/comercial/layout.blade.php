<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>{{config('app.name')}} | Grupo Cetep</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700|Roboto&display=swap" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Fontawesome CSS-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- jQuery UI -->
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.structure.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.theme.min.css') }}">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- DataTable CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">


    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

    @yield('customCss')

</head>
<body>

<header>
    <div class="d-flex justify-content-between align-items-center mobileHeader">
       
        <figure class="navLogo">
            <img src="{{ asset('img/met-logo.png') }}" alt="">
        </figure>

        <a href="javascript:void(0)" onclick="toggleMenu()" class="btnNav"><i class="fa fa-bars" aria-hidden="true"></i></a>
        <nav class="mobileNav">
            <ul>
                <li><a href="{{ route('welcome') }}" >Inicio</a></li>
                <li><a href="{{ route('welcome') }}" >Mi historial</a></li>
                <li><a href="{{ url('/mis_datos') }}" >Mis datos</a></li>
                <li><a href="{{ route('logout') }}">Cerrar sesión</a></li>
            </ul>
        </nav>
    </div>

    <div class="desktopHeader">
        <nav class="sideNav">
            <div class="navHeader">
                

                        
                <figure class="navLogo">
                    <img src="{{ asset('img/met-logo.png') }}" alt="">
                </figure>

                <ul>
                    <li><a href="{{ route('welcome') }}" class="menuInicio ">Inicio</a></li>
                    <li><a href="{{ route('welcome') }}" class="menuMi_historial active">Mi historial</a></li>
                    <li><a href="{{ route('mis_datos') }}" class="menuMis_datos">Mis datos</a></li>
                    <li><a href="{{ route('logout') }}">Cerrar sesión</a></li>
                </ul>

                <div class="col-lg-12 "> 
                    <img class="mb-4 img-fluid " style="margin-top: 100%;" src="{{ asset('img/banmedica-logo.png') }}" alt="">
                </div>
                <div class="col-lg-12 ">
                    <img class="mb-4 img-fluid "  src="{{ asset('img/vidatres-logo.png') }}" alt="">
                </div>
            </div>
        </nav>

        <div class="headerContent">
            <h2><strong>¡Hola, {{Auth::user()->nombres}} {{Auth::user()->apellido_paterno}} {{Auth::user()->apellido_materno}}!</strong></h2>
        </div>
        <div class="btnContent navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle btn-logout" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> Mi perfil</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="">Cambiar contraseña</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}">Cerrar sesión</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>

<div class="content">
    @yield('content')
<br>
</div>
<legend></legend>
<style type="text/css">

</style>
<div class="content">
    <footer id="sticky-footer" class="py-4 bg-black">
        <div class="container text-center"  >
            <small class="text-center text-white">Gestionado por Grupo Cetep </small>
                <img class="img-fluid" src="{{asset('grupo_cetep.png')}}" alt="Logo de GrupoCetep" style="
        max-width: 100%;
        height: 50px;">

        </div>
    </footer>    
</div><
<!--
<div class="content">
    <div class="footer">
        <div class="container text-center"  >
          <p>            <small class="text-center text-white">Gestionado por Grupo Cetep </small>
            <img class="img-fluid" src="{{asset('grupo_cetep.png')}}" alt="Logo de GrupoCetep" style="
            max-width: 100%;
            height: 50px;"></p>
        </div>
    </div>
</div>
-->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- DataTable JS -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<!-- jQuery UI JS -->
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
{{-- Custom JS --}}
<script src="{{ asset('js/menu.js') }}"></script>
@yield('jsScripts')
<script type="text/javascript">
$(function () {
  $('[data-toggle="popover"]').popover()
})    
</script>
</body>
</html>