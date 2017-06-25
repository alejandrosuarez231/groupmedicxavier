<?php

namespace Cpanel\Http\Controllers\Auth;

use Cpanel\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Cpanel\Http\Requests;
use Cpanel\Http\Requests\AuthenticateRequest;

use Auth;
use Session;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function ingreso()
    {
        return view('login');
    }

    public function login(AuthenticateRequest $request)
    {
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->route('index');
        }
        return back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
