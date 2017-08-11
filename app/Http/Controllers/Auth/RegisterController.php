<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


use \Illuminate\Auth\Events\Registered;
use \Illuminate\Http\Request;
use App\Mail\EmailVerification;

class RegisterController extends Controller
{


        protected $email_token;

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {




        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',


        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

                $link = uniqid();
        
        $this->email_token = $link;

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),

            'email_token' => $link,//code of verification

        ]);
    }


    /**
    * @param request
    * overiden parent register method sending email
    * @return verified user view
    */
    public function register(Request $request)
    {

        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));


        \Mail::to($user->email)->send(new EmailVerification($user, $this->email_token));

        return view('verifications.verification');

 

    }

      /**
      *
      * The function to verify registered users
      *
      */
        public function verify($token)
        {
            $user = User::where('email_token', '=', $token)->first();
            if ($user != null):
            $user->verified = 1;
            $user->save();
            endif;
           if ($user) return view('verifications.emailconfirm',['user'=>$user]);
            
            return redirect()->home();
        }
}
