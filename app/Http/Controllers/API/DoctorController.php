<?php

namespace App\Http\Controllers\API;

use App\Doctor;
use App\Http\Controllers\Controller;
use App\Http\Resources\DoctorRecourse;
use App\Specialization;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @group Doctor
 *
 * APIs for
 */
class DoctorController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }

    /**
     * get doctor paginate list 20 per page
     *
     * @param Request $request
     * @return ResponseFactory|Application|Response
     */
    public function index(Request $request)
    {
        return \response(Doctor::query()->with(['user', 'clinics', 'specialisations'])->paginate($request->get('perPage') ?? 20));
    }

    /**
     * Doctor by clinik
     * @bodyParam clinic_id integer
     * @param Request $request
     * @return ResponseFactory|Application|Response
     */
    public function specialisationDoctors(Request $request)
    {
        return \response(Specialization::with([
            'doctors.user',
            'doctors.specialisations.translates',
            'doctors.schedules'
        ])
            ->whereHas('doctors', function (Builder $doctors) use ($request) {
                $doctors->whereHas('clinics', function (Builder $clinic) use ($request) {
                    $clinic->where('id', $request->get('clinic_id'));
                });
            })
            ->when($request->specialisation, function ($query) use ($request) {
                return $query->where('id',$request->get('specialisation'));
            })
            ->get());
    }

    /**
     * find doctor by id
     *
     * @param $id
     * @return DoctorRecourse
     */
    public function show($id): DoctorRecourse
    {
        return DoctorRecourse::make(Doctor::query()->with(['user', 'clinics.schedules', 'specialisations.translates', 'educations', 'clinics.translates', 'schedules'])->findOrFail($id));
    }

    /**
     * Good luck
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */

    public function like($id)
    {
        return \response()->json(
            Doctor::query()->findOrFail($id)->increment('like')
        );
    }

    /**
     * Not good luck :)
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */

    public function dislike($id)
    {
        return \response()->json(
            Doctor::query()->findOrFail($id)->increment('dislike')
        );
    }
}
