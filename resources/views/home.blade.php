@extends('layout')

@section('title', "Bienvenido a RP-PADEL")

@section('script');
    <script src="{{ asset('js/scriptLogout.js') }}"></script> 
@endsection

    @section('nav')
    @stop

    @section('navLiIzq')

        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}"><span class="oi oi-home"></span> Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('home.show',Auth::user() ) }}"><span class="oi oi-person"></span> Perfil</a></li>
        
        <li class="nav-item dropdown bg-dark">
            
            <a class="nav-link dropdown-toggle" data-toggle='dropdown' href=""><span class="oi oi-layers"></span> Reservas</a>
        
            <div class="dropdown-menu">

                <a class="dropdown-item" href="">Hacer reserva</a>
                <a class="dropdown-item" href="">Mis reservas</a>
                <a class="dropdown-item" href="">Otra parte de reservas</a>                

            </div>

        </li>



    @endsection

    @section('navLiDer')

        <li class="nav-item"><a href="{{ route('home.show',Auth::user() ) }}" class="nav-link">Bienvenido {{ ucwords(Auth::user()->name) }}!!!</a></li>

        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link btn btn-outline-danger" id="logout"><span class="oi oi-account-logout"></span> Salir</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 {{ csrf_field() }}
            </form>
        </li>

        @section('loginRegister')
        @stop

    @endsection

    @section('content')

        <h1>Beinvenido al HOME del jugador</h1>

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
                            <small class="letraColor">Contacto</small>
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
    
