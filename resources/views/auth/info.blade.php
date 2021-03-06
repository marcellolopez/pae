        @extends('auth.layouts.master')

        @section('content')

        <div class="col-lg-offset-3 col-lg-6">
            <div class="card" >
                <div class="card-body">

                <div class="col-6 offset-lg-3"> 
                    <img class="mb-4 img-fluid" src="{{ asset('img/Logos_MET_V3_DTI_png.png') }}" alt="">                   
                </div>  
                    <div class="alert alert-info text-center">
                        <ul style="list-style: none; margin: 0; padding: 0">
                            <h5>{{ $info }}</h5>
                        </ul>          
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
                    <p class="mt-2 text-muted text-center">           
                        <img class="img-fluid" src="{{asset('img/Una_Empresa_GC_Fondo_Claro.png')}}" alt="Logo de GrupoCetep" style="
        max-width: 100%;
        height: 80px;">
                    </p>
                </div>
            </div>
        </div>


        @endsection
