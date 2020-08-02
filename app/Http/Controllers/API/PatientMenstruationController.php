<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDataNonPregnant;
use App\Patient;
use App\PatientContraction;
use App\PatientMenstruation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 * @group Menstruation
 *
 * APIs for
 */
class PatientMenstruationController extends Controller
{
    /**
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }


    /**
     * List menstruation for user
     */
    public function index()
    {
        $patient = Patient::query()->where('user_id', auth()->id())->first();
        $menstruation = PatientMenstruation::query()->where('patient_id', $patient->id)->first();
        $last_menstruation = new Carbon($menstruation->start_last_menstruation);
        $next_menstruation_start = $last_menstruation->addDays($menstruation->duration_menstruation);
        $next_menstruation_finish = $next_menstruation_start->addDays($menstruation->duration_cycle);

        $start_ovulation = $next_menstruation_start->addDays(5);
        $finis_ovulation = $next_menstruation_start->addDays(12);

        return \response([
            'next_menstruation_start' => $next_menstruation_start->toDateString(),
            'next_menstruation_finish' => $next_menstruation_finish->toDateString(),
            'start_ovulation' => $start_ovulation->toDateString(),
            'finish_ovulation' => $finis_ovulation->toDateString()
        ]);
    }

    /**
     * Create data for non pregnant
     * @bodyParam start_last_menstruation date
     * @bodyParam duration_menstruation int
     * @bodyParam duration_cycle int
     *
     * @response 201
     */
    public function info(CreateDataNonPregnant $request)
    {
        return \response([
            'message' => 'Сохранено',
            'data'    => auth()->user()->patient()->firstOrFail()->menstruation()->create($request->validated())
        ],201);
    }
}
