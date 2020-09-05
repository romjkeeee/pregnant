<?php

namespace App\Http\Controllers\API;

use App\City;
use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\CityCollection;
use App\Http\Resources\Collections\RegionCollection;
use App\Region;
use Illuminate\Http\Request;

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
     * @return RegionCollection
     */
    public function regions(Request $request): RegionCollection
    {
        return RegionCollection::make(Region::query()->with('translates')->paginate($request->get('perPage') ?? 50));
    }

    /**
     * Get cities 50 per page
     *
     * @param Request $request
     * @return CityCollection
     */
    public function cities(Request $request): CityCollection
    {
        return CityCollection::make(City::query()->with('translates')->filter($request->only('region_id'))->paginate($request->get('perPage') ?? 50));
    }
}
