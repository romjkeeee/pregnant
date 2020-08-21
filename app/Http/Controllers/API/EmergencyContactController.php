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
    /**
     * List emergency contacts
     *
     */
    public function index()
    {
        return \response(auth()->user()->patient()->firstOrFail()->emergencycontacts()->get());
    }

    /**
     * Create emergency contact
     *
     * @bodyParam name string
     * @bodyParam phone string
     *
     */
    public function store(EmergencyContactsRequest $request)
    {
        return response(['status' => 'success', 'data' => auth()->user()->patient()->firstOrFail()->emergencycontacts()->create($request->validated())], 201);
    }
}
