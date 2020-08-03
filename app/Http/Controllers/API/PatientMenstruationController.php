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
        $menstruation = PatientMenstruation::query()->where('patient_id', $patient->id)->orderBy('created_at', 'desc')->first();
        $last_menstruation = strtotime($menstruation->start_last_menstruation);

        $next_menstruation_start = strtotime('+'.$menstruation->duration_menstruation.' days', $last_menstruation);
        $next_menstruation_finish = strtotime('+'.$menstruation->duration_cycle.' days', $next_menstruation_start);

        $ovulation_data = $menstruation->duration_menstruation / 2 + 1;

        $ovulation_middle = strtotime('+'.$ovulation_data.' days', $last_menstruation);
        $start_ovulation = strtotime('-1 days', $ovulation_middle);
        $finis_ovulation = strtotime('+1 days', $ovulation_middle);

        $next_menstruation_start_second = strtotime('+'.$menstruation->duration_menstruation.' days', $next_menstruation_start);
        $next_menstruation_finish_second = strtotime('+'.$menstruation->duration_cycle.' days', $next_menstruation_start_second);
        $ovulation_middle_second = strtotime('+'.$ovulation_data.' days', $next_menstruation_start_second);
        $start_ovulation_second = strtotime('-1 days', $ovulation_middle_second);
        $finis_ovulation_second = strtotime('+1 days', $ovulation_middle_second);



        return \response([
            'next_menstruation_start' => [date('Y-m-d',$next_menstruation_start), date('Y-m-d',$next_menstruation_start_second)],
            'next_menstruation_finish' => [date('Y-m-d',$next_menstruation_finish), date('Y-m-d',$next_menstruation_finish_second)],
            'start_ovulation' => [date('Y-m-d',$start_ovulation), date('Y-m-d',$start_ovulation_second)],
            'ovulation_date' => [date('Y-m-d',$ovulation_middle),date('Y-m-d',$ovulation_middle_second)],
            'finish_ovulation' => [date('Y-m-d',$finis_ovulation), date('Y-m-d',$finis_ovulation_second)]
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
