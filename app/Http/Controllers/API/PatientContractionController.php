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
     * List cotraction for user
     */
    public function index(Request $request)
    {
        return \response(PatientContraction::query()->whereHas('patient', function (Builder $builder) {
            $builder->where('user_id', auth()->id());
        })->orderByDesc('id')->paginate($request->get('perPage') ?? 20));
    }

    /**
     * SHow by id
     */
    public function show($id)
    {
        return \response(PatientContraction::query()->whereHas('patient', function (Builder $builder) {
            $builder->where('user_id', auth()->id());
        })->orderByDesc('date')->findOrFail($id));
    }

    /**
     * Create cantraction
     *
     * @bodyParam start date_format:Y-m-d H:i:s
     * @bodyParam duration date_format:H:i:s
     * @bodyParam interval date_format:H:i:s
     */
    public function store(PatientContractionRequest $request)
    {
        return \response([
            'message' => 'Сохранено',
            'data'    => auth()->user()->patient()->firstOrFail()->contractions()->create($request->validated())
        ]);
    }

    /**
     * Destroy by id
     */
    public function destroy($id)
    {
        auth()->user()->patient()->firstOrFail()->contractions()->findOrFail($id)->delete();

        return \response(['Удалено']);
    }
}
