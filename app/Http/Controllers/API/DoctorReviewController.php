<?php

namespace App\Http\Controllers\API;

use App\DoctorReview;
use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorReviewRequest;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @group Doctor
 *
 * APIs for
 */
class DoctorReviewController extends Controller
{
    /**
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }


    /**
     * List doctor
     * @bodyParam doctor_id integer
     */
    public function index(Request $request)
    {
        return \response(DoctorReview::query()->with(['user'])
            ->whereHas('user')
            ->filter($request->only(['doctor_id']))
            ->where('check', 1)
            ->paginate($request->get('perPage') ?? 10));
    }

    /**
     * Show doctor
     *
     */
    public function show($id)
    {
        return \response(DoctorReview::query()->with(['user'])->whereHas('user')->findOrFail($id));
    }

    /**
     * Create review
     * @bodyParam doctor_id integer
     * @bodyParam rate integer 1-5
     * @bodyParam text text 1-5
     */
    public function store(DoctorReviewRequest $request)
    {
        auth()->user()->doctorReviews()->create($request->validated());

        return \response(['Сохранено']);
    }
}
