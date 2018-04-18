@extends('admin') 

@section('title', 'Horarios')

@section('content')

	<div class="d-flex justify-content-between align-items-end mb-3">
		
		<h1 class="pb-2">{{ $title }}</h1>

		<!--<p><a href="{{ route('jugadores.create') }}" class="btn btn-primary">Crear jugador</a></p>-->

	</div>

		@if ($horarios->isNotEmpty())

		<table class="table table-bordered">
			
			<thead class="table-dark">
				<tr>
					<th>Nombre</th>
					<th>Hora</th>
					<th>Duración</th>
					<th>Editar</th>
				</tr>

			</thead>

			<tbody class="table">
				
				@foreach ($horarios as $horario)

					<tr>
						<td>{{ $horario->name }}</td>
						<td>{{ $horario->hora }}</td>
						<td>{{ $horario->duracion }}</td>
						<td>
							<a href="{{ route('horarios.edit', $horario) }}" class="btn btn-warning"><span class="oi oi-pencil"></span></a>
						</td>
					</tr>

				@endforeach

			</tbody>

		</table>

	@else

		<p>No hay horarios registradas</p>

	@endif

@endsection

@section('sidebar')


@endsection
