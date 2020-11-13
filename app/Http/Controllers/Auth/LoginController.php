<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $title = 'Login';
        return view('auth.login', compact('title'));
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $rules = [
//            Email
            'email' => [
                'required',
                'max:150',
                'email',
            ],
//            Password
            'password' => [
                'required',
                'min:6',
            ],
        ];

        $validator = Validator::make($credentials ,$rules);

        if ($validator->fails()) {
            return redirect()->route('login')
                ->withErrors($validator)
                ->withInput();
        }

        if (!Auth::attempt($credentials)) {
            return redirect()->route('login')
                ->withErrors(['msg' => 'Login Fail!!'])
                ->withInput();
        }

        return redirect()->intended(route('admin.dashboard'));
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
