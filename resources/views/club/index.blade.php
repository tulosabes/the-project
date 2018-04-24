@extends('admin') 

@section('title', 'Información del club')

@section('content')

	<div class="d-flex justify-content-between atdgn-items-end mb-3">
		
		<h1 class="pb-2">{{ $title }}</h1>

	</div>

	<table class="table">
		
		<thead class="table-dark">
			
			<tr>
				<th>Nombre</th>
				<th>Email</th>
				<th>Teléfono</th>
				<th>Dirección</th>
				<th>Población</th>
				<th>Provincia</th>
				<th>CP</th>
				<th>Editar</th>

			</tr>

		</thead>

		<tbody class="table">
			
			@foreach($club as $cl)

				<tr>
					<td>{{ $cl->name }}</td>
					<td>{{ $cl->email }}</td>
					<td>{{ $cl->telefono }}</td>
					<td>{{ $cl->direccion }}</td>
					<td>{{ $cl->obtenerPoblacion() }}</td>
					<td>{{ $cl->obtenerProvincia() }}</td>
					<td>{{ $cl->obtenerCPostal() }}</td>
					<td><a href="{{ route('club.edit', $cl) }}" class="btn btn-outline-warning"><span class="oi oi-pencil"></span></a></td>
				</tr>
			@endforeach

		</tbody>

	</table>


@endsection

@section('sidebar')


@endsection
