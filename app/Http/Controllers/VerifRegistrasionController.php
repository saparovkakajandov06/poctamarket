<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\LoginVerification;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;


class VerifRegistrasionController extends Controller
{
    public function sendSMS(Request $request){
        $inputs = $request->all();
        $rule=array(
            'name'   => 'required|string|max:200',
            'surname'      => 'required|string|max:200',
            'email'      => 'required|string|max:200',
            'phone'             => 'required|string|max:13|min:8|unique:users',
            'password'		=> 'required|string|min:6|confirmed',
        );

        $validator = \Validator::make($inputs, $rule);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->messages())->withInput();
        }
        $code = random_int(100000, 999999);

        $payload = ['username' => 'inetmarket', 'password' => 'InternetMarket-2020'];
        $response = Http::withHeaders([
            'Content-Type' => 'application/json'

        ])->post('http://217.174.227.29/auth/jwt/create', [
            'username' => 'inetmarket',
            'password' => 'InternetMarket-2020',
        ])->throw()->json();

        $accessToken = $response['access'];

        $client = new Client([
            'headers' => [ 'Authorization' => 'JWT '.$accessToken ]
        ]);

        $response = $client->post('http://217.174.227.29/api/send-message/',
            ['form_params' =>
                [
                    'phone' => '993'.$request->get('phone'), 'message' => $code
                ]
            ]
        );

        $loginverif             = new LoginVerification;
        $loginverif->name       = $request->get('name');
        $loginverif->surname    = $request->get('surname');
        $loginverif->middlename    = $request->get('middlename');
        $loginverif->login    = $request->get('login');
        $loginverif->password   = Hash::make($request->get('password'));
        $loginverif->email      = $request->get('email');
        $loginverif->phone      = $request->get('phone');
        $loginverif->birthday   = $request->get('birthday');
        $loginverif->address   = $request->get('address');
        $loginverif->code       = $code;
        $loginverif->save();

        return redirect()->route('verifi-cheack', ['id' => $loginverif->id]);



    }

    public function cheackCode($id){
        return view('auth.verify')->with('id', $id);
    }

    public function sendCode(Request $request){
        $loginVerify = LoginVerification::where('id', $request->get('id'))->first();

        if($loginVerify->code == $request->get('code')){
            $user = new User;

            $user->name     = $loginVerify->name;
            $user->surname  = $loginVerify->surname;
            $user->middlename  = $loginVerify->middlename;
            $user->login    = $loginVerify->login;
            $user->email    = $loginVerify->email;
            $user->password = $loginVerify->password;
            $user->phone    = $loginVerify->phone;
            $user->birthday = $loginVerify->birthday;
            $user->address = $loginVerify->address;
            $user->save();
            $loginVerify->delete();
            auth()->login($user, true);
            return redirect()->route('home');
        }else{
            return redirect()->back();
        }
    }
}





/*
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\LoginVerification;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;


class VerifRegistrasionController extends Controller
{
    public function sendSMS(Request $request){
    	$inputs = $request->all();
            $rule=array(
                'name'   => 'required|string|max:200',
                'surname'      => 'required|string|max:200',
                'email'      => 'required|string|max:200',
                'phone'             => 'required|string|max:13|min:8|unique:users',
                'password'		=> 'required|string|min:6|confirmed',
            );

        $validator = \Validator::make($inputs, $rule);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->messages())->withInput();
        }
        $code = random_int(100000, 999999);

        $payload = ['username' => 'inetmarket', 'password' => 'InternetMarket-2020'];
        // $response = Http::withHeaders([
        //     'Content-Type' => 'application/json'

        // ])->post('http://localhost:8000/auth/jwt/create', [
        //                                         'username' => 'inetmarket',
        //                                         'password' => 'InternetMarket-2020',
        //                                     ])->throw()->json();

        // $accessToken = $response['access'];

        // $client = new Client([
        //     'headers' => [ 'Authorization' => 'JWT '.$accessToken ]
        // ]);

        // $response = $client->post('http://localhost:8000/api/send-message/',
        //     ['form_params' =>
        //         [
        //             'phone' => '993'.$request->get('phone'), 'message' => $code
        //         ]
        //     ]
        // );

        $loginverif             = new LoginVerification;
        $loginverif->name       = $request->get('name');
        $loginverif->surname    = $request->get('surname');
        $loginverif->password   = Hash::make($request->get('password'));
        $loginverif->email      = $request->get('email');
        $loginverif->phone      = $request->get('phone');
        $loginverif->birthday   = $request->get('birthday');
        $loginverif->code       = $code;
        $loginverif->save();

        return redirect()->route('verifi-cheack', ['id' => $loginverif->id]);



    }

    public function cheackCode($id){
        return view('auth.verify')->with('id', $id);
    }

    public function sendCode(Request $request){
        $loginVerify = LoginVerification::where('id', $request->get('id'))->first();

        if($loginVerify->code == $request->get('code')){
            $user = new User;

            $user->name     = $loginVerify->name;
            $user->surname  = $loginVerify->surname;
            $user->login    = $loginVerify->phone;
            $user->email    = $loginVerify->email;
            $user->password = $loginVerify->password;
            $user->phone    = $loginVerify->phone;
            $user->birthday = $loginVerify->birthday;
            $user->save();
            $loginVerify->delete();
            auth()->login($user, true);
            return redirect()->route('home');
        }else{
            return redirect()->back();
        }
    }
}*/
