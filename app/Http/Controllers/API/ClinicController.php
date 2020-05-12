<?php

namespace App\Http\Controllers\API;

use App\Clinic;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClinicController extends Controller
{
    /**
     * Create a new ClinicController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }


    /**
     * get Clinic paginate list 20 per page
     *
     * @param Request $request
     * @return ResponseFactory|Application|Response
     */
    public function index(Request $request)
    {
        return \response(Clinic::query()->with(['city', 'region'])->filter($request->only(['type']))->paginate(20));
    }

    /**
     * find Clinic by id
     *
     * @param $id
     * @return ResponseFactory|Application|Response
     */
    public function show($id)
    {
        return \response(Clinic::query()->with(['city', 'region'])->findOrFail($id));
    }
}
