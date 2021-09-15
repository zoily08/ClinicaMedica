<?php

namespace ClinicaMedica\Http\Controllers\Auth;

use ClinicaMedica\User;
use ClinicaMedica\Http\Controllers\Controller;
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


        'name' => ['required', 'string', 'max:255'],
        'apellidos' => ['required', 'string', 'max:255'], 
        'direccion' => ['string', 'max:255'],
        'fechanacimiento'=> ['string', 'max:100'],
        'edad'=> ['string', 'max:100'],
        'telefono' => ['string', 'max:255'],
        //'email' => ['required', 'string', 'email', 'max:255', 
        // 'unique:users',
         'password' => ['string', 'min:6', 'confirmed'],
        
         'estado' => ['string', 'max:255'],


        ]);



    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \ClinicaMedicaas\User


     */

    


    /*protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'apellido' => $data['apellido'], 
            'direccion'=> $data['direccion'],
            'fechanacimiento'=> $data['fechanacimiento'],
            'edad'=>$data['edad'],
            'telefono'=> $data['telefono'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            
            
        ]);
    }
}*/


protected function create(array $data)
    {
        $user= User::create([
            'name' => $data['name'],
            'apellido' => $data['apellido'], 
            'direccion'=> $data['direccion'],
            'fechanacimiento'=> $data['fechanacimiento'],
            'edad'=>$data['edad'],
            'telefono'=> $data['telefono'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            
            
        ]);

        return $user;
    }

    public function redirectTo()
{
    if (session()->has('redirect_to'))
        return session()->pull('redirect_to');

    return $this->redirectTo;
}
}
