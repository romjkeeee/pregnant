<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Patient;
use App\PatientWeight;
use Illuminate\Http\Request;

class PatientWeightController extends Controller
{
    public function index()
    {
        return \response(Patient::with('weight')->paginate(20));
    }

    public function store(Request $request)
    {
        return response(auth()->user()->patient()->weight()->create($request->validated()));
    }

    public function destroy(PatientWeight $patientWeight)
    {
        $patientWeight->delete();
        return response(['Удалено']);
    }
}
