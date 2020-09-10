<?php

namespace App\Http\Controllers\API;

use App\Doctor;
use App\Http\Controllers\Controller;
use App\Http\Requests\GetPregnancyPatologyRequest;
use App\Http\Requests\PatientConceptionRequest;
use App\Http\Requests\PatientLastMenstruationRequest;
use App\Http\Requests\PregnancyNumberRequest;
use App\Http\Requests\PregnancyPatologyRequest;
use App\Http\Requests\UpToWeightRequest;
use App\Patient;
use App\PatientLastMenstruation;
use App\PragnancyNumber;
use App\PregnancyNumber;
use App\PregnancyPatologye;
use App\User;
use Carbon\Carbon;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\Builder;
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
        return \response(Patient::query()->with([
            'user.region',
            'user.city',
            'clinic',
            'doctor',
            'user.patient.bellies',
            'user.patient.weight',
            'user.patient.clinic.translates',
            'user.patient.lastMenstruation',
            'user.city.translates',
            'user.region.translates',
            'user.pnumber',
            'user.patology'
        ])->findOrFail($id));
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

    public function getDoctors(Request $request)
    {
        $data = [];

        $doctors = Doctor::query()->with(['user', 'clinics', 'specialisations', 'reviews'])->where(function (Builder $doctor) use ($request) {
            if ($request->get('search')) {
                $doctor->whereHas('user', function (Builder $user) use ($request) {
                    $user->where(function (Builder $builder) use ($request) {
                        $builder->orWhere('name', 'LIKE', "%{$request->get('search')}%")
                            ->orWhere('last_name', 'LIKE', "%{$request->get('search')}%")
                            ->orWhere('second_name', 'LIKE', "%{$request->get('search')}%");
                    });
                });
            }
        })->orderBy('id', 'desc')->paginate(20);

        return \response()->json($doctors);
    }

    /**
     * @param GetPatiensRequest $request
     * @return array|\Illuminate\Database\Eloquent\HigherOrderBuilderProxy|mixed
     */

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
            'doctor.patients.lastMenstruation',
            'doctor.patients.clinic.translates',
            'doctor.patients.user.city.translates',
            'doctor.patients.user.region.translates',
            'doctor.patients.user.pnumber',
            'doctor.patients.user.patology'
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

    /**
     * @param int $id
     * @return array|bool
     */

    public function duration(int $id)
    {
        $user = Patient::where('id', $id)->first();

        if ($user->pregnant == 1) {
            if (isset($user->conception_date) && $user->conception_date != '') {
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
            } else {
                return \response()->json(['Нету данных']);
            }
            return \response()->json(['Не беременна']);
        }
    }

    /**
     * @param PregnancyNumberRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function pragnancyNumber(PregnancyNumberRequest $request)
    {
        $pregnancy = PregnancyNumber::with('user')->where([
            'user_id' => $request->user_id
        ])->first();

        if ($pregnancy) {
            $pregnancy->update([
                'count' => $request->count
            ]);

            return \response()->json($pregnancy);
        } else {
            return \response()->json(PregnancyNumber::create($request->validated()));
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */

    public function getPragnancyNumber(Request $request)
    {
        return \response()->json(
            PregnancyNumber::with('user')->where([
                'user_id' => $request->user_id
            ])->first()
        );
    }

    /**
     * @param PregnancyPatologyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function pregnancyPatology(PregnancyPatologyRequest $request)
    {
        return \response()->json(
            PregnancyPatologye::create($request->validated())
        );
    }

    /**
     * @param GetPregnancyPatologyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function getPregnancyPatology(GetPregnancyPatologyRequest $request)
    {
        return \response()->json(
            PregnancyPatologye::with('user.patient')->where($request->validated())->get()
        );
    }

    /**
     * @param UpToWeightRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function updateUpToWeight(UpToWeightRequest $request)
    {
        return \response()->json(auth()->user()->patient()->update($request->validated()));
    }

    /**
     * @param PatientLastMenstruationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function setLastMenstruation(PatientLastMenstruationRequest $request)
    {
        return \response()->json(
            PatientLastMenstruation::create($request->validated())
        );
    }
}
