<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class UsersController extends SiteController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            if(auth()->user()->role == 'admin'){
                $users = User::whereNull('work')->get();
                $page_title = 'Пользователи';
                return view('admin.users', compact('users', 'page_title'));
            }
        }catch(Exception $e){
            info($e);
            abort('404');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try{
            if(auth()->user()->role == 'admin'){
                $page_title = 'Пользователи';
                return view('admin.add_user', compact('page_title'));
            }
        }catch(Exception $e){
            info($e);
            abort('404');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            if(auth()->user()->role == 'admin'){
                $inputs = $request->all();
                
                    $rule=array(
                        'login'         => 'required|max:50|unique:users',
                        'password'      => 'required|string|min:6|confirmed',
                        'name'          => 'required|string|max:100',
                        'surname'       => 'required|string|max:100',
                        'email'         => 'required',   
                        'phone'         => 'required',   
                        'role'          => 'required|max:10',
                    );
                
                $validator = \Validator::make($inputs, $rule);
                if ($validator->fails()){
                    return redirect()->back()->withErrors($validator->messages());
                }

                
                $new_user = new User;

                $new_user->login            = $inputs['login'];
                $new_user->name             = $inputs['name'];
                $new_user->surname          = $inputs['surname'];
                $new_user->email            = $inputs['email'];
                $new_user->phone            = $inputs['phone'];
                $new_user->role             = $inputs['role'];
                $new_user->password         = Hash::make($inputs['password']);

                $new_user->save();
                
                return redirect()->route('users.index');

            }   
        }catch(Exception $e){
            info($e);
            abort('404');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        try{
            if(auth()->user()->role == 'admin'){
                $user = User::where('id', $id)->first();
                $page_title = 'Пользователи';
            }
            return view('admin.edit_user', compact('user', 'page_title'));

        }catch(Exception $e){
            info($e);
            abort('404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            if(auth()->user()->role == 'admin'){
                $inputs = $request->all();

                $testUser = User::where('id', $id)->select('login')->first();
                if($inputs['login'] == $testUser->login){
                    $rule=array(
                        'name'          => 'required|string|max:255',
                        'password'      => 'nullable|string|min:6|confirmed',
                        'login'         => 'max:50',
                        'email'         => 'nullable|string|email|max:255',
                        'phone'   => 'required|max:20',
                    );
                }else{
                    $rule=array(
                        'name'          => 'required|string|max:255',
                        'password'      => 'nullable|string|min:6|confirmed',
                        'login'         => 'max:50|unique:users',
                        'email'         => 'nullable|string|email|max:255|unique:users',
                        'phone'         => 'required|max:20',
                    );
                }                

                $validator = \Validator::make($inputs, $rule);
                if ($validator->fails()){
                    return redirect()->back()->withErrors($validator->messages());
                }
                $new_user = User::where('id', $id)->first();
                $new_user->login            = $inputs['login'];
                $new_user->name             = $inputs['name'];
                $new_user->surname          = $inputs['surname'];
                $new_user->email            = $inputs['email'];
                $new_user->phone            = $inputs['phone'];
                $new_user->role             = $inputs['role'];
                if($inputs['password']){
                    $new_user->password     = Hash::make($inputs['password']);
                }

                $new_user->save();

                return redirect()->route('users.index');

            }   
        }catch(Exception $e){
            info($e);
            abort('404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try{
            if(auth()->user()->role == 'admin'){
                $user = User::where('id', $id)->first();
                $user->password = Hash::make(random_int(1000000, 9999999));
                $user->work = 0;
                $user->save();


                return redirect()->back();
            }
        }catch(Exception $e){
            info($e);
            abort('404');
        }
    }
}
