<?php

namespace App\Http\Controllers\API;

use App\Lang;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Response;

class LangController extends Controller
{
    /**
     * @return ResponseFactory|Application|Response
     */
    public function __invoke()
    {
        return response(Lang::all());
    }
}
