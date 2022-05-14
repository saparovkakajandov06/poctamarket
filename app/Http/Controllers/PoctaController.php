<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Validator;
use Config;
use App\Pocta;

class PoctaController extends Controller
{
    public function index(){
        return view('inc.pocta');
    }

    public function store(Request $request){

            $pocta = new Pocta();

            $pocta->email = $request->email;

            $pocta->save();

    }

}
