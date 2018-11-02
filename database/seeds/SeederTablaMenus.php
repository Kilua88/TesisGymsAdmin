<?php

use Illuminate\Database\Seeder;
use App\Menu;

class SeederTablaMenus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	/*----- ADMINISTRADOR ----*/

        //Padres de Raiz	
		$m1 = factory(Menu::class)->create([
			'etiqueta' => 'Home',
			'pagina' => 'home',
			'padre' => 0,
			'orden' => 0,
			'rol' => 1,
		]);
		
		$m2 = factory(Menu::class)->create([
			'etiqueta' => 'Gimnasios',
			'pagina' => 'gimnasios',
			'padre' => 0,
			'orden' => 1,
			'rol' => 1,
		]);
		

			/*----- COMPRADOR ----*/
    	
        //Padres de Raiz	
		$m1 = factory(Menu::class)->create([
			'etiqueta' => 'Home',
			'pagina' => 'home',
			'padre' => 0,
			'orden' => 0,
			'rol' => 2,
		]);
		
		$m2 = factory(Menu::class)->create([
			'etiqueta' => 'Instructores',
			'pagina' => 'instructores',
			'padre' => 0,
			'orden' => 1,
			'rol' => 2,
		]);
		
		
			
		$m3 = factory(Menu::class)->create([
			'etiqueta' => 'Clientes',
			'pagina' => 'clientes',
			'padre' => 0,
			'orden' => 2,
			'rol' => 2,
		]);


		$m4 = factory(Menu::class)->create([
			'etiqueta' => 'Horarios',
			'pagina' => 'horarios',
			'padre' => 0,
			'orden' => 3,
			'rol' => 2,
		]);
		
		$m4 = factory(Menu::class)->create([
			'etiqueta' => 'Promociones',
			'pagina' => 'promociones',
			'padre' => 0,
			'orden' => 3,
			'rol' => 2,
		]);
    }
}
