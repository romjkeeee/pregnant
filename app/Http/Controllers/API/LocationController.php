<?php

namespace App\Http\Controllers\API;

use App\City;
use App\Http\Controllers\Controller;
use App\Region;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @group Location
 *
 * APIs for
 */
class LocationController extends Controller
{
    /**
     * Create a new LocationController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['regions', 'cities']]);
    }

    /**
     * Get regions 50 per page
     *
     * @param Request $request
     * @return ResponseFactory|Application|Response
     */
    public function regions(Request $request)
    {
        return \response(Region::query()->paginate($request->get('perPage') ?? 50));
    }

    /**
     * Get cities 50 per page
     *
     * @param Request $request
     * @return ResponseFactory|Application|Response
     */
    public function cities(Request $request)
    {
        return \response(City::query()->filter($request->only('region_id'))->paginate($request->get('perPage') ?? 50));
    }
}
