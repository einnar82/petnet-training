<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    /**
     * Override login behavior
     */
    public function login(Request $request)
    {
        if ($token = auth('api')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json(['token' => $token]);
        }
        return response()->json(['message' => 'invalid credentials!'], 422);
    }

    /**
     * Override logout behavior
     */
    public function logout(Request $request)
    {
        auth('api')->logout();
        return response()->json(['message' => 'successfully logout!']);
    }
}
