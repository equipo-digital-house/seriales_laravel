<?php

namespace App\Http\Controllers\Auth;

use App\User;
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

    /**ome
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/perfil';

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
        
        $reglas = [
          'name' => ['required', 'regex:/^[A-Za-z]{4,}\d*$/', 'max:255', 'unique:users'],
          'email' => 'required | email | max:255 | unique:users',
          'password' => 'required | string | min:6 | confirmed'
        ];

        $mensajes = [
          'string' => 'El campo :attribute debe ser un texto',
          'regex' => 'El nombre debe contener cuatro letras como mínimo',
          'max' => 'El campo :attribute debe contener un máximo de :max caracteres',
          'email'=> 'Debes ingresar un :attribute válido',
          'unique' => 'El campo :attribute ya fue elegido por otrx usuarix',
          'min' => 'El campo :attribute debe contener un mínimo de :min caracteres',
          'required' => 'El campo :attribute es requerido',
          'confirmed' => 'Las contraseñas no coinciden'
        ];

        return Validator::make($data, $reglas, $mensajes);

      }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar' => 'misterX.jpg',
            'role' => 0,
            'level' => 0,
            'score' => 0
        ]);

    }
}
