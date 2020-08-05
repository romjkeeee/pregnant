<?php

namespace App\Http\Controllers\API;

use App\Duration;
use App\Http\Controllers\Controller;
use App\Http\Requests\GetDurationRequest;
use App\Patient;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;

/**
 * @group Duration
 *
 * APIs for
 */
class DurationController extends Controller
{
    /**
     * Create a new DurationController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }


    /**
     * get Duration paginate list 20 per page
     *
     * @param Request $request
     * @return ResponseFactory|Application|Response
     */
    public function index(Request $request)
    {
        return \response(Duration::query()->filter($request->only('patient_id'))->paginate($request->get('perPage') ?? 20));
    }

    /**
     * find Duration by id
     *
     * @param $id
     * @return ResponseFactory|Application|Response
     */
    public function show($id)
    {
        return \response(Duration::query()->findOrFail($id));
    }

    /**
     * Get duration
     * Получения недели беременности с статьей для нее
     *
     * @bodyParam phone string required
     *
     */
    public function get_duration()
    {
        $patient = auth()->user()->patient()->firstOrFail();
        if ($patient)
        {
            if ($patient->pregnant == 1)
            {
                if ($patient->conception_type == 'menstruation')
                {
                    $day_menstruation = date($patient->conception_date);
                    $timestamp_menstruation = date_timestamp_get(date_create($day_menstruation));
                    $date = date_create();
                    date_timestamp_set($date, $timestamp_menstruation);
                    $days = localtime($timestamp_menstruation, true);
                    $days_diffs = localtime(time(), true);

                    $yday = $days['tm_yday'];
                    $tm_yday = $days_diffs['tm_yday'];
                    $wy = $tm_yday / 7;
                    $wyp = $yday / 7;
                    $weeks = round($wy - $wyp);
                    return \response(Duration::with('duration_articles')
                        ->where('pos', $weeks)->first());

                } elseif ($patient->conception_type === 'screening') {
                    $now = time();
                    $your_date = strtotime($patient->conception_date);
                    $datediff = $now - $your_date;

                    $week = $datediff / (60 * 60 * 24);

                    $date_pregnanc = new Carbon($patient->conception_date);
                    $date_now = Carbon::now();
                    $date = $date_now->diff($date_pregnanc);

                    return [
                            'month' => $date->format('%m'),
                            'week' => floor($week / 7),
                            'day' => floor($week),
                        ] ?? false;
                }
            }else{
                return \response('пациент не беременный');
            }
        }else{
            return \response('пациент не найден');
        }
    }
}
