<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\TechRequest;
use App\Tech;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TechController extends Controller
{
    public function create(TechRequest $request)
    {
        return response()->json(Tech::create($request->validated()));
    }
}
