@extends('layout')

@section('title', "Bienvenido a RP-PADEL")

    @section('navLiIzq')
      
        <li class="nav-item active"><a class="nav-link" href="{{ route('home.index') }}">Perfil</a></li>
        <li class="nav-item active"><a class="nav-link" href="">Mis Reservas</a></li>
        <li class="nav-item active"><a class="nav-link" href="">Hacer Reserva</a></li>


    @endsection

    @section('navLiDer')

        <li class="nav-item active"><a href="" class="nav-link">Bienvenido {{ Auth::user()->name }}!!!</a></li>

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
    
