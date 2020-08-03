<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientConceptionRequest;
use App\Patient;
use App\User;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\GetPatiensRequest;

/**
 * @group Patient
 *
 * APIs for
 */
class PatientController extends Controller
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
     * get patient paginate list 20 per page
     *
     * @param Request $request
     * @return ResponseFactory|Application|Response
     */
    public function index(Request $request)
    {
        return \response(Patient::query()->with(['user.region', 'user.city', 'clinic', 'doctor'])->paginate($request->get('perPage') ?? 20));
    }

    /**
     * find patient by id
     *
     * @param $id
     * @return ResponseFactory|Application|Response
     */
    public function show($id)
    {
        return \response(Patient::query()->with(['user.region', 'user.city', 'clinic', 'doctor'])->findOrFail($id));
    }

    /**
     * Add conception date
     *
     * @bodyParam conception_type string required menstruation or screening
     * @bodyParam conception_date string required date of last menstruatiion or screenenig
     *
     */
    public function conceptionDate(PatientConceptionRequest $request)
    {
        $patient = auth()->user()->patient()->firstOrFail();
        $patient->update($request->validated());

        return \response(['Сохранено']);
    }

    /**
     * Set pregnant
     *
     * @bodyParam pregnant boolean required
     *
     */
    public function pregnant(Request $request)
    {
        $patient = auth()->user()->patient()->firstOrFail();
        $patient->update(['pregnant' => $request->pregnant]);

        return \response(['Сохранено']);
    }

    /**
     * @param GetPatiensRequest $request
     * @return ResponseFactory|Application|Response
     */

    public function getPatiens(GetPatiensRequest $request)
    {
        $user = User::query()->with(['doctor'])->find(auth()->id());

        if ($request->from and $request->to) {
            $patients = [];
            $data = Patient::where([
                'doctor_id' => $user->doctor->id,
                ['created_at', '>=', $request->from],
                ['created_at', '<=', $request->to ],
            ])->get();

            foreach ($data as $item) {
                $patients[] = User::query()->with(['patient'])->find($item->user_id) ?? false;
            }
        } else {
            $patients = [];
            $data = Patient::where([
                'doctor_id' => $user->doctor->id
            ])->get();

            foreach ($data as $item) {
                $patients[] = User::query()->with(['patient'])->find($item->user_id) ?? false;
            }
        }

        if ($request->search) {
            $patients = [];
            $data = Patient::where([
                'doctor_id' => $user->doctor->id,
                ['created_at', '>=', $request->from],
                ['created_at', '<=', $request->to],
            ])->get();

            foreach ($data as $item) {
                $patients[] = User::query()->with(['patient'])->find($item->user_id) ?? false;
            }
        }

        return $patients;
    }
}
