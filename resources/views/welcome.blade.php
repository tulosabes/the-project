@extends('layout') 

@section('title', "Bienvenido a RP-PADEL")

@section('content')

    <h1>Bienvenido a la pagina del WELCOME</h1>

@endsection

@section('footer')

    <footer class="footer fixed-bottom bg-dark">
        <div class="container">
          
            <div class="row">

                <div class="col-sm-12 col-md-4 text-center">
                    
                <small>{{ $club->name }}</small><br>

                <small>{{ $club->direccion }}</small><br>

                <small>{{ $club->obtenerCPostal() }} {{ $club->obtenerPoblacion() }} {{ $club->obtenerProvincia() }}</small><br>  

                </div>

                <div class="col-sm-12 col-md-4 text-center">
                    <p class="mt-3">
                        <a href="">
                            <small>Contacto</small>
                        </a>
                    </p>
                </div>

                <div class="col-sm-12 col-md-4 text-center">

                    <small>Copyright © 2018 {{ $club->name }}</small><br>

                    <small>Web diseñada por {{ ucwords($admin->name) }} {{ ucwords($admin->apellidos) }}</small>

                </div>
                

            </div>

        </div>
      </footer>

@endsection