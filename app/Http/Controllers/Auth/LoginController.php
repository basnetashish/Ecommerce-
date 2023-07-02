<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function login(Request $request){
        // dd($request);
               

                $input=$request->validate([
                    'email'=>'required|email',
                    'password'=>'required',
            
                ]);

                if(auth()->attempt(array('email'=>$input['email'] ,'password'=> $input['password'])))
               
                {
                    $user=Auth()->user()->roles;
                    switch($user ){
                        case 'admin':
                            return redirect()->route('admin');
                            break;

                         case 'user':
                            return redirect()->route('userhome');
                            break;
                         default:
                            Auth()->logout();
                            return redirect('/login');

                    }
                    
                }
                else{
                        return redirect()->route('login')->with('error',"Username and Password doesnot match. Please type it correctly!!!");
                }
                

    }
}
