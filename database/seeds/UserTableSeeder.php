<?php

use Illuminate\Database\Seeder;

use App\Role;
use App\User;



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
        $role_comprador = Role::where('name', 'comprador')->first();
        $role_vendedor  = Role::where('name', 'vendedor')->first();



		$user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('secret');
        $user->rol=1;
        $user->save();

        $user->roles()->attach($role_admin);



        $user = new User();
        $user->name = 'Comprador';
        $user->email = 'user@example.com';
        $user->password = bcrypt('secret');
        $user->rol=2;
        $user->save();
        
        $user->roles()->attach($role_comprador);
        

        

        $user = new User();
        $user->name = 'Vendedor';
        $user->email = 'vendedor@gmail.com';
        $user->password = bcrypt('secret');
        $user->rol=3;
        $user->save();
        
        $user->roles()->attach($role_vendedor);
    }
}
