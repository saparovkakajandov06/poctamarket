<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{


    public function register(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'login' => 'required|string|max:255',
            'birthday' => 'required|date',
            'phone' => 'required|string|size:8|unique:users',
            'address' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response([
                'error' => $validator->errors(),
                'message' => 'Maglumatlar gabat gelýär',
            ], 400);
        }

        $encryptedPass = Hash::make($request->password);

        $user = new User;

        try{
            $user->login = $request->login;
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->middlename = $request->middlename;
            $user->birthday = $request->birthday;
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->password = $encryptedPass;
            $user->save();


            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ], 201);

        }
        catch (\Exception $e){
            return response()->json([
               'success' => false,
               'message' => $e
            ]);
        }
    }



}
