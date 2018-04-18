@extends('admin') 

@section('title', 'Jugadores')

@section('content')

	<div class="d-flex justify-content-between align-items-end mb-3">
		
		<h1 class="pb-2">{{ $title }}</h1>

		<p><a href="{{ route('jugadores.create') }}" class="btn btn-primary">Crear jugador</a></p>

	</div>

	<div class="row">
		
		@if ($jugadores->isNotEmpty())

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
					
					@foreach ($jugadores as $jugador)

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
								
								<form action="{{ route('jugadores.destroy', $jugador) }}" method="POST">


									{!! csrf_field() !!} 

									{{ method_field('DELETE') }} 

									<div class="btn-group">
										
										<a href="{{ route('jugadores.show', $jugador) }}" class="btn btn-success"><span class="oi oi-eye"></span></a>

										<a href="{{ route('jugadores.edit', $jugador) }}" class="btn btn-warning"><span class="oi oi-pencil"></span></a>

										<button type="submit" class="btn btn-danger"><span class="oi oi-trash"></span></button>

									</div>
								</form>
							</td>
						</tr>

					@endforeach

				</tbody>

			</table>
					
		
					
					{{ $jugadores->render('pagination::bootstrap-4') }}

			

		@else

			<p>No hay jugadores registrados</p>

		@endif

	</div>

@endsection

@section('sidebar')


@endsection
