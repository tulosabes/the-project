@extends('admin') 

@section('title', 'Jugadores')

@section('content')

	<div class="d-flex justify-content-between align-items-end mb-3">
		
		<h1 class="pb-2">{{ $title }}</h1>

		<p><a href="{{ route('jugadores.create') }}" class="btn btn-primary">Crear jugador</a></p>

	</div>

	@if ($jugadores->isNotEmpty())

		<table class="table table-bordered">
		
			<thead class="table-dark">
				
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>Dni</th>
					<th>Email</th>
					<th>Telefono</th>
					<th>Nivel</th>
					<th>Dirección</th>
					<th>Población</th>
					<th>Provincia</th>
					<th>CP</th>
					<th>Acciones</th>

				</tr>

			</thead>

			<tbody>
				
				@foreach ($jugadores as $jugador)

					<tr>
						
						<td>{{ $jugador->id }}</td>
						<td>{{ $jugador->name }}</td>
						<td>{{ $jugador->apellidos }}</td>
						<td>{{ $jugador->dni }}</td>
						<td>{{ $jugador->email }}</td>
						<td>{{ $jugador->telefono }}</td>
						<td>{{ $jugador->obtenerNivel() }}</td>
						<td>{{ $jugador->direccion }}</td>
						<td>{{ $jugador->poblacion }}</td>
						<td>{{ $jugador->provincia }}</td>
						<td>{{ $jugador->c_postal }}</td>
			
						<td>
							
							<form action="{{ route('jugadores.destroy', $jugador) }}" method="POST">


								{!! csrf_field() !!} 

								{{ method_field('DELETE') }} 

								<a href="{{ route('jugadores.show', $jugador) }}" class="btn btn-success"><span class="oi oi-eye"></span></a>

								<a href="{{ route('jugadores.edit', $jugador) }}" class="btn btn-warning"><span class="oi oi-pencil"></span></a>

								<button type="submit" class="btn btn-danger"><span class="oi oi-trash"></span></button>
							</form>
						</td>
					</tr>

				@endforeach

			</tbody>

		</table>

	@else

		<p>No hay jugadores registrados</p>

	@endif

@endsection

@section('sidebar')


@endsection
