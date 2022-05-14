<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DB;
use GuzzleHttp\Client;
use Carbon\Carbon;


class PasswordsController extends SiteController
{
    private function sendResetSms($login, $token){

        $payload = ['username' => 'application', 'password' => 'apipochta2020'];
        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
            
        ])->post('http://217.174.227.29/auth/jwt/create', [
                                                'username' => 'application',
                                                'password' => 'apipochta2020',
                                            ])->throw()->json();

        $accessToken = $response['access'];

        $client = new Client([
            'headers' => [ 'Authorization' => 'JWT '.$accessToken ]
        ]);

        $response = $client->post('http://217.174.227.29/api/send-message/',
            ['form_params' => 
                [
                    'phone' => '993'.$login, 'message' => $token
                ]
            ]
        );
    }

    public function orderResetPassword(){
        return view('auth.orderResetPassword');
    }

    public function validatePasswordRequest(Request $request){
        $inputs = $request->all();
        $user = \App\User::where('login', $request->login)->first();

        //Check if the user exists
        if(!$user){
            return redirect()->back()->withErrors(['login' => 'Bu ulanyjy ýok']);
        }
        
        //Create Password Reset Token
        DB::table('password_resets')->insert([
            'login' => $request->login,
            'token' => random_int(100000, 999999),
            'created_at' => Carbon::now()
        ]);

        //Get the token just created above
        $tokenData = DB::table('password_resets')->where('login', $request->login)->orderBy('created_at', 'desc')->first();

        $this->sendResetSms($request->login, $tokenData->token);

        return redirect()->route('account.reset_password');
    }

    public function resetPasswordView(){
        return view('auth.resetPassword');
    }

    public function resetPassword(Request $request){
        //Validate input
        $validator = \Validator::make($request->all(), [
            'login' => 'required|exists:users,login',
            'tokenReq' => 'required',
            'password'  => 'required',
            'confirm_password' => ['same:password']
        ]);

        //check if input is valid before moving on
        if ($validator->fails()) {
            return redirect()->back()->withErrors(['login' => 'Nädogry girizdiňiz']);
        }

        $token = $request->tokenReq;
        $password = $request->password;

        //validate the token
        $tokenData = DB::table('password_resets')->where('token', $token)->orderBy('created_at', 'desc')->first();

        if (!$tokenData) return redirect()->back()->withErrors(['login' => 'Girizilen maglumatlary barlaň']);

        $user = \App\User::where('login', $tokenData->login)->orderBy('created_at', 'desc')->first();

        //redirect the user back to the password reset request form if the token is invalid

        // Redirect the user back if the login is invalid
        if(!$user) return redirect()->back()->withErrors(['login' => 'Girizilen maglumatlary barlaň']);

        //Hash and update the new password
        $user->password = \Hash::make($password);
        $user->save();

        //Login the user immediatly they change password successfully
        Auth::login($user);

        //Delete the token
        DB::table('password_resets')->where('login', $user->login)->delete();

        return redirect()->route('home')->with('status', 'Üýtgeşmeler saklandy');

    }
}
