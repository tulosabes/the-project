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
                    
                    <p>{{ $club->name }}</p>

                    <p>{{ $club->direccion }}</p>

                    <p>{{ $club->obtenerCPostal() }} {{ $club->obtenerPoblacion() }} {{ $club->obtenerProvincia() }}</p>

                </div>

                <div class="col-sm-12 col-md-4 text-center">
                    <p>
                        <a href="">
                            Contacto
                        </a>
                    </p>
                </div>

                <div class="col-sm-12 col-md-4 text-center">

                    <p><small>Copyright © 2018 {{ $club->name }}</small></p>

                    <p><small>Web diseñada por {{ ucwords($admin->name) }} {{ ucwords($admin->apellidos) }}</small></p>

                </div>
                

            </div>

        </div>
      </footer>

@endsection