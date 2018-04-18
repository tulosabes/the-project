@extends('layout')

@section('navLiIzq')
      
        <!--<li class="nav-item active"><a class="nav-link" href="{{ route('admin') }}">Home</a></li>-->
        <li class="nav-item active"><a class="nav-link" href="{{ route('admin.index') }}">Perfil</a></li>
        <li class="nav-item active"><a class="nav-link" href="{{ route('jugadores.index') }}">Jugadores</a></li>
        <li class="nav-item active"><a class="nav-link" href="{{ route('pistas.index') }}">Pistas</a></li>
        <li class="nav-item active"><a class="nav-link" href="">Reservas</a></li>

    @endsection

    @section('navLiDer')

        <li class="nav-item active"><a href="" class="nav-link">Bienvenido {{ Auth::user()->name }}!!!</a></li>

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

        <h1>Bienvenido  al panel de Adminstracion del empleado</h1>

        <div class="panel panel-default">
            <div class="panel-heading"></div>

            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>

    @endsection