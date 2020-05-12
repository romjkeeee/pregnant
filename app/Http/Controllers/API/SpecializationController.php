<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Specialization;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SpecializationController extends Controller
{
    /**
     * Create a new SpecializationController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }


    /**
     * get specializations paginate list 20 per page
     *
     * @param Request $request
     * @return ResponseFactory|Application|Response
     */
    public function index(Request $request)
    {
        return \response(Specialization::query()->paginate(20));
    }

    /**
     * find specialization by id
     *
     * @param $id
     * @return ResponseFactory|Application|Response
     */
    public function show($id)
    {
        return \response(Specialization::query()->findOrFail($id));
    }
}
