@extends('admin') 

@section('title', 'Perfil administrador')

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
				<th>Teléfono</th>
				<th>Nivel</th>
				<th>Dirección</th>
				<th>Población</th>
				<th>Provincia</th>
				<th>CP</th>
				<th>Editar</th>
			</tr>

		</thead>

		<tbody class="table">
				
			<tr>
				<td>{{ $admin->name }}</td>
				<td>{{ $admin->apellidos }}</td>
						
				@if ($admin->dni === null)

					<td>{{ $admin->nif }}</td>

				@else

					<td>{{ $admin->dni }}</td>

				@endif
						
				<td>{{ $admin->email }}</td>
				<td>{{ $admin->telefono }}</td>
				<td>{{ $admin->obtenerNivel() }}</td>
				<td>{{ $admin->direccion }}</td>
				<td>{{ $admin->obtenerPoblacion() }}</td>
				<td>{{ $admin->obtenerProvincia() }}</td>
				<td>{{ $admin->obtenerCPostal() }}</td>
				<td>
					<a href="{{ route('perfiles.edit', $admin) }}" class="btn btn-outline-warning"><span class="oi oi-pencil"></span></a>
				</td>
			</tr>

		</tbody>

	</table>

@endsection

@section('sidebar')


@endsection

 