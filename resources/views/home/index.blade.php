@extends('home') 

@section('title', 'Perfil jugador $jugador->name')

@section('content')

	<div class="d-flex justify-content-between align-items-end mb-3">
		
		<h1 class="pb-2">{{ $title }}</h1>

	</div>

	
	<table class="table table-bordered">
		
		<thead class="table-dark">
				
			<tr>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Dni</th>
				<th>Email</th>
				<th>Telefono</th>
				<th>Nivel</th>
				<th>Dirección</th>
				<th>Población</th>
				<th>Provincia</th>
				<th>Acciones</th>
			</tr>

		</thead>

		<tbody class="table">
				
			<tr>
				<td>{{ $jugador->name }}</td>
				<td>{{ $jugador->apellidos }}</td>
						
				@if ($jugador->dni === null)

					<td>{{ $jugador->nif }}</td>

				@else

					<td>{{ $jugador->dni }}</td>

				@endif
						
				<td>{{ $jugador->email }}</td>
				<td>{{ $jugador->telefono }}</td>
				<td>{{ $jugador->obtenerNivel() }}</td>
				<td>{{ $jugador->direccion }}</td>
				<td>{{ $jugador->obtenerPoblacion() }}</td>
				<td>{{ $jugador->obtenerProvincia() }}</td>
				<td>
					<form action="{{ route('home.destroy', $jugador) }}" method="POST">


						{!! csrf_field() !!} <!-- proteccion de la insercion de datos de terceros, este toquen mantiene la proteccion activa y es mejor usarlo aqui que quitarlo del archivo Http/Kernel.php la directiva \App\Http\Middleware\VerifyCsrfToken::class valdria con comentarla (siempre dentro del formulario)-->


						{{ method_field('DELETE') }} <!--campo oculto para decirle que estamos enviando por DELETE y no por post-->

						<a href="{{ route('home.edit', $jugador) }}" class="btn btn-warning"><span class="oi oi-pencil"></span></a>

						<button type="submit" class="btn btn-danger"><span class="oi oi-trash"></span></button>
					</form>
				</td>
			</tr>

		</tbody>

	</table>

@endsection

@section('sidebar')


@endsection

 