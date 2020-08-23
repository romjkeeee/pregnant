<?php

namespace App\Http\Controllers\API;

use App\Duration;
use App\Http\Controllers\Controller;
use App\Http\Requests\PatientBellyRequest;
use App\PatientBelly;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @group Patient belly
 *
 * APIs for
 */
class PatientBellyController extends Controller
{
    /**
     * Create a new DurationController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }


    /**
     * get PatientBelly paginate list 20 per page
     *
     */
    public function index(Request $request)
    {
        return \response(PatientBelly::query()->whereHas('patient', function (Builder $builder) {
            $builder->where('user_id', auth()->id());
        })->orderByDesc('date')->paginate($request->get('perPage') ?? 20));
    }

    /**
     * Show by id
     *
     */
    public function show($id)
    {
        return \response(PatientBelly::query()->whereHas('patient', function (Builder $builder) {
            $builder->where('user_id', auth()->id());
        })->orderByDesc('date')->findOrFail($id));
    }

    /**
     * Last
     */
    public function last($id = false)
    {
        return \response(PatientBelly::query()->whereHas('patient', function (Builder $builder) use ($id) {
            $builder->where('user_id', ($id === false) ? auth()->id() : $id);
        })->orderByDesc('date')->first());
    }

    /**
     * Create belly
     * @bodyParam uterine_fundus_height numeric
     * @bodyParam girth_abdomen numeric
     * @bodyParam date date
     */
    public function store(PatientBellyRequest $request)
    {
        auth()->user()->patient()->firstOrFail()
            ->bellies()->create($request->validated());

        return \response(['Сохранено']);
    }
}
