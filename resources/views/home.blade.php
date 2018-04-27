@extends('layout')

@section('title', "Bienvenido a RP-PADEL")

    @section('navLiIzq')

        <li class="nav-item active"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
        <li class="nav-item active"><a class="nav-link" href="{{ route('home.show',Auth::user() ) }}">Perfil</a></li>
        
        <li class="nav-item dropdown bg-dark">
            
            <a class="nav-link dropdown-toggle" data-toggle='dropdown' href="">Reservas</a>
        
            <div class="dropdown-menu">

                <a class="dropdown-item" href="">Hacer reserva</a>
                <a class="dropdown-item" href="">Mis reservas</a>
                <a class="dropdown-item" href="">Otra parte de reservas</a>                

            </div>

        </li>



    @endsection

    @section('navLiDer')

        <li class="nav-item active"><a href="{{ route('home.show',Auth::user() ) }}" class="nav-link">Bienvenido {{ Auth::user()->name }}!!!</a></li>

        <li class="nav-item active">
            <a href="{{ route('logout') }}" class="nav-link btn btn-danger" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 {{ csrf_field() }}
            </form>
        </li>

    @endsection

    @section('navLiDer')

        <li class="nav-item active">
            <a href="{{ route('logout') }}" class="nav-link btn btn-danger" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>

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
    
