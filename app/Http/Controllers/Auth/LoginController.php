<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\user;

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
        $this->middleware('guest')->except('logout');
    }

    function index(){
        return view('auth.login');
    }
    function register(){
        return view('auth.register');
    }
    function login(Request $req){
        $user=user::where('email',$req->email)->first();
        if($user['password']==$req->password && $user['role']=='usr'){
            $req->session()->put('user',$user);
            return redirect('/');
        }
        elseif($user['password']==$req->password && $user['role']=='provider'){
            $req->session()->put('provider',$user);
            return redirect('/provider/index');
        }
        elseif($user['password']==$req->password && $user['role']=='admin'){
            $req->session()->put('admin',$user);
            return redirect('/services/list');
        }
        else{
            return "Credientail doesn't match";
        }
    }
    function registration(Request $req){
        $data=new user();
        $data->name=$req->name;
        $data->phone=$req->phone;
        $data->email=$req->email;
        $data->password=$req->password;
        $data->address=$req->address;
        $data->city=$req->city;
        $data->state=$req->state;
        $data->pin_code=$req->pin_code;
        $data->save();
        return redirect('/loginIndex');
    }
}
