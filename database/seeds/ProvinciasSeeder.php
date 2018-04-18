<?php

use Illuminate\Database\Seeder;

use App\Provincia;

class ProvinciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /* Provincia::create([
        	'provincia'=>'Álava',
        	'provinciaseo' =>'alava'
        	,'provincia3'=> 'ALV',
        ]);

		Provincia::create([
			'provincia'=>'Castellón',
			'provinciaseo' =>'castellon',
			'provincia3'=>'CAS'
		]);

		Provincia::create([
			'provincia'=>'León',
			'provinciaseo' =>'leon',
			'provincia3'=>'LEO'

		]);

		Provincia::create([
			'provincia'=> 'Salamanca', 
			'provinciaseo' =>'salamanca',
			'provincia3'=> 'SAL'
		]);

		Provincia::create([
			'provincia'=>'Albacete', 
			'provinciaseo' =>'albacete',
			'provincia3'=> 'ABC'
		]);

		Provincia::create([
			'provincia'=>'Ceuta', 
			'provinciaseo' =>'ceuta',
			'provincia3'=> 'CEU'
		]);

		Provincia::create([
			'provincia'=> 'Lleida', 
			'provinciaseo' =>'lleida', 
			'provincia3'=>'LLE'
		]);

		Provincia::create([
			'provincia'=>'Segovia', 
			'provinciaseo' =>'segovia', 
			'provincia3'=>'SGV'
		]);

		Provincia::create([
			'provincia'=>'Alicante', 
			'provinciaseo' =>'alicante', 
			'provincia3'=>'ALA'
		]);

		Provincia::create([
			'provincia'=>'Ciudad Real', 
			'provinciaseo' =>'ciudad-real', 
			'provincia3'=> 'CRE'
		]);

		Provincia::create([
			'provincia'=>'Lugo', 
			'provinciaseo' =>'lugo', 
			'provincia3'=>'LUG'
		]);

		Provincia::create([
			'provincia'=>'Sevilla', 
			'provinciaseo' =>'sevilla', 
			'provincia3'=>'SVL'
		]);

		Provincia::create([
			'provincia'=>'Almería', 
			'provinciaseo' =>'almeria', 
			'provincia3'=>'ALM'
		]);
		          
  		Provincia::create([
			'provincia'=>'Córdoba', 
			'provinciaseo' =>'cordoba', 
			'provincia3'=>'CBA'
		]);

		Provincia::create([
			'provincia'=>'Madrid', 
			'provinciaseo' =>'madrid', 
			'provincia3'=>'MAD'
		]);

		Provincia::create([
			'provincia'=>'Soria', 
			'provinciaseo' =>'soria', 
			'provincia3'=>'SOR'
		]);

		Provincia::create([
			'provincia'=>'Asturias', 
			'provinciaseo' =>'asturias', 
			'provincia3'=>'AST'
		]);

		Provincia::create([
			'provincia'=>'A Coruña', 
			'provinciaseo' =>'coruna', 
			'provincia3'=>'LCO'
		]);

		Provincia::create([
			'provincia'=>'Málaga', 
			'provinciaseo' =>'malaga', 
			'provincia3'=>'MAL'
		]);

		Provincia::create([
			'provincia'=>'Tarragona', 
			'provinciaseo' =>'tarragona', 
			'provincia3'=>'TRN'
		]);

		Provincia::create([
			'provincia'=>'Ávila', 
			'provinciaseo' =>'avila', 
			'provincia3'=>'AVL'
		]);


		Provincia::create([
			'provincia'=>'Cuenca', 
			'provinciaseo' =>'cuenca', 
			'provincia3'=>'CNC'
		]);

		Provincia::create([
			'provincia'=>'Melilla', 
			'provinciaseo' =>'melilla', 
			'provincia3'=>'MEL'
		]);

		Provincia::create([
			'provincia'=>'S.C. Tenerife', 
			'provinciaseo' =>'tenerife', 
			'provincia3'=>'SCT'
		]);

		Provincia::create([
			'provincia'=>'Badajoz', 
			'provinciaseo' =>'badajoz', 
			'provincia3'=>'BDJ'
		]);

		Provincia::create([
			'provincia'=> 'Girona',
			'provinciaseo' => ' girona',
			'provincia3'=>'GIR'
		]);

		Provincia::create([
			'provincia'=>'Murcia',
			'provinciaseo' =>'murcia',
			'provincia3'=>'MUR'
		]);


		Provincia::create([
			'provincia'=> 'Teruel',
			'provinciaseo' => 'teruel',
			'provincia3'=> 'TER'
		]);

		Provincia::create([
			'provincia'=> 'Baleares',
			'provinciaseo' => 'baleares',
			'provincia3'=> 'BAL'
		]);

		Provincia::create([
			'provincia'=> 'Granada',
			'provinciaseo' =>'granada',
			'provincia3'=> 'GND'
		]);

		Provincia::create([
			'provincia'=> 'Navarra',
			'provinciaseo' =>'navarra',
			'provincia3'=>'NVR'
		]);

		Provincia::create([
			'provincia'=>'Toledo', 
			'provinciaseo' =>'toledo', 
			'provincia3'=>'TOL'
		]);

		Provincia::create([
			'provincia'=>'Barcelona', 
			'provinciaseo' =>'barcelona', 
			'provincia3'=>'BCN'
		]);

		Provincia::create([
			'provincia'=>'Guadalajara', 
			'provinciaseo' =>'guadalajara', 
			'provincia3'=>'GLJ'
		]);

		Provincia::create([
			'provincia'=>'Ourense', 
			'provinciaseo' =>'ourense', 
			'provincia3'=>'OUR'
		]);

		Provincia::create([
			'provincia'=>'Valencia', 
			'provinciaseo' =>'valencia', 
			'provincia3'=>'VAL'
		]);

		Provincia::create([
			'provincia' => 'Burgos',
			'provinciaseo' => 'burgos',
			'provincia3' => 'BRG'
		]);

		Provincia::create([
			'provincia' => 'Guipúzcoa',
			'provinciaseo' => 'guipuzcoa',
			'provincia3' => 'GPZ'
		]);

		Provincia::create([
			'provincia'=>'Palencia', 
			'provinciaseo' =>'palencia',
			'provincia3'=> 'PAL'
		]);

		Provincia::create([
			'provincia'=>'Valladolid', 
			'provinciaseo' =>'valladolid', 
			'provincia3'=>'VLL'
		]);

		Provincia::create([
			'provincia'=>'Cáceres', 
			'provinciaseo' =>'caceres', 
			'provincia3'=>'CAC'
		]);

		Provincia::create([
			'provincia'=>'Huelva', 
			'provinciaseo' =>'huelva',
			'provincia3'=> 'HLV'
		]);

		Provincia::create([
			'provincia'=> 'Las Palmas', 
			'provinciaseo' =>'palmas', 
			'provincia3'=>'LPA'
		]);

		Provincia::create([
			'provincia'=>'Vizcaya', 
			'provinciaseo' =>'vizcaya', 
			'provincia3'=>'VZC'
		]);

		Provincia::create([
			'provincia'=> 'Cádiz',
			'provinciaseo' => 'cadiz',
			'provincia3'=> 'CDZ'
		]);
		
		Provincia::create([
			'provincia'=> 'Huesca',
			'provinciaseo' => 'huesca',
			'provincia3'=>'HSC'
		]);

		Provincia::create([
			'provincia'=> 'Pontevedra',
			'provinciaseo' => 'pontevedra',
			'provincia3'=> 'PNV'
		]);

		Provincia::create([
			'provincia'=> 'Zamora',
			'provinciaseo' => 'zamora',
			'provincia3'=> 'ZAM'
		]);

		Provincia::create([
			'provincia'=> 'Cantabria',
			'provinciaseo' => 'cantabria',
			'provincia3'=> 'CTB'
		]);

		Provincia::create([
			'provincia'=> 'Jaén',
			'provinciaseo' => 'jaen',
			'provincia3'=>'JAE'
		]);

		Provincia::create([
			'provincia'=> 'La Rioja',
			'provinciaseo' => 'rioja',
			'provincia3'=> 'LRJ'
		]);

		Provincia::create([
			'provincia'=> 'Zaragoza',
			'provinciaseo' => 'zaragoza',
			'provincia3'=> 'ZAR'
		]);

		*/
		
		

		

		
		

		

		


		
       
    }
}
