<?php

namespace App\Http\Controllers\API;

use App\Duration;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @group Duration
 *
 * APIs for
 */
class DurationController extends Controller
{
    /**
     * Create a new DurationController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }


    /**
     * get Duration paginate list 20 per page
     *
     * @param Request $request
     * @return ResponseFactory|Application|Response
     */
    public function index(Request $request)
    {
        return \response(Duration::query()->filter($request->only('patient_id'))->paginate(20));
    }

    /**
     * find Duration by id
     *
     * @param $id
     * @return ResponseFactory|Application|Response
     */
    public function show($id)
    {
        return \response(Duration::query()->findOrFail($id));
    }
}
