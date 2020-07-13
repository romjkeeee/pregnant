<?php

namespace App\Http\Controllers\API;

use App\ClinicReview;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClinicReviewRequest;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @group Clinic review
 *
 * APIs for
 */
class ClinicReviewController extends Controller
{
    /**
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }


    /**
     * List
     * Список отзывов клиник
     *
     * @bodyParam clinic_id integer
     * @authenticated required
     * @response 200
     */
    public function index(Request $request)
    {
        return \response(ClinicReview::query()->with(['user.patient'])
            ->whereHas('user.patient')
            ->filter($request->only(['clinic_id']))
            ->paginate($request->get('perPage') ?? 10));
    }

    /**
     * Show
     * Показать отзыв отзывов клиник
     *
     * @authenticated required
     * @response 200
     */
    public function show($id)
    {
        return \response(ClinicReview::query()->with(['user.patient'])->whereHas('user.patient')->findOrFail($id));
    }

    /**
     * Create
     * Создать отзыв клиники
     * @bodyParam clinic_id integer
     * @bodyParam rate integer 1-5
     * @bodyParam text integer 1-5
     *
     * @authenticated required
     * @response 200
     */
    public function store(ClinicReviewRequest $request)
    {
        auth()->user()->clinicReviews()->create($request->validated());

        return \response(['Сохранено']);
    }
}
