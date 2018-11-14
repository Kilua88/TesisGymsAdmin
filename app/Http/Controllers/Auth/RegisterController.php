<?php

namespace App\Http\Controllers\Auth;

use App\Role;
use App\User;
use App\Gimnasio;
use App\Cliente;
use App\Persona;
use App\Instructore;
use App\Actividade;
use App\Image_Sliders;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    
        $user
            ->roles()
            ->attach(Role::where('name', 'gimnasio')->first());

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



            $actividad = new Actividade; 
            $actividad->users_id =$user->id;;
            $actividad->act_nombre = 'Full';
            $actividad->act_moneda = 'Pesos $';
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
        return $user;
    }
}
