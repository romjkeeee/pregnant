<?php

namespace App\Http\Controllers\API;

use App\Clinic;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClinicResource;
use App\Http\Resources\Collections\ClinicCollection;
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
     * @param Request $request
     * @return ClinicCollection
     */
    public function index(Request $request)
    {
        return ClinicCollection::make(Clinic::query()
            ->with(['city', 'region', 'departments', 'schedules', 'prices'])
            ->filter($request->only(['type']))
            ->paginate($request->get('perPage') ?? 20));
    }

    /**
     * Show
     * Показать клинику
     *
     * @authenticated required
     * @response 200
     * @param $id
     * @return ClinicResource
     */
    public function show($id)
    {
        return ClinicResource::make(Clinic::query()
            ->with(['city', 'region', 'departments', 'schedules', 'prices'])
            ->findOrFail($id));
    }
}
