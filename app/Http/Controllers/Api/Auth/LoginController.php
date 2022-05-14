<?php

namespace App\Http\Controllers\Api\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        $attr = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $user = User::create([
            'name' => $attr['name'],
            'surname' => $attr['surname'],
            'password' => bcrypt($attr['password']),
            'email' => $attr['email']
        ]);

        return $this->success([
            'token' => $user->createToken('API Token')->plainTextToken
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string|min:6'
        ]);

        // if (!Auth::attempt($request->only('email', 'password'))) {
        //     return response()->json([
        //         'message' => 'Invalid login details'
        //     ], 401);
        // }

        $user = User::where('email', $request['email'])
            ->orWhere('phone', $request['email'])
            ->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ])->withCookie(cookie('Authorization', 'Bearer ' . $token));
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Tokens Revoked'
        ];
    }
}
