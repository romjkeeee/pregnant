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
 * @group Doctor review
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
        $this->middleware('auth:api', ['except' => []]);
    }


    /**
     * @param Request $request
     * @return ResponseFactory|Application|Response
     */
    public function index(Request $request)
    {
        return \response(DoctorReview::query()->with(['user.doctor'])
            ->whereHas('user.doctor')
            ->filter($request->only(['doctor_id']))
            ->paginate($request->get('perPage') ?? 10));
    }

    /**
     * @param $id
     * @return ResponseFactory|Application|Response
     */
    public function show($id)
    {
        return \response(DoctorReview::query()->with(['user.doctor'])->whereHas('user.doctor')->findOrFail($id));
    }

    /**
     * @param DoctorReviewRequest $request
     * @return ResponseFactory|Application|Response
     */
    public function store(DoctorReviewRequest $request)
    {
        auth()->user()->doctorReviews()->create($request->validated());

        return \response(['Сохранено']);
    }
}
