<?php

namespace App\Http\Controllers\API;

use App\Doctor;
use App\Http\Controllers\Controller;
use App\Patient;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PatientController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }


    /**
     * get patient paginate list 20 per page
     *
     * @param Request $request
     * @return ResponseFactory|Application|Response
     */
    public function index(Request $request)
    {
        return \response(Patient::query()->with(['user', 'region', 'city', 'clinic', 'doctor', 'duration'])->paginate(20));
    }

    /**
     * find patient by id
     *
     * @param $id
     * @return ResponseFactory|Application|Response
     */
    public function show($id)
    {
        return \response(Patient::query()->with(['user', 'region', 'city', 'clinic', 'doctor', 'duration'])->findOrFail($id));
    }
}
