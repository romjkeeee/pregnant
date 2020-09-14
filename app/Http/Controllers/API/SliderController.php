<?php

namespace App\Http\Controllers\API;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function index()
    {
        return response()->json(
            Slider::all()
        );
    }
}
