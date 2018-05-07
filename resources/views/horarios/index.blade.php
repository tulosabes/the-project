@extends('admin') 

@section('title', 'Horarios')

@section('content')

<div class="row justify-content-center">

	<div class=" col-sm-12 col-md-12 col-lg-6">

		<div class="d-flex justify-content-between align-items-end mb-3">
			
			<h1 class="pb-2">{{ $title }}</h1>

			<!--<p><a href="{{ route('jugadores.create') }}" class="btn btn-primary">Crear jugador</a></p>-->

		</div>

			@if ($horarios->isNotEmpty())

			<div class="table-responsive">

				<table class="table table-bordered table-striped table-hover">
				
					<thead class="table-dark">
						<tr>
							<th class="3">Nombre</th>
							<th class="3">Hora</th>
							<th class="3">Duración</th>
							<th class="3">Editar</th>
						</tr>

					</thead>

					<tbody class="table">
						
						@foreach ($horarios as $horario)

							<tr>
								<td>{{ $horario->name }}</td>
								<td>{{ $horario->hora }}</td>
								<td>{{ $horario->duracion }}</td>
								<td class="text-center">
									<a href="{{ route('horarios.edit', $horario) }}" class="btn btn-outline-warning"><span class="oi oi-pencil"></span></a>
								</td>
							</tr>

						@endforeach

					</tbody>

				</table>
			</div>

		@else

			<p>No hay horarios registradas</p>

		@endif
	</div>
</div>

@endsection

@section('sidebar')


@endsection
