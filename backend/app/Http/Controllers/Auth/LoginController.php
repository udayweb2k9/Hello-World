<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Redirect;

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

    public function showLoginForm()
    {
        return view('auth.login');   
    }

    public function doLogin(Request $request)
    {
       // $helpers=new helpers;
        $username = Input::get('username');
        //$username = Input::get('email');
        $password = Input::get('password');
    //  dd($username);
       // $remember = (Input::has('remember')) ? true : false;
        $remember=false;
        
        $auth = Auth::attempt(
                    [
                        'username'  => $username,
                        'password'  => $password,
                        //'type'  => 'Admin',                 
                        //'activated'  => '1'   
                    ], $remember
                );  
        //dd(Auth::check());
        //dd($password);
        if ($auth) {
            if(Auth::check())
            {
                if(Auth::user()->account_type=="1")
                {
                   return Redirect::to('/admin/dashboard');  
                }                
                else
                {
                   return Redirect::to('/customer/dashboard');
                    
                }               
            }           
        }
        else
        {
            return Redirect::back()
            ->withInput()
            ->withErrors('Incorrect Username or Password.');
        }
    }

    public function logout()
    {
        Auth::logout();     
            return Redirect::to('/admin/login')
            ->withInput()
            ->with('message', 'You have logout successfully.');
    }
}
