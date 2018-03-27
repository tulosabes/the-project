@extends('admin') 

@section('title', "Jugador $jugador->name")

@section('content')

	<h1>Jugador con Id {{ $jugador->id }}</h1>

	<p>Nombre del jugador: {{ $jugador->name }}</p>	

	<p>Apellidos del jugador: {{ $jugador->apellidos }}</p>

	<p>DNI del jugador: {{ $jugador->dni }}</p>

	<p>Email del jugador: {{ $jugador->email }}</p>

	<p>Telefono del jugador: {{ $jugador->telefono }}</p>

	<p>Nivel del jugador: {{ $jugador->obtenerNivel() }}</p>

	<p>Direccion del jugador: {{ $jugador->direccion }}</p>

	<p>Poblacion del jugador: {{ $jugador->poblacion }}</p>

	<p>Provincia del jugador: {{ $jugador->provincia }}</p>

	<p>Código portal del jugador: {{ $jugador->c_postal }}</p>

	<form action="{{ route('jugadores.index') }}"><button type="submit" class="btn btn-success">Volver</button></form>

@endsection