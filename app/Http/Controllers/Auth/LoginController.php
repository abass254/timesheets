<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
//use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
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
    //use ValidateRequests;

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

    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        //return $request->all();

        $credentials = $request->only('email', 'password');
        //return $credentials;
        if (Auth::attempt($credentials)) {
            //return 'Good to go';

            return response()->json([
                'code' => '200',
                'message' => 'success'
            ]);
            // return redirect()->intended('home')
            //     ->withSuccess('You have Successfully loggedin');
        }

        return response()->json([
            'code' => '401',
            'message' => 'Oppes! You have entered invalid credentials'
        ]);



    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}