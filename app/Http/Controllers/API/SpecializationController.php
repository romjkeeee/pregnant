<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\SpecializationCollection;
use App\Http\Resources\SpecializationResource;
use App\Specialization;
use Illuminate\Http\Request;

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
     * @return SpecializationCollection
     */
    public function index(Request $request): SpecializationCollection
    {
        return SpecializationCollection::make(Specialization::query()->paginate($request->get('perPage') ?? 20));
    }

    /**
     * find specialization by id
     *
     * @param $id
     * @return SpecializationResource
     */
    public function show($id): SpecializationResource
    {
        return SpecializationResource::make(Specialization::query()->findOrFail($id));
    }
}
