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
			'etiqueta' => 'Categorias',
			'pagina' => 'categorias',
			'padre' => 0,
			'orden' => 1,
			'rol' => 1,
		]);
		
		$m3 = factory(Menu::class)->create([
			'etiqueta' => 'Publicaciones',
			'pagina' => 'publicaciones',
			'padre' => 0,
			'orden' => 2,
			'rol' => 1,
		]);
			
		$m4 = factory(Menu::class)->create([
			'etiqueta' => 'Como Comprar',
			'pagina' => 'comocomprar',
			'padre' => 0,
			'orden' => 3,
			'rol' => 1,
		]);

		$m5 = factory(Menu::class)->create([
			'etiqueta' => 'Admin',
			'pagina' => 'admin',
			'padre' => 0,
			'orden' => 4,
			'rol' => 1,
		]);

		$m6 = factory(Menu::class)->create([
			'etiqueta' => 'Productos',
			'pagina' => 'productos',
			'padre' => 0,
			'orden' => 5,
			'rol' => 1,
		]);
	

		$m7 = factory(Menu::class)->create([
			'etiqueta' => 'Facturas',
			'pagina' => 'facturas',
			'padre' => 0,
			'orden' => 6,
			'rol' => 1,
		]);		

	//Hijos de Categorias

		factory(Menu::class)->create([
			'etiqueta' => 'Tecnologia',
			'pagina' => 'tecnologia',
			'padre' => $m2->id,
			'orden' => 0,
			'rol' => 1,
		]);
		
		factory(Menu::class)->create([
			'etiqueta' => 'Ropa',
			'pagina' => 'ropa',
			'padre' => $m2->id,
			'orden' => 1,
			'rol' => 1,
		]);

		factory(Menu::class)->create([
			'etiqueta' => 'Zapatillas',
			'pagina' => 'zapatillas',
			'padre' => $m2->id,
			'orden' => 2,
			'rol' => 1,

		]);
		
		factory(Menu::class)->create([
			'etiqueta' => 'Hogar',
			'pagina' => 'hogar',
			'padre' => $m2->id,
			'orden' => 3,
			'rol' => 1,
		]);

		factory(Menu::class)->create([
			'etiqueta' => 'Libros',
			'pagina' => 'libros',
			'padre' => $m2->id,
			'orden' => 4,
			'rol' => 1,
		]);

		factory(Menu::class)->create([
			'etiqueta' => 'Otros',
			'pagina' => 'otros',
			'padre' => $m2->id,
			'orden' => 5,
			'rol' => 1,
		]);

		//hijos de  La Clinica

		factory(Menu::class)->create([
			'etiqueta' => 'Usuarios',
			'pagina' => 'usuarios',
			'padre' => $m5->id,
			'orden' => 0,
			'rol' => 1,
		]);

		factory(Menu::class)->create([
			'etiqueta' => 'Roles',
			'pagina' => 'roles',
			'padre' => $m5->id,
			'orden' => 1,
			'rol' => 1,
		]);


		factory(Menu::class)->create([
			'etiqueta' => 'Menu',
			'pagina' => 'menu',
			'padre' => $m5->id,
			'orden' => 2,
			'rol' => 1,
		]);

		factory(Menu::class)->create([
			'etiqueta' => 'Menu Roles',
			'pagina' => 'menuroles',
			'padre' => $m5->id,
			'orden' => 3,
			'rol' => 1,
		]);

		
		factory(Menu::class)->create([
			'etiqueta' => 'Usuarios Roles',
			'pagina' => 'usuarioroles',
			'padre' => $m5->id,
			'orden' => 4,
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
			'etiqueta' => 'Categorias',
			'pagina' => 'categorias',
			'padre' => 0,
			'orden' => 1,
			'rol' => 2,
		]);
		
		
			
		$m4 = factory(Menu::class)->create([
			'etiqueta' => 'Como Comprar',
			'pagina' => 'comocomprar',
			'padre' => 0,
			'orden' => 3,
			'rol' => 2,
		]);

		

		
	

		$m7 = factory(Menu::class)->create([
			'etiqueta' => 'Facturas',
			'pagina' => 'facturas',
			'padre' => 0,
			'orden' => 6,
			'rol' => 2,
		]);		

		$m8 = factory(Menu::class)->create([
			'etiqueta' => 'Carrito',
			'pagina' => 'carrito',
			'padre' => 0,
			'orden' => 7,
			'rol' => 2,
		]);

	//Hijos de Categorias

		factory(Menu::class)->create([
			'etiqueta' => 'Tecnologia',
			'pagina' => 'tecnologia',
			'padre' => $m2->id,
			'orden' => 0,
			'rol' => 2,
		]);
		
		factory(Menu::class)->create([
			'etiqueta' => 'Ropa',
			'pagina' => 'ropa',
			'padre' => $m2->id,
			'orden' => 1,
			'rol' => 2,
		]);

		factory(Menu::class)->create([
			'etiqueta' => 'Zapatillas',
			'pagina' => 'zapatillas',
			'padre' => $m2->id,
			'orden' => 2,
			'rol' => 2,

		]);
		
		factory(Menu::class)->create([
			'etiqueta' => 'Hogar',
			'pagina' => 'hogar',
			'padre' => $m2->id,
			'orden' => 3,
			'rol' => 2,
		]);

		factory(Menu::class)->create([
			'etiqueta' => 'Libros',
			'pagina' => 'libros',
			'padre' => $m2->id,
			'orden' => 4,
			'rol' => 2,
		]);

		factory(Menu::class)->create([
			'etiqueta' => 'Otros',
			'pagina' => 'otros',
			'padre' => $m2->id,
			'orden' => 5,
			'rol' => 2,
		]);

		/*-----------------------------------------*/


		/*----- VENDEDOR ----*/

        //Padres de Raiz	
		$m1 = factory(Menu::class)->create([
			'etiqueta' => 'Home',
			'pagina' => 'home',
			'padre' => 0,
			'orden' => 0,
			'rol' => 3,
		]);
		
		$m2 = factory(Menu::class)->create([
			'etiqueta' => 'Categorias',
			'pagina' => 'categorias',
			'padre' => 0,
			'orden' => 1,
			'rol' => 3,
		]);
		
		$m3 = factory(Menu::class)->create([
			'etiqueta' => 'Publicaciones',
			'pagina' => 'publicaciones',
			'padre' => 0,
			'orden' => 2,
			'rol' => 3,
		]);
			
		$m4 = factory(Menu::class)->create([
			'etiqueta' => 'Como Comprar',
			'pagina' => 'comocomprar',
			'padre' => 0,
			'orden' => 3,
			'rol' => 3,
		]);

		

		$m6 = factory(Menu::class)->create([
			'etiqueta' => 'Productos',
			'pagina' => 'productos',
			'padre' => 0,
			'orden' => 5,
			'rol' => 3,
		]);
	

		$m7 = factory(Menu::class)->create([
			'etiqueta' => 'Facturas',
			'pagina' => 'facturas',
			'padre' => 0,
			'orden' => 6,
			'rol' => 3,
		]);		

	//Hijos de Categorias

		factory(Menu::class)->create([
			'etiqueta' => 'Tecnologia',
			'pagina' => 'tecnologia',
			'padre' => $m2->id,
			'orden' => 0,
			'rol' => 3,
		]);
		
		factory(Menu::class)->create([
			'etiqueta' => 'Ropa',
			'pagina' => 'ropa',
			'padre' => $m2->id,
			'orden' => 1,
			'rol' => 3,
		]);

		factory(Menu::class)->create([
			'etiqueta' => 'Zapatillas',
			'pagina' => 'zapatillas',
			'padre' => $m2->id,
			'orden' => 2,
			'rol' => 3,

		]);
		
		factory(Menu::class)->create([
			'etiqueta' => 'Hogar',
			'pagina' => 'hogar',
			'padre' => $m2->id,
			'orden' => 3,
			'rol' => 3,
		]);

		factory(Menu::class)->create([
			'etiqueta' => 'Libros',
			'pagina' => 'libros',
			'padre' => $m2->id,
			'orden' => 4,
			'rol' => 3,
		]);

		factory(Menu::class)->create([
			'etiqueta' => 'Otros',
			'pagina' => 'otros',
			'padre' => $m2->id,
			'orden' => 5,
			'rol' => 3,
		]);
    }
}
