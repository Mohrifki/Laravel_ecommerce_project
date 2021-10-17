<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

    // protected function credentials(Request $request)
    // {
    //     // dd($request,$this->username());
    //     $credentials = $request->only($this->username(), 'password');
    //     $credentials['status'] = 1;
    //     // dd($credentials);
    //     return $credentials;
    // }

    protected function attemptLogin(Request $request)
    {
        $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
        if(!User::where('email', $request->email)->exist()){
            Auth::logout();
            return redirect()->back()->with('error', 'your account is blocked');
        }
        if(Auth::user()->status == 0){
            Auth::logout();
            return redirect()->back()->with('error', 'your account is blocked');
        }
        return '/admin';
    }
}
