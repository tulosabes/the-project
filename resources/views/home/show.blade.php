@extends('home') 

@section('title', 'Perfil del jugador')

@section('content')

	<div class="d-flex justify-content-between align-items-end mb-3">
		
		<h1 class="pb-2">Mi perfil {{  $jugador->name }}</h1>

	</div>

	
	<div class="table-responsive ">
		<table class="table table-bordered table-striped table-hover">
		
			<thead class="table-dark">
					
				<tr>
					<th class="col-sm-1">Nombre</th>
					<th class="col-sm-1">Apellidos</th>
					<th class="col-sm-1">Dni</th>
					<th class="col-sm-2">Email</th>
					<th class="col-sm-1">Telefono</th>
					<th class="col-sm-1">Nivel</th>
					<th class="col-sm-2">Dirección</th>
					<th class="col-sm-1">Población</th>
					<th class="col-sm-1">Provincia</th>
					<th class="col-sm-1">Acciones</th>
				</tr>

			</thead>

			<tbody class="table">
					
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
						<form action="{{ route('home.destroy', $jugador) }}" method="POST">


							{!! csrf_field() !!} <!-- proteccion de la insercion de datos de terceros, este toquen mantiene la proteccion activa y es mejor usarlo aqui que quitarlo del archivo Http/Kernel.php la directiva \App\Http\Middleware\VerifyCsrfToken::class valdria con comentarla (siempre dentro del formulario)-->


							{{ method_field('DELETE') }} <!--campo oculto para decirle que estamos enviando por DELETE y no por post-->

							<div class="btn-group">

								<a href="{{ route('home.edit', $jugador) }}" class="btn btn-outline-warning"><span class="oi oi-pencil"></span></a>

								<button type="submit" class="btn btn-outline-danger"><span class="oi oi-trash"></span></button>

							</div>
						</form>
					</td>
				</tr>

			</tbody>

		</table>
	</div>
@endsection

@section('sidebar')


@endsection

 