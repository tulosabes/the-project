@extends('admin') 

@section('title', 'Pistas')

@section('content')

	<div class="d-flex justify-content-between align-items-end mb-3">
		
		<h1 class="pb-2">{{ $title }}</h1>

		

	</div>

	@if ($pistas->isNotEmpty())

		<table class="table table-bordered">
			
			<thead class="table-dark">
				<tr>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Disponible</th>
					<th>Editar</th>
				</tr>

			</thead>

			<tbody class="table">
				
				@foreach ($pistas as $pista)

					<tr>
						<td>{{ $pista->name }}</td>
						<td>{{ $pista->descripcion }}</td>
						<td>{{ $pista->VerDisponibilidad() }}</td>
						<td>
							<a href="{{ route('pistas.edit', $pista) }}" class="btn btn-warning"><span class="oi oi-pencil"></span></a>
						</td>
					</tr>

				@endforeach

			</tbody>

		</table>

	@else

		<p>No hay pistas registradas</p>

	@endif

@endsection

@section('sidebar')


@endsection
