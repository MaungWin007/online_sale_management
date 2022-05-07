<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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

    public function login(Request $request)
    {
        //  dd($request);
        $input=$request->all();
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $userdata=array('email'=>$input["email"],
        'password'=>$input["password"]);
        if(auth()->attempt($userdata))
        {
            // return authenticated user
            // auth()->user()->type
            $user=auth()->user();
            // dd($user->type);
            if($user->type=="admin")
            {
                return redirect()->route('admin.dashboard');
            }
            else{
                return redirect()->route('home');
            }
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
