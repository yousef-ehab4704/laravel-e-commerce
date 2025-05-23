<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

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
    
    public function handleLogin(Request $request) {

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->withErrors([
                'email' => "The email provided is incorrect",
                'password' => "The password provided does not match"
            ]);
        }
    }
    public function handleLogout(){
        Auth::logout();
        return redirect()->route('login');
    }
}