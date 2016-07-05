<?php

namespace App\Http\Controllers\Auth;

use Closure;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;
use Session;
use Illuminate\Support\Facades\Input;
use Hash;
use Illuminate\Http\Request;



class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest', ['except' => 'logout']);
        $this->middleware('guest', ['except' => ['getLogout', 'getRegister', 'getLogin']]);
    }
    // register page
    public function getRegister()
    {
        if (Auth::check()){
            return redirect('/home');
        } else{
            return view('auth.register');
        }
        
    }

    public function getLogin()
    {
        if (Auth::check()){
            return redirect('/home');
        } else{
            return view('auth.login');
        }
        
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('auth/login');
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
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    public function authenticated(Request $request, User $user){
        $user->swap();
 
        return redirect()->intended($this->redirectPath());
    }
    // public function authenticated(Request $request,User $user){
    //     $previous_session = $user->session_id;
    //     //echo $previous_session; die;
    //     echo "<pre>";
    //     print_r(Auth::getSession()->getId()); 
    //     if ($previous_session) {
    //         \Session::getHandler()->destroy($previous_session);
    //     }

    //     Auth::user()->session_id = Auth::getSession()->getId();
    //     Auth::user()->save();
    //     return redirect()->intended($this->redirectPath());
    // }
        //
    // public function authenticated($request, Closure $next){
    //     $loggedUser = \App\User::find(Auth::user()->id);
    //     $loggedUser->logged = 'yes';
    //     $loggedUser->save();
    //     return $next($request);
    // }
    // protected function postCreateuser()
    // {
    //     $data = Input::all();
    //     $user = new \App\User;
    //     $user->email = $data['email'];
    //     $user->name = $data['name'];
    //     $user->password = Hash::make($data['password']);
    //     $user->save();
    // }
}
