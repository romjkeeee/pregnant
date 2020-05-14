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
     * @param Request $request
     * @return ResponseFactory|Application|Response
     */
    public function index(Request $request)
    {
        return \response(PatientBelly::query()->whereHas('patient', function (Builder $builder) {
            $builder->where('user_id', auth()->id());
        })->orderByDesc('date')->paginate(20));
    }

    /**
     * @param $id
     * @return ResponseFactory|Application|Response
     */
    public function show($id)
    {
        return \response(PatientBelly::query()->whereHas('patient', function (Builder $builder) {
            $builder->where('user_id', auth()->id());
        })->orderByDesc('date')->findOrFail($id));
    }

    /**
     * @return ResponseFactory|Application|Response
     */
    public function last()
    {
        return \response(PatientBelly::query()->whereHas('patient', function (Builder $builder) {
            $builder->where('user_id', auth()->id());
        })->orderByDesc('date')->first());
    }

    /**
     * @param PatientBellyRequest $request
     * @return ResponseFactory|Application|Response
     */
    public function store(PatientBellyRequest $request)
    {
        auth()->user()->patient()->firstOrFail()
            ->bellies()->create($request->validated());

        return \response(['Сохранено']);
    }
}
