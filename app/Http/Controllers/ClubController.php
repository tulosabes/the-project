<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// importar la clase para trabajar con bases de datos
use Illuminate\Support\Facades\DB;

// importar App\Users para trabajar con eloquent
use App\Club;
use App\Provincia;
use App\Poblacion;

// importar Rule para hacer la regla de validacion de email
use Illuminate\Validation\Rule;

class ClubController extends Controller
{
    
    

    public function index(){
 
        $title = 'Información del club';

        $club = Club::all()->where('id',1); 

        //dd($club);

        return view('club.index', compact('title','club'));
    }

    public function show(Club $club){

        return redirect()->route('club.index');
    }

    public function edit(Request $request, Club $club){

        
        $provincias = Provincia::orderBy('provincia', 'asc')->get();
        $poblaciones = Poblacion::where('id_provincia', $club->id_provincia)->get();

        return view('club.edit', compact('provincias','club', 'poblaciones'));
        
    }

    public function update(Club $club){

    	$data = request()->validate([

    		'name' => 'required|max:20',
    		'email' => ['required','email','confirmed'], 
    		'telefono' => array('required','numeric','regex:/^[9|6|7][0-9]{8}$/'),
    		'direccion' => 'required|max:50',
    		'poblacion' => 'numeric|min:1',
            'provincia' => 'numeric|min:1',
    	],
        [
            'poblacion.min' => 'Tiene que elegir una población',
            'provincia.min' => 'Tiene que elegir una provincia'
        ]);

		//dd($club);
		
		$club->id_poblacion = $data['poblacion'];
        $club->id_provincia = $data['provincia']; 

    	$club->update($data);

        return redirect()->route('club.index');

    }
}
