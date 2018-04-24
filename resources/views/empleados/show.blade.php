@extends('admin') 

@section('title', "Empleado $empleado->name ")

@section('content')

	<h1>Empleado con Id {{ $empleado->id }}</h1>

	<p>Nombre del empleado: {{ $empleado->name }}</p>	

	<p>Apellidos del empleado: {{ $empleado->apellidos }}</p>

	<p>Fecha de nacimiento: {{ $empleado->formatoFecha($empleado->id) }}

	@if ($empleado->dni === null)

		<p>NIE del empleado: {{ $empleado->nif }}</p>

	@else

		<p>NIF del empleado: {{ $empleado->dni }}</p>

	@endif

	<p>Email del empleado: {{ $empleado->email }}</p>

	<p>Telefono del empleado: {{ $empleado->telefono }}</p>

	<p>Nivel del jugador: {{ $empleado->obtenerNivel() }}</p>

	<p>Direccion del empleado: {{ $empleado->direccion }}</p>

	<p>Provincia del empleado: {{ $empleado->obtenerProvincia() }}</p>

	<p>Poblacion del empleado: {{ $empleado->obtenerPoblacion() }}</p>


	<!--<p><a href="{{ url('/empleados') }}">Volver al listado de usuario</a></p>-->	
	<!--<p><a href="{{ url()->previous() }}">Volver al listado de empleados</a></p>-->
	<!--<p><a href="{{ action('EmpleadosController@index') }}">Volver al listado de usuario</a></p>-->
	<!--<p><a href="{{ route('empleados.index') }}">Volver al listado de empleados</a></p>-->

	<!--con boton me gusta mas-->
	<form action="{{ route('empleados.index') }}"><button type="submit" class="btn btn-warning">Volver</button></form>

@endsection