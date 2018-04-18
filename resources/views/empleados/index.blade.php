@extends('admin') 

@section('title', 'Empleados')

@section('content')

	<div class="d-flex justify-content-between align-items-end mb-3">
		
		<h1 class="pb-2">{{ $title }}</h1>

		<p><a href="{{ route('empleados.create') }}" class="btn btn-primary">Crear empleado</a></p>

	</div>

	@if ($empleados->isNotEmpty())

		<table class="table table-bordered">
		
			<thead class="table-dark">
				
				<tr>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>Dni</th>
					<th>Email</th>
					<th>Telefono</th>
					<th>Nivel</th>
					<th>Dirección</th>
					<th>Población</th>
					<th>Provincia</th>
					<th>Acciones</th>

				</tr>

			</thead>

			<tbody class="table">
				
				@foreach ($empleados as $empleado)

					<tr>
						<td>{{ $empleado->name }}</td>
						<td>{{ $empleado->apellidos }}</td>
						
						@if ($empleado->dni === null)

							<td>{{ $empleado->nif }}</td>

						@else

							<td>{{ $empleado->dni }}</td>

						@endif

						<td>{{ $empleado->email }}</td>
						<td>{{ $empleado->telefono }}</td>
						<td>{{ $empleado->obtenerNivel() }}</td>
						<td>{{ $empleado->direccion }}</td>
						<td>{{ $empleado->obtenerPoblacion() }}</td>
						<td>{{ $empleado->obtenerProvincia() }}</td>


						<!--<td><a href="{{ url("/empleados/{$empleado->id}") }}">Ver detalles</a></td>-->
						<!--<td><a href="{{ action('EmpleadosController@show',['id' => $empleado->id]) }}">Ver detalles</a></td>-->
						
						<!-- De esta manera utilizamos los nombres de las rutas que pusimos en web.php y con el metodo name()
							como 1º argumento en route() le pasamos el nombre de la ruta
							como 2º los datos que queremos pasar a la otra ruta-->
						<td>
							<!--
							<form action="{{ route('empleados.show', $empleado) }}" method="POST">


								{!! csrf_field() !!} proteccion de la insercion de datos de terceros, este toquen mantiene la proteccion activa y es mejor usarlo aqui que quitarlo del archivo Http/Kernel.php la directiva \App\Http\Middleware\VerifyCsrfToken::class valdria con comentarla (siempre dentro del formulario)


								{{ method_field('GET') }} campo oculto para decirle que estamos enviando por GET y no por post y asi evitamos tambien que se no se envie ninguan dato por la URL

								<button type="submit" class="btn btn-warning">Ver</button>
							</form>-->

							<!--
							<form action="{{ route('empleados.edit', $empleado) }}" method="POST">


								{!! csrf_field() !!} proteccion de la insercion de datos de terceros, este toquen mantiene la proteccion activa y es mejor usarlo aqui que quitarlo del archivo Http/Kernel.php la directiva \App\Http\Middleware\VerifyCsrfToken::class valdria con comentarla (siempre dentro del formulario)


								{{ method_field('GET') }} campo oculto para decirle que estamos enviando por GET y no por post y asi evitamos tambien que se no se envie ninguan dato por la URL

								<button type="submit" class="btn btn-success">Editar</button>
							</form>-->
							
							<!---->
							<form action="{{ route('empleados.destroy', $empleado) }}" method="POST">


								{!! csrf_field() !!} <!-- proteccion de la insercion de datos de terceros, este toquen mantiene la proteccion activa y es mejor usarlo aqui que quitarlo del archivo Http/Kernel.php la directiva \App\Http\Middleware\VerifyCsrfToken::class valdria con comentarla (siempre dentro del formulario)-->


								{{ method_field('DELETE') }} <!--campo oculto para decirle que estamos enviando por DELETE y no por post-->

								<div class="btn-group">
									
									<a href="{{ route('empleados.show', $empleado) }}" class="btn btn-success"><span class="oi oi-eye"></span></a>

									<a href="{{ route('empleados.edit', $empleado) }}" class="btn btn-warning"><span class="oi oi-pencil"></span></a>

									<button type="submit" class="btn btn-danger"><span class="oi oi-trash"></span></button>
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
