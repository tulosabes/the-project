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
				<th>Telefono</th>
				<th>Dirección</th>
				<th>Población</th>
				<th>Provincia</th>
				<th>CP</th>
				<th>Acciones</th>

			</tr>

		</thead>

		<tbody>
			
			@foreach($club as $cl)

				<tr>
					<td>{{ $cl->name }}</td>
					<td>{{ $cl->email }}</td>
					<td>{{ $cl->telefono }}</td>
					<td>{{ $cl->direccion }}</td>
					<td>{{ $cl->poblacion }}</td>
					<td>{{ $cl->provincia }}</td>
					<td>{{ $cl->c_postal }}</td>
					<td><a href="{{ route('club.edit', $cl) }}" class="btn btn-primary"><span class="oi oi-pencil"></span></a></td>
				</tr>
			@endforeach

		</tbody>

	</table>


@endsection

@section('sidebar')


@endsection
