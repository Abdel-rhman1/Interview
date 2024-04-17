<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\Admin\AdminLoginRequest;
use App\Http\Requests\Driver\DriverLoginRequest;
use Auth;
class LoginController extends Controller
{


    
   

    use AuthenticatesUsers;

   
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:driver')->except('logout');
    }


    public function showAdminLoginForm()
    {
        return view('auth.login', ['url' => 'admin']);
    }
    

    public function adminLogin(AdminLoginRequest $request)
    {

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('/admin');
        }else{
            $message = 'InValid Email Or Password';
            return redirect()->intended('login/admin');
        }
    }

    public function showDriverLoginForm(){
        return view('auth.login', ['url' => 'driver']);
    }

    public function writerLogin(DriverLoginRequest $request)
    {
        if (Auth::guard('driver')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/driver');
        }else{
            $message = 'InValid Email Or Password';
            return redirect()->intended('login/driver')->with('message' , $message);
        }
    }

}
