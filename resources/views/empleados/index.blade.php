@extends('admin') 

@section('title', 'Empleados')

@section('content')

	<div class="d-flex justify-content-between align-items-end mb-3">
		
		<h1 class="pb-2">{{ $title }}</h1>

		<p><a href="{{ route('empleados.create') }}" class="btn btn-success">Crear empleado</a></p>

	</div>

	@if ($empleados->isNotEmpty())

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
					<th>Acciones</th>

				</tr>

			</thead>

			<tbody class="table">
				
				@foreach ($empleados as $empleado)

					<tr>
						<td>{{ ucwords($empleado->name) }}</td>
						<td>{{ ucwords($empleado->apellidos) }}</td>
						
						@if ($empleado->dni === null)

							<td>{{ $empleado->nif }}</td>

						@else

							<td>{{ $empleado->dni }}</td>

						@endif

						<td>{{ $empleado->email }}</td>
						<td>{{ $empleado->telefono }}</td>
						<td>{{ $empleado->obtenerNivel() }}</td>
						<td>{{ ucwords($empleado->direccion) }}</td>
						<td>{{ $empleado->obtenerPoblacion() }}</td>
						<td>{{ $empleado->obtenerProvincia() }}</td>
						<td>{{ $empleado->obtenerCPostal() }}</td>

						<td>
							
							<form action="{{ route('empleados.destroy', $empleado) }}" method="POST">


								{!! csrf_field() !!} <!-- proteccion de la insercion de datos de terceros, este toquen mantiene la proteccion activa y es mejor usarlo aqui que quitarlo del archivo Http/Kernel.php la directiva \App\Http\Middleware\VerifyCsrfToken::class valdria con comentarla (siempre dentro del formulario)-->


								{{ method_field('DELETE') }} <!--campo oculto para decirle que estamos enviando por DELETE y no por post-->

								<div class="btn-group">
									
									<a href="{{ route('empleados.show', $empleado) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>

									<a href="{{ route('empleados.edit', $empleado) }}" class="btn btn-outline-warning"><span class="oi oi-pencil"></span></a>

									<button type="submit" class="btn btn-outline-danger"><span class="oi oi-trash"></span></button>
								</div>
							</form>
						</td>
					</tr>

				@endforeach

			</tbody>

		</table>

	@else

		<p>No hay empleados registrados</p>

	@endif

@endsection

@section('sidebar')


@endsection
