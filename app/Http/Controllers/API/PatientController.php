<?php

namespace App\Http\Controllers\API;

use App\Doctor;
use App\Http\Controllers\Controller;
use App\Http\Requests\PatientConceptionRequest;
use App\Patient;
use App\User;
use Carbon\Carbon;
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

        return $this->duration($patient->id);
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

    public function getPatiens(GetPatiensRequest $request)
    {
        $data = [];

        $query_patient = function ($query) use ($request) {
            if (!is_null($request->get('from')) and !is_null($request->get('to'))) {
                $query->where('created_at', '>=', $request->get('from'));
                $query->where('created_at', '<=', $request->get('to'));
            }
        };

        $patients = User::query()->with([
            'doctor.patients' => $query_patient,
            'doctor.patients.bellies',
            'doctor.patients.weight',
            'doctor.patients.clinic.translates',
            'doctor.patients.user.city.translates',
            'doctor.patients.user.region.translates'
        ])->find(auth()->id());

        $string = explode(' ', $request->search);

        foreach ($patients->doctor->patients as $patient) {
            if ($request->get('search')) {
                /* Потом переделать на выборку из БД */
                for ($i = 0; $i < count($string); $i++) {
                    if (strripos($patient->user->name, $string[$i]) !== false) {
                        $patient->duration = $this->duration($patient->user->id);
                        $data[] = $patient;
                    } elseif (strripos($patient->last_name, $string[$i]) !== false) {
                        $patient->duration = $this->duration($patient->user->id);
                        $data[] = $patient;
                    }
                }
            } else {
                $patient->duration = $this->duration($patient->user->id);
                $data[] = $patient;
            }
        }

        $patients->doctor->patients = $data;

        return $patients->doctor->patients;
    }

    public function duration(int $id)
    {
        $user = Patient::where('user_id', $id)->first();

        $now = time();
        $your_date = strtotime($user->conception_date);
        $datediff = $now - $your_date;

        $week = $datediff / (60 * 60 * 24);

        $date_pregnanc = new Carbon($user->conception_date);
        $date_now = Carbon::now();
        $date = $date_now->diff($date_pregnanc);

        return [
                'month' => $date->format('%m'),
                'week' => floor($week / 7),
                'day' => floor($week),
        ] ?? false;
    }
}
