@extends('admin') 

@section('title', 'Jugadores')

@section('content')

	<div class="d-flex justify-content-between align-items-end mb-3">
		
		<h1 class="pb-2">{{ $title }}</h1>

		<p><a href="{{ route('jugadores.create') }}" class="btn btn-success">Crear jugador</a></p>

	</div>
		
		@if ($jugadores->isNotEmpty())

		<div class="table-responsive">
			<table class="table table-bordered table-striped table-hover">
			
				<thead class="table-dark">
					
					<tr>
						<th class="col-sm-1">Nombre</th>
						<th class="col-sm-1">Apellidos</th>
						<th class="col-sm-1">Dni</th>
						<th class="col-sm-1">Email</th>
						<th class="col-sm-1">Teléfono</th>
						<th class="col-sm-1">Nivel</th>
						<th class="col-sm-1">Dirección</th>
						<th class="col-sm-1">Población</th>
						<th class="col-sm-1">Provincia</th>
						<th class="col-sm-1">CP</th>
						<th class="col-sm-1">Acciones</th>

					</tr>

				</thead>

				<tbody class="table">
					
					@foreach ($jugadores as $jugador)

						<tr>
							<td>{{ ucwords($jugador->name) }}</td>
							<td>{{ ucwords($jugador->apellidos) }}</td>
							
							@if ($jugador->dni === null)

								<td>{{ $jugador->nif }}</td>

							@else

								<td>{{ $jugador->dni }}</td>

							@endif
							
							<td>{{ $jugador->email }}</td>
							<td>{{ $jugador->telefono }}</td>
							<td>{{ $jugador->obtenerNivel() }}</td>
							<td>{{ ucwords($jugador->direccion) }}</td>
							<td>{{ $jugador->obtenerPoblacion() }}</td>
							<td>{{ $jugador->obtenerProvincia() }}</td>
							<td>{{ $jugador->obtenerCPostal() }}</td>
				
							<td>
								
								<form action="{{ route('jugadores.destroy', $jugador) }}" method="POST">


									{!! csrf_field() !!} 

									{{ method_field('DELETE') }} 

									<div class="btn-group">
										
										<a href="{{ route('jugadores.show', $jugador) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>

										<a href="{{ route('jugadores.edit', $jugador) }}" class="btn btn-outline-warning"><span class="oi oi-pencil"></span></a>

										<button type="submit" class="btn btn-outline-danger"><span class="oi oi-trash"></span></button>

									</div>
								</form>
							</td>
						</tr>

					@endforeach

				</tbody>

			</table>
		</div>	

		<div class="row justify-content-center mt-3">
			{{ $jugadores->render('pagination::bootstrap-4') }}
		</div>

		@else

			<p>No hay jugadores registrados</p>

		@endif


@endsection

@section('sidebar')


@endsection
