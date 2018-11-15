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
		

			/*----- GIMNASIO ----*/
    	
        //Padres de Raiz	
		$m1 = factory(Menu::class)->create([
			'etiqueta' => 'Home',
			'pagina' => 'home',
			'padre' => 0,
			'orden' => 0,
			'rol' => 2,
		]);
		
		$m2 = factory(Menu::class)->create([
			'etiqueta' => 'Actividades',
			'pagina' => 'actividades',
			'padre' => 0,
			'orden' => 1,
			'rol' => 2,
		]);

		$m3 = factory(Menu::class)->create([
			'etiqueta' => 'Instructores',
			'pagina' => 'instructores',
			'padre' => 0,
			'orden' => 2,
			'rol' => 2,
		]);
		
		
			
		$m4 = factory(Menu::class)->create([
			'etiqueta' => 'Clientes',
			'pagina' => 'clientes',
			'padre' => 0,
			'orden' => 3,
			'rol' => 2,
		]);


		$m5 = factory(Menu::class)->create([
			'etiqueta' => 'Horarios',
			'pagina' => 'horarios',
			'padre' => 0,
			'orden' => 4,
			'rol' => 2,
		]);
		
		$m6 = factory(Menu::class)->create([
			'etiqueta' => 'Mis Archivos',
			'pagina' => 'archivos',
			'padre' => 0,
			'orden' => 5,
			'rol' => 2,
		]);

		$m7 = factory(Menu::class)->create([
			'etiqueta' => 'Cuotas',
			'pagina' => 'cuotas',
			'padre' => 0,
			'orden' => 6,
			'rol' => 2,
		]);
		factory(Menu::class)->create([
			'etiqueta' => 'Mis Imagenes',
			'pagina' => 'imagenes',
			'padre' => $m6->id,
			'orden' => 0,
			'rol' => 2,
		]);
		factory(Menu::class)->create([
			'etiqueta' => 'Mis Promociones',
			'pagina' => 'promociones',
			'padre' => $m6->id,
			'orden' => 1,
			'rol' => 2,
		]);

		
    }
}
