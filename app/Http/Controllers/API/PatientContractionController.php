<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientContractionRequest;
use App\PatientContraction;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @group Contraction
 *
 * APIs for
 */
class PatientContractionController extends Controller
{
    /**
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }


    /**
     * @param Request $request
     * @return ResponseFactory|Application|Response
     */
    public function index(Request $request)
    {
        return \response(PatientContraction::query()->whereHas('patient', function (Builder $builder) {
            $builder->where('user_id', auth()->id());
        })->orderByDesc('id')->paginate(20));
    }

    /**
     * @param $id
     * @return ResponseFactory|Application|Response
     */
    public function show($id)
    {
        return \response(PatientContraction::query()->whereHas('patient', function (Builder $builder) {
            $builder->where('user_id', auth()->id());
        })->orderByDesc('date')->findOrFail($id));
    }

    /**
     * @param PatientContractionRequest $request
     * @return ResponseFactory|Application|Response
     */
    public function store(PatientContractionRequest $request)
    {
        auth()->user()->patient()->firstOrFail()
            ->contractions()->create($request->validated());

        return \response(['Сохранено']);
    }

    /**
     * @param $id
     * @return ResponseFactory|Application|Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        auth()->user()->patient()->firstOrFail()->contractions()->findOrFail($id)->delete();

        return \response(['Удалено']);
    }
}
