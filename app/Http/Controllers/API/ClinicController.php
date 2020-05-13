<?php

namespace App\Http\Controllers\API;

use App\Clinic;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @group Clinic
 *
 * APIs for
 */
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
     * List
     * Список клиник
     *
     * @authenticated required
     * @response 200
     */
    public function index(Request $request)
    {
        return \response(Clinic::query()->with(['city', 'region', 'departments'])->filter($request->only(['type']))->paginate(20));
    }

    /**
     * Show
     * Показать клинику
     *
     * @authenticated required
     * @response 200
     */
    public function show($id)
    {
        return \response(Clinic::query()->with(['city', 'region', 'departments', 'schedules', 'prices'])->findOrFail($id));
    }
}
