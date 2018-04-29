<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Club;
use App\User;

class WelcomeUserController extends Controller
{
	// metodo "__invoke" hace que este controlador solo tenga una accion, se ejecuta directamente, no hace falta que le pongamos la @metodo delante del metodo  'WelcomerUserController' anteriormente lo hariamos 'WelcomeUserController@nombre_metodo'
    /*public function __invoke($name, $nickname = null){

    	// 1º letra del nombre en mayusculas
		$name = ucfirst($name);

		// si introducimos el nickname que muestro lo siguiente si no lo otro
		if ($nickname) {
			
			return "Bienvenido {$name}, tu apodo es {$nickname}";
		
		}else{

			return "Bienvenido {$name}";
		}
	}*/
	
	public function index(){

		$club = Club::first();

		$admin = User::where('id_rol','=',1)->first();
        
        return view('welcome', compact('club', 'admin'));
	}

    public function name($name){

    	// 1º letra del nombre en mayusculas
		$name = ucfirst($name);

		return "Bienvenido su nombre es: {$name}";
    }

    public function nickName($nom,$nickname){

    	// 1º letra del nombre en mayusculas
		$nickname = ucfirst($nickname);
		// 1º letra del nombre en mayusculas
		$nom = ucfirst($nom);

		return "Bienvenido su nombre es: {$nom} y su apodo es: {$nickname}";
    }
}
