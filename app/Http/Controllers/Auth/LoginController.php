<?php

namespace App\Http\Controllers\Auth;

use App\Skidka;
use App\Warn_Skidka;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;

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

    public function username(){
        return 'login';
    }

    public function login(Request $request)
    {
       /* $categories = \App\Category::where('status', 1)->take(12)->get();
        $warns = Warn_Skidka::orderBy('created_at','desc')->take(1)->get();
        $skidkas = Skidka::orderBy('created_at','desc')->take(1)->get();*/


        $request->validate([
            'email' => 'required',
            'password' => 'required|string',
            // 'g-recaptcha-response' => 'required|captcha',
            // 'recaptcha' => 'required|captcha',
        ]);

        if (\Auth::attempt([
            'email' => $request->email,
            'password' => $request->password])
        ){
            return redirect('/home');
        } else {
            return redirect()->back()->with('answer', 'Изменения сохранены'); 
        }
    }
}
