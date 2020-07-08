<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\TranslateCollection;
use App\Translate;
use Illuminate\Http\Request;

/**
 * @group Translate
 *
 * APIs for
 */
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
     * List translate
     * Список переводов
     *
     * @response 200
     */
    public function index(Request $request)
    {
        return TranslateCollection::make(Translate::all());
    }
}
