@extends('admin') 

@section('title', "Empleado $empleado->name ")

@section('content')

	<h1>Empleado con Id {{ $empleado->id }}</h1>

	<p>Nombre del empleado: {{ $empleado->name }}</p>	

	<p>Apellidos del empleado: {{ $empleado->apellidos }}</p>

	<p>DNI del empleado: {{ $empleado->dni }}</p>

	<p>Email del empleado: {{ $empleado->email }}</p>

	<p>Telefono del empleado: {{ $empleado->telefono }}</p>

	<p>Nivel del jugador: {{ $empleado->obtenerNivel() }}</p>

	<p>Direccion del empleado: {{ $empleado->direccion }}</p>

	<p>Poblacion del empleado: {{ $empleado->poblacion }}</p>

	<p>Provincia del empleado: {{ $empleado->provincia }}</p>

	<p>Código portal del empleado: {{ $empleado->c_postal }}</p>


	<!--<p><a href="{{ url('/empleados') }}">Volver al listado de usuario</a></p>-->	
	<!--<p><a href="{{ url()->previous() }}">Volver al listado de empleados</a></p>-->
	<!--<p><a href="{{ action('EmpleadosController@index') }}">Volver al listado de usuario</a></p>-->
	<!--<p><a href="{{ route('empleados.index') }}">Volver al listado de empleados</a></p>-->

	<!--con boton me gusta mas-->
	<form action="{{ route('empleados.index') }}"><button type="submit" class="btn btn-success">Volver</button></form>

@endsection