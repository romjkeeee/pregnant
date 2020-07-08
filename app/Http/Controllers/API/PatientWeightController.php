<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientWeightRequest;
use App\Patient;
use App\PatientWeight;
use Illuminate\Http\Request;

/**
 * @group Patient
 *
 * APIs for
 */
class PatientWeightController extends Controller
{
    /**
     * List of weight patient
     *
     */
    public function index()
    {
        return \response(auth()->user()->patient()->firstOrFail()->weight()->get());
    }

    /**
     * Add weight patient
     *
     * @bodyParam weights string required
     * @bodyParam date string required
     *
     */
    public function store(PatientWeightRequest $request)
    {
        return response(auth()->user()->patient()->firstOrFail()->weight()->create($request->validated()));
    }

    /**
     * Destroy weight patient
     *
     */
    public function destroy(PatientWeight $patientWeight)
    {
        $patientWeight->delete();
        return response(['Удалено']);
    }
}
