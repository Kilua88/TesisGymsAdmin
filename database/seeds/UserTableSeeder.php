<?php

use Illuminate\Database\Seeder;

use App\Role;
use App\User;
use App\Gimnasio;
use App\Cliente;
use App\Persona;
use App\Instructore;
use App\Actividade;
use App\Image_Sliders;
use App\Moneda;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin     = Role::where('name', 'admin')->first();
        $role_gimnasio = Role::where('name', 'gimnasio')->first();
      



		$user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('secret');
        $user->rol=1;
        $user->save();

        $user->roles()->attach($role_admin);




        $user = new User();
        $user->name = 'Gimnasio';
        $user->email = 'user@example.com';
        $user->password = bcrypt('secret');
        $user->rol=2;
        $user->save();
        
        $user->roles()->attach($role_gimnasio);
        
        $gym= new Gimnasio();
        
        $gym->gym_nombre = 'Gimnasio';
        $gym->gym_direccion = 'calle falsa 123';
        $gym->gym_telefono = '123456789';
        $gym->gym_url = 'gimnasio';
        $gym->users_id = $user->id;
        $gym->save();



        $persona = new Persona;
        $persona->pers_dni = '677547'; 
        $persona->pers_nombre = 'Juan'; 
        $persona->pers_apellido = 'Perez';
        $persona->pers_direccion = 'Caseros 123';
        $persona->pers_telefono = '34552123';
        $persona->pers_email = 'juan@perez.com';
        $persona->save();
    $instructor = new Instructore;
            $instructor->pers_id = $persona->id;     
            $instructor->users_id = $user->id;;
            $instructor->save();



            $persona = new Persona;
            $persona->pers_dni = '4221324'; 
            $persona->pers_nombre = 'Maria'; 
            $persona->pers_apellido = 'Lopez';
            $persona->pers_direccion = 'Alvarado 402';
            $persona->pers_telefono = '324422';
            $persona->pers_email = 'lopez@maria.com';
            $persona->save();
    $cliente = new Cliente;
            $cliente->pers_id = $persona->id;     
            $cliente->users_id = $user->id;
            $cliente->cli_contact_nombre = 'Jhon';
            $cliente->cli_contact_apellido = 'Doe';
            $cliente->cli_contact_telefono = '1234';
            $cliente->save();

            
            $moneda= Moneda::find(1);
            
            $actividad = new Actividade; 
            $actividad->users_id =$user->id;;
            $actividad->act_nombre = 'Full';
            $actividad->monedas_id = $moneda->id;
            $actividad->act_cuota = '690';
            $actividad->save();


            $imagen = new Image_Sliders;
            $imagen->titulos = 'Muestra 1';
            $imagen->nombre_foto = 'Muestra 1';
            $imagen->descripcion = 'Imagen de Muestra';
            $imagen->url = 'app/default/1.jpg';
            $imagen->users_id = $user->id;
            $imagen->save();

            $imagen = new Image_Sliders;
            $imagen->titulos =  'Muestra 2';
            $imagen->nombre_foto =  'Muestra 2';
            $imagen->descripcion = 'Imagen de Muestra';
            $imagen->url =  'app/default/2.jpg';
            $imagen->users_id = $user->id;
            $imagen->save();
    }
}
