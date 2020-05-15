<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientWeightRequest;
use App\Patient;
use App\PatientWeight;
use Illuminate\Http\Request;

class PatientWeightController extends Controller
{
    public function index()
    {
        return \response(auth()->user()->patient()->firstOrFail()->weight()->get());
    }

    public function store(PatientWeightRequest $request)
    {
        return response(auth()->user()->patient()->firstOrFail()->weight()->create($request->validated()));
    }

    public function destroy(PatientWeight $patientWeight)
    {
        $patientWeight->delete();
        return response(['Удалено']);
    }
}
