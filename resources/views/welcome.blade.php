@extends('layout')

@section('customCss')
    <link rel="stylesheet" href="{{ asset('css/paciente/pacienteWelcome.css') }}">
@endsection

@section('content')


    <div class="row d-flex justify-content-center mb-1">
        <div class="col-md-10">
            <div class="container">
            <br>
            <div class="card ">
                <div class="card-header bg-primary text-white">
                   
                        Registrar consulta
          
                </div>
                <div class="card-body">
                        <form method="POST" class="" action="{{ route('consultar_paciente') }}" aria-label="{{ __('Register') }}">
                            <div class="row">
                                <div class="col-4 offset-4">
                                    @csrf
                                    <img class="mb-4 img-fluid" src="{{ asset('img/met-logo.png') }}" alt="">                   
                                </div>

                            </div>

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
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                    <strong>{{ $message }}</strong>
                            </div>
                            @endif

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="control-label text-left" for="rut">RUT *</label>
                                        <input id="rut" type="rut" class="form-control{{ $errors->has('rut') ? ' is-invalid' : '' }}" name="rut" value="{{ old('rut') }}" placeholder="12345678"  required>
                                    </div>

                                </div>
                                <div class="col-6">                        
                                    <div class="form-group">
                                        <label class="control-label text-left" for="rut"> </label>
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Ingresar consulta
                                        </button>
                                    </div>                       
                                </div>

                            </div>

                            <legend></legend>
                            <div class="row">
                                <div class="col-lg-4 offset-lg-2 col-sm-4 offset-sm-2 col-xs-4 offset-xs-2"> 
                                    <img class="mb-4 img-fluid" src="{{ asset('img/banmedica-logo.png') }}" alt="">
                                </div>
                                <div class="col-lg-4 col-sm-4 col-xs-4 pull-right">
                                    <img class="mb-4 img-fluid" src="{{ asset('img/vidatres-logo.png') }}" alt="">
                                </div>
                            </div>

                     
                        </form>                
                </div>
            </div>
            </div>
        </div>
    </div>

@endsection

@section('jsScripts')
    @parent
   <script type="text/javascript">
        $(document).ready( function () { 
            $( ".datos" ).css( "display","none" );
        });      
   </script>
<style type="text/css">
.text-label {
  background: rgba(0, 0, 0, 0);
  border: none;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

</style>
@endsection