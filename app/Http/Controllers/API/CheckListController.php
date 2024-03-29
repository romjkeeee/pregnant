<?php

namespace App\Http\Controllers\API;

use App\CheckList;
use App\Http\Requests\RememberTaskRequest;
use App\Http\Requests\SelectTaskRequest;
use App\Http\Resources\CheckListResource;
use App\PatientTask;
use App\PatientTaskRemember;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Application;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

/**
 * @group Check List
 *
 * APIs for
 */
class CheckListController extends Controller
{
    /**
     * Create a new CheckListController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * List checklist
     *
     * @bodyParam chat_id integer
     *
     */
    public function index(): AnonymousResourceCollection
    {
        return CheckListResource::collection(CheckList::query()->with([
            'tasks.patient' => function (BelongsToMany $many) {
                $many->where('patient_id', auth()->user()->patient->id);
            }
        ])->with(['tasks.remember' => function (BelongsToMany $many) {
        $many->where('patient_id', auth()->user()->patient->id);
    }])->get());
    }

    /**
     * Store checklist
     *
     * @bodyParam task_id integer
     *
     */
    public function store(SelectTaskRequest $request)
    {
        auth()->user()->patient()->first()->tasks()->attach($request->validated());

        return \response(['Сохранено.']);
    }

    /**
     * Store remember
     *
     * @bodyParam task_id integer
     * @bodyParam remember boolean
     * @bodyParam date date example: 2020-08-18
     *
     */
    public function remember(RememberTaskRequest $request)
    {
        $patient = auth()->user()->patient()->first();

        $task = PatientTaskRemember::where([
            'task_id' => $request->task_id,
            'patient_id' => $patient->id
        ])->first();

        if ($task) {
            $task->update([
                'date' => $request->date ?? $task->date,
                'remember' => $request->remember ?? $task->remember
            ]);
        } else {
            $remember = new PatientTaskRemember();
            $remember->task_id = $request->task_id;
            $remember->patient_id = $patient->id;
            $remember->remember = $request->remember;
            $remember->date = $request->date;
            $remember->save();
        }

        return \response(['Сохранено.']);
    }

    /**
     * Destroy remember
     *
     *
     */
    public function destroy_remember($id)
    {
        PatientTaskRemember::query()->where([
            'patient_id' => auth()->user()->patient()->first()->id,
            'task_id' => $id,
        ])->delete();

        return \response(['Сохранено.']);
    }

    /**
     * Destroy checklist
     *
     *
     */
    public function destroy($id)
    {
        if (PatientTask::query()
            ->where([
                'patient_id' => auth()->user()->patient()->first()->id,
                'task_id' => $id,])->delete()) {
            return \response(['Сохранено.']);
        }else{
            return \response(['Ошибка']);
        }
    }
}
