@extends('layout') 

@section('title', "Página no encontrada")

@section('content')

	<h1>Ooopss!!!</h1>

	<h3>Página no encontrada</h3>

	<!--<p><a href="{{ route('welcome') }}">Volver a Usuarios</a></p>-->

	<form action="{{ route('welcome') }}"><button type="submit" class="btn btn-success">Volver</button></form>

	
@endsection