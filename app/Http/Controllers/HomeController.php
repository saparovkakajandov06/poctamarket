<?php

namespace App\Http\Controllers;

use App\Skidka;
use Illuminate\Http\Request;

class HomeController extends SiteController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->categories = \App\Category::whereNull('category_id')
            ->with('childrenCategories')
            ->get();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $skidkas = Skidka::orderBy('created_at','desc')->take(1)->get();
        return view('home')->with([
            'categories'=>$this->categories,
            'skidkas' => $skidkas,
        ]);
    }

    public function history() {
        return view('site.history')->with([
            'categories'=>$this->categories,
            'orders'=>\Auth::user()->orders()->orderBy('created_at','desc')->get(),
        ]);
    }

    public function historyDetailed($id) {
        return view('site.history_detailed')->with([
            'categories'=>$this->categories,
            'productsInOrder'=>json_decode(\Auth::user()->orders()->find($id)->products),
            'order'=>\Auth::user()->orders()->find($id)
        ]);
    }

    public function profile(Request $request) {
        if($request->isMethod('post')) {
            try {
                $validator = \Validator::make($request->all(),[
                    'name' => 'required',
                    'surname' => 'required',
                    'street' => 'required',
                    'house' => 'required',
                    'email' => 'required',
                ]);
                if($validator->fails()) {
                    return redirect()->route('getprofileinfo')->withErrors($validator);
                }
                $currentUser = \Auth::user();
                $input = array();

                $input['name'] = $request->input('name');
                $input['surname'] = $request->input('surname');
                $input['email'] = $request->input('email');

                $addressArr = array();
                $addressArr['street'] = $request->input('street');
                $addressArr['house'] = $request->input('house');
                if($request->input('apartment')) $addressArr['apartment'] = $request->input('apartment');
                if($request->input('korpus')) $addressArr['korpus'] = $request->input('korpus');

                $input['address'] = json_encode((object) $addressArr);

                $currentUser->fill($input);
                $currentUser->update();

                return redirect()->route('getprofileinfo')->with('status','Üýtgeşmeler girizildi');
            } 
            catch(Exception $e) {
                return redirect()->back()->with('error','Ошибка ' . $e->getMessage());
            }
        }
        return view('site.profile')->with([
            'categories'=>$this->categories,
        ]);
    }
}
