<?php

namespace ClinicaMedica\Http\Controllers\Auth;

use ClinicaMedica\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    //use AuthenticatesAndRegistersUsers,ThrottlesLogins;
        //use Illuminate\Foundation\Auth\RegistersUsers;
        //use Illuminate\Foundation\Auth\AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }



    /*public function username()
    {
        
        $email=request()->input('email');
        $this->name=filter_var($email,FILTER_VALIDATE_EMAIL)?'email':'name';

        request()->merge([$this->name=>$email]);

        return property_exists($this,'name')? $this->name:'email';
    }*/



}
