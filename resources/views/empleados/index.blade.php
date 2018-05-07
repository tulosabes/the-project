@extends('admin') 

@section('title', 'Empleados')

@section('script');
	<script src="{{ asset('js/scriptEmpleados.js') }}"></script> 
@endsection

@section('content')

	<div class="d-flex justify-content-between align-items-end mb-3">
		
		<h1 class="pb-2">{{ $title }}</h1>

		<p><a href="{{ route('empleados.create') }}" class="btn btn-success">Crear empleado</a></p>

	</div>

	@if ($empleados->isNotEmpty())

		<div class="table-responsive ">
			<table class="table table-bordered table-striped table-hover" id="tableEmpleados">
			
				<thead class="table-dark">
					
					<tr>
						<th class="col-sm-2">Nombre</th>
						<th class="col-sm-4">Email</th>
						<th class="col-sm-1">Teléfono</th>
						<th class="col-sm-1">Nivel</th>
						<th class="col-sm-1">Población</th>
						<th class="col-sm-1">Provincia</th>
						<th class="col-sm-1">Acciones</th>

					</tr>

				</thead>

				<tbody class="table">
					
					@foreach ($empleados as $empleado)

						<tr>
							<td>{{ ucwords($empleado->name) }}</td>
							<td>{{ $empleado->email }}</td>
							<td>{{ $empleado->telefono }}</td>
							<td>{{ $empleado->obtenerNivel() }}</td>
							<td>{{ $empleado->obtenerPoblacion() }}</td>
							<td>{{ $empleado->obtenerProvincia() }}</td>

							<td class="text-center">
								
								<form action="{{ route('empleados.destroy', ':USER_ID') }}" method="POST" id="formIndexEmpleados">


									{!! csrf_field() !!} <!-- proteccion de la insercion de datos de terceros, este toquen mantiene la proteccion activa y es mejor usarlo aqui que quitarlo del archivo Http/Kernel.php la directiva \App\Http\Middleware\VerifyCsrfToken::class valdria con comentarla (siempre dentro del formulario)-->


									{{ method_field('DELETE') }} <!--campo oculto para decirle que estamos enviando por DELETE y no por post-->

									<div class="btn-group">
										
										<a href="{{ route('empleados.show', $empleado) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>

										<a href="{{ route('empleados.edit', $empleado) }}" class="btn btn-outline-warning"><span class="oi oi-pencil"></span></a>

									<button type="" class="btn btn-outline-danger eliminarEmpleado" value="{{ $empleado->id }}"><span class="oi oi-trash"></span></button>
									</div>
								</form>
							</td>
						</tr>

					@endforeach

				</tbody>

			</table>
		</div>

		<div class="row justify-content-center mt-3">
			
			{{ $empleados->render('pagination::bootstrap-4') }}
			
		</div>

	@else

		<p>No hay empleados registrados</p>

	@endif

@endsection

@section('sidebar')


@endsection
