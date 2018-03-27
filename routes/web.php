<?php

// METODO GET para solicitar y obtener informacion
// METODO POST para enviar y procesar informacion


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// aqui estamos declarando una ruta de tipo get, para la URL de home, y esta ruta retorna una vista llamada "welcome"
// esta vista "welcome" se encuentra en el directorio "/resources/views/welcome.blade.php"

/* "blade" es el sistema de plantillas de laravel que luego veremos
Route::get('/', function () {
    return view('welcome');
});*/

// para autentificar el acceso a dichas

// podemos definir las rutas que queramos
// una ruta nueva que devuelve un texto, el cual sera mostrado en la pantalla del navegador
Route::get('/', function(){

	return view('welcome');
})->name('welcome');

Route::group(['prefix' => 'admin'], function(){

	Route::get('/',function(){

		return view('admin');
	});

	Route::get('/club', 'ClubController@index')->name('club.index');
	Route::get('/club/{club}', 'ClubController@show')->name('club.show');
	Route::get('/club/{club}/editar', 'ClubController@edit')->name('club.edit');
	Route::put('/club/{club}', 'ClubController@update')->name('club.update');

	// nueva ruta llamada usuario
	Route::get('/empleados', 'EmpleadosController@index')->name('empleados.index'); // CON NAME LO QUE HACEMOS ES DARLE UN MOBRE A LA RUTA PARA LUEGO LLAMARLA DESDE UN ENLACE

	// ruta para mostrar el detalle de un usuario
	// parametros dinamicos, se usan llaves {id}
	/*Route::get('empleados/detalles', function(){

		return 'Mostrando detalles del usuario ' . $_GET['id'];
	});*/

	// es lo mismo que arriba pero en este caso ya le pasamos el valor directamente en la URL
	Route::get('/empleados/{empleado}', 'EmpleadosController@show')->where('empleado', '[0-9]+')->name('empleados.show');
		//return 'Mostrando detalles del usuario ' . $id;

		// si ponemos comillas dobles no hace falta concatenar y podemos meter la variable dentro de las comillas
		// con esto conseguimos una URL mas limpia que en la ruta anterios con el nombre /detalles?id=5
		//return "Mostrando detalles del usuario {$id}";

	// una ruta para crear empleados
	// nos encontramos con la sorpresa de que no muestra esta ruta, sino la anterior y muestra el id, que en este cas seria /nuevo
	// esto sucede por que laravel compara las rutas en orden y muestra la primera ruta que coincida y las demas se ignoran
	// tenemos 2 formas de solucionar este problema
	// 1ª Forma "->where()" arriba ^ indicaremos en el metedo where, al cual pasamos el parametro y la expresion regular que queremos que coincida con dicho parametro, en este caso la ruta para crear nuevo usuario estara funcionando /nuevo
	// 2ª Forma aun mas sencilla, seria cambiando el ordena de las rutas primero poner la ruta "empleados/nuevo" y despues poner la ruta "empleados/{id}"
	Route::get('/empleados/nuevo', 'EmpleadosController@create')->name('empleados.create');

	// route de tipo post paar enviar y procesar informacion, ya que va haber cambios en nuestro sistema
	// podemos declarar dos rutas iguales pero con metodos diferentes, pero ambas seran rutas diferentes
	Route::post('/empleados', 'EmpleadosController@store')->name('empleados.store');

	// en laravel podemos pasar mas de un parametro a una ruta
	// podemos hacer que un parametro sea opcional con la interrogacion "?" y en el parametro de la funcion le pasaremos un valor por defecto
	Route::get('/saludo/{name}', 'WelcomeEmpleadosController@name');
	Route::get('/saludo/{name}/{nickname}', 'WelcomeEmpleadosController@nickname')->name('saludo');

	// ejercicio de una nueva ruta, en las rutas no hay que poner el signo "$"
	Route::get('/empleados/{empleado}/editar', 'EmpleadosController@edit')->where('id', '[0-9]+')->name('empleados.edit');

	// ruta para hacer el update del usuario
	Route::put('/empleados/{empleado}', 'EmpleadosController@update')->where('empleado', '[0-9]+')->name('empleados.update');

	// routa para borrar
	Route::delete('/empleados/{empleado}', 'EmpleadosController@destroy')->name('empleados.destroy');

	// nueva ruta llamada usuario
	Route::get('/empleados', 'EmpleadosController@index')->name('empleados.index'); // CON NAME LO QUE HACEMOS ES DARLE UN MOBRE A LA RUTA PARA LUEGO LLAMARLA DESDE UN ENLACE

	// ruta para mostrar el detalle de un jugador
	Route::get('/jugadores', 'JugadoresController@index')->name('jugadores.index');

	Route::get('/jugadores/{jugador}', 'JugadoresController@show')->where('jugador', '[0-9]+')->name('jugadores.show');
	
	Route::get('/jugadores/nuevo', 'JugadoresController@create')->name('jugadores.create');

	Route::post('/jugadores', 'JugadoresController@store')->name('jugadores.store');

	Route::get('/jugadores/{jugador}/editar', 'JugadoresController@edit')->where('id', '[0-9]+')->name('jugadores.edit');

	Route::put('/jugadores/{jugador}', 'JugadoresController@update')->where('jugador', '[0-9]+')->name('jugadores.update');

	Route::delete('/jugadores/{jugador}', 'JugadoresController@destroy')->name('jugadores.destroy');

	// rutas para mostrar las pistas del club
	Route::get('/pistas', 'PistasController@index')->name('pistas.index');
	Route::get('/pistas/{pista}/editar' , 'PistasController@edit')->name('pistas.edit');
	Route::put('/pistas/{pista}', 'PistasController@update')->name('pistas.update');
	Route::get('/pistas/{pista}', 'PistasController@show')->name('pistas.show');
});

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('admin');
