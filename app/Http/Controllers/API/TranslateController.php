<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\TranslateCollection;
use App\Translate;
use Illuminate\Http\Request;

class TranslateController extends Controller
{
    /**
     * Create a new TranslateController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index']]);
    }


    /**
     * @param Request $request
     * @return TranslateCollection
     */
    public function index(Request $request)
    {
        return TranslateCollection::make(Translate::all());
    }
}
