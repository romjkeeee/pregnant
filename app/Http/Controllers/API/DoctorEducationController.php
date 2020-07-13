<?php

namespace App\Http\Controllers\API;

use App\DoctorEducation;
use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\DoctorEducationCollection;
use Illuminate\Http\Request;

/**
 * @group Doctor
 *
 * APIs for
 */
class DoctorEducationController extends Controller
{
    /**
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * List
     * Doctor education
     * @bodyParam doctor_id integer
     *
     */
    public function index(Request $request): DoctorEducationCollection
    {
        return DoctorEducationCollection::make(DoctorEducation::query()->with(['doctor'])
            ->whereHas('doctor')
            ->filter($request->only(['doctor_id']))
            ->get());
    }
}
