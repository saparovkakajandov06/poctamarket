<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AdminSliderController;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdminSliderResource;
use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index() {

        $sliders = Slider::all();

        return AdminSliderResource::collection($sliders);
    }
}
