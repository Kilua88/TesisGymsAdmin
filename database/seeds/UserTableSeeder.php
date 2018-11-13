<?php

use Illuminate\Database\Seeder;

use App\Role;
use App\User;
use App\Gimnasio;



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
    }
}
