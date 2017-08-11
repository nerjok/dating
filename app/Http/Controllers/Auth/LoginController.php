<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        $this->middleware('guest')->except('logout');
    }


    
    /**
     *
     * login function overriden
     */
    
    public function login(Request $request)
    {
            $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string'
        ]);

       if (Auth::guard('web')->attempt(['email' => $request->input('email'), 'password' =>$request->input('password') , 'verified' => 1])) {
        //echo 'kazkas veikia';
                        return redirect()->home();;

        } else {

           // echo 'kazkas neveikia';
             
                    $errors = [$this->username() => trans('auth.failed')];
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
        }
    }
}
