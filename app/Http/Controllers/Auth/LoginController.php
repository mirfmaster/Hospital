<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }

    public function login(Request $request)
    {
        // Validate the form adata
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:6'
        ]);
        //Attempt to log the user in
        if (Auth::guard('web')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
            //if sucessful, the redirect to their
            return redirect()->intended('/');
        }
        //if unseccessful
        return redirect()->back()->withInput($request->only('username','password', 'remember'));
    }

    public function showLoginForm()
    {
        return view('user.login');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
