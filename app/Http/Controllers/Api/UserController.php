<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Http\Resources\UserResource;
//use Illuminate\Foundation\Auth\User;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function me(Request $request)
    {
//        return new UserResource($request->user()->load('orders.products'));
        return response(new UserResource($request->user()));
    }





        public function orders(Request $request)
    {

        //        return response(OrderResource::collection($request->user()->orders));

        $orders = $request->user()->orders()->latest();

        if ($request->page || $request->per_page) {
            $per_page = $request->per_page ?? 10;
            $orders = $orders->paginate($per_page);

            return OrderResource::collection($orders)->appends([
                'per_page' => $per_page
            ]);
        } else {
            $orders = $orders->get();
        }

        return OrderResource::collection($orders);
    }


    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:8',
            'address' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response([
                'error' => $validator->errors(),
                'message' => 'Validation error',
                'success' => false
            ], 400);
        }

        User::find($request->user()->id)->update($request->post());

        return response([
            'message' => 'Üstünlikli Täzelendi',
            'success' => true
        ], 200);
    }


    public function changePassword(Request $request)
    {
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response([
                'error' => $validator->errors(),
                'message' => 'Validation error',
                'success' => false
            ], 400);
        }

        if (!Hash::check($request->current_password, $user->password)) {
            return response([
                'message' => 'Password not match',
                'success' => false
            ], 400);
        }

        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return response([
            'message' => 'Your password has been successfully changed',
            'success' => true
        ], 200);
    }

}
