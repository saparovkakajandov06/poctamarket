<?php

namespace App\Http\Controllers;

use App\Soobshit;
use Illuminate\Http\Request;

class SoobshitController extends Controller
{
    public function store(Request $request){



        $eksklyuziw = new Soobshit();

        $eksklyuziw->product_id = $request->product;
        $eksklyuziw->email = $request->email;
        $eksklyuziw->phone = $request->phone;

        $eksklyuziw->save();

        return back()->with('status','Отправлен');
    }
}
