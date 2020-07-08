<?php

namespace App\Http\Controllers\API;

use App\Lang;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Response;

/**
 * @group Lang
 *
 * APIs for
 */
class LangController extends Controller
{
    /**
     * List lang
     * Список языков
     *
     */
    public function __invoke()
    {
        return response(Lang::all());
    }
}
