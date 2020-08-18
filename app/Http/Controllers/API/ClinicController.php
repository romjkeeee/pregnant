<?php

namespace App\Http\Controllers\API;

use App\Clinic;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClinicResource;
use App\Http\Resources\Collections\ClinicCollection;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\Builder;
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
        $this->middleware('auth:api', ['except' => ['index', 'show', 'search']]);
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
     * @param $id
     * @param Request $request
     * @return ClinicResource|\Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function show($id, Request $request)
    {
        if($request->search) {
            if ($request->type) {
                return Clinic::query()->with(['region', 'city', 'departments', 'schedules', 'reviews', 'prices'])
                    ->where('type', $request->type)
                    ->when($request->get('search'), function (Builder $query) use ($request) {
                        $query->whereHas('translates', function (Builder $builder) use ($request) {
                            $builder->where('name', 'LIKE', "%{$request->get('search')}%");
                        });
                    })->orderBy('id', 'desc')->paginate(20);
            } else {
                return Clinic::query()->with(['region', 'city', 'departments', 'schedules', 'reviews', 'prices'])
                    ->when($request->get('search'), function (Builder $query) use ($request) {
                        $query->whereHas('translates', function (Builder $builder) use ($request) {
                            $builder->where('name', 'LIKE', "%{$request->get('search')}%");
                        });
                    })->orderBy('id', 'desc')->paginate(20);
            }
        } else {
            return ClinicResource::make(Clinic::query()
                ->with(['city', 'region', 'departments', 'schedules', 'prices'])
                ->findOrFail($id));
        }
    }

    public function search(Request $request)
    {
        if($request->search) {
            if ($request->type) {
                return Clinic::query()->with(['region', 'city', 'departments', 'schedules', 'reviews', 'prices', 'translates'])
                    ->where('type', $request->type)
                    ->when($request->get('search'), function (Builder $query) use ($request) {
                        $query->whereHas('translates', function (Builder $builder) use ($request) {
                            $builder->where('name', 'LIKE', "%{$request->get('search')}%");
                        });
                    })->orderBy('id', 'desc')->paginate(20);
            } else {
                return Clinic::query()->with(['region', 'city', 'departments', 'schedules', 'reviews', 'prices', 'translates'])
                    ->when($request->get('search'), function (Builder $query) use ($request) {
                        $query->whereHas('translates', function (Builder $builder) use ($request) {
                            $builder->where('name', 'LIKE', "%{$request->get('search')}%");
                        });
                    })->orderBy('id', 'desc')->paginate(20);
            }
        }
    }
}
