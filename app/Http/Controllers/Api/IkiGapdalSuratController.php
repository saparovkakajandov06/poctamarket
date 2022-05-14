<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\IkiGapdalSuratResource;
use App\IkiGapdalSurat;
use Illuminate\Http\Request;

class IkiGapdalSuratController extends Controller
{
    public function index() {


        $ikigapdalsurat = IkiGapdalSurat::all();

        return IkiGapdalSuratResource::collection($ikigapdalsurat);
    }
}
