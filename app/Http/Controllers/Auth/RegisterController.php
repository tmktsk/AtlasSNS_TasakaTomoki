<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{   
    
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
    // protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request){

        $input = $request->only(['username', 'mail', 'password']);

        if($request->isMethod('post')){

            $request->validate([
                "username" => "required|min:2|max:12",
                "mail" => "required|min:5|max:40|email|unique:users,mail",
                "password" => "required|alpha_num|min:8|max:20",
                "passwordConfirm" => "required|alpha_num|min:8|max:20|same:password",
            ]);

            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');

            User::create([
                'username' => $username,
                'mail' => $mail,
                'password' => bcrypt($password),
            ]);

            return redirect('added')->with('username',$username);
        }

        $request->session()->put("form_input", $input);
        return view('auth.register');
    }

    

    public function added(){
        return view('auth.added');
    }
}
