@extends('admin') 

@section('title', "Jugador $jugador->name")

@section('content')

	<h1>Jugador con Id {{ $jugador->id }}</h1>

	<p>Nombre del jugador: {{ $jugador->name }}</p>	

	<p>Apellidos del jugador: {{ $jugador->apellidos }}</p>

	@if ($jugador->dni === null)

		<p>NIE del jugador: {{ $jugador->nif }}</p>

	@else

		<p>NIF del jugador: {{ $jugador->dni }}</p>

	@endif

	<p>Email del jugador: {{ $jugador->email }}</p>

	<p>Telefono del jugador: {{ $jugador->telefono }}</p>

	<p>Nivel del jugador: {{ $jugador->obtenerNivel() }}</p>

	<p>Direccion del jugador: {{ $jugador->direccion }}</p>

	<p>Provincia del jugador: {{ $jugador->obtenerProvincia() }}</p>

	<p>Población del jugador: {{ $jugador->obtenerPoblacion() }}</p>

	<form action="{{ route('jugadores.index') }}"><button type="submit" class="btn btn-success">Volver</button></form>

@endsection