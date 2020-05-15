<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmergencyContactsRequest;
use App\Patient;
use Illuminate\Http\Request;

/**
 * @group Emergency Contacts
 *
 * APIs for
 */
class EmergencyContactController extends Controller
{
    public function index()
    {
        return \response(auth()->user()->patient()->firstOrFail()->emergencycontacts()->get());
    }

    public function store(EmergencyContactsRequest $request)
    {
        return response(auth()->user()->patient()->firstOrFail()->emergencycontacts()->create($request->validated()));
    }
}
