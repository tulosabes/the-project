@extends('admin') 

@section('title', 'Información del club')

@section('content')

	<div class="container-fluid">

		<div class="d-flex justify-content-between atdgn-items-end mb-3">
		
		<h1 class="pb-2">{{ $title }}</h1>

	</div>

	<div class=" table-responsive">
		<table class="table table-bordered table-striped table-hover">
			
			<thead class="table-dark">
				
				<tr>
					<th class="col-sm-1">Nombre</th>
					<th class="col-sm-3">Email</th>
					<th class="col-sm-1">Teléfono</th>
					<th class="col-sm-3">Dirección</th>
					<th class="col-sm-1">Población</th>
					<th class="col-sm-1">Provincia</th>
					<th class="col-sm-1">CP</th>
					<th class="col-sm-1">Editar</th>

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


	</div>

@endsection

@section('sidebar')


@endsection
