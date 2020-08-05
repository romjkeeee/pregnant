<?php

namespace App\Http\Controllers\API;

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
                $patient = User::query()->with(['patient', 'city_translate', 'bellie', 'weight'])->find($item->user_id);
                $patient->duration = $this->duration($patient->id);
                $patients[] = $patient ?? false;
            }
        } else {
            $patients = [];
            $data = Patient::where([
                'doctor_id' => $user->doctor->id
            ])->get();

            foreach ($data as $item) {
                $patient = User::query()->with(['patient', 'city_translate', 'bellie', 'weight'])->find($item->user_id);
                $patient->duration = $this->duration($patient->id);
                $patients[] = $patient ?? false;
            }
        }

        if ($request->search) {
            $patients = [];
            $data = Patient::where([
                'doctor_id' => $user->doctor->id,
                ['created_at', '>=', $request->from],
                ['created_at', '<=', $request->to],
            ])
            ->get();
            $string = explode(' ', $request->search);
            foreach ($data as $item) {
                $patient = User::query()->with(['patient', 'city_translate', 'bellie', 'weight'])->find($item->user_id) ?? false;
                for($i = 0; $i < count($string); $i++) {
                    if (strripos($patient->name, $string[$i]) !== false) {
                        $patient->duration = $this->duration($patient->id);
                        $patients[] = $patient;
                    } elseif (strripos($patient->last_name, $string[$i]) !== false) {
                        $patient->duration = $this->duration($patient->id);
                        $patients[] = $patient;
                    }
                }
            }
        }

        return $patients;
    }

    public function duration(int $id)
    {
        $user = Patient::where('user_id', $id)->first();

        $date_pregnanc = new Carbon($user->conception_date);
        $date_now = Carbon::now();
        $date = $date_now->diff($date_pregnanc);

        return [
                'day' => $date->format('%d')
            ] ?? false;
    }
}
