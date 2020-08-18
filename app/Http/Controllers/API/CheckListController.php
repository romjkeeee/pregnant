<?php

namespace App\Http\Controllers\API;

use App\CheckList;
use App\Http\Requests\SelectTaskRequest;
use App\Http\Resources\CheckListResource;
use App\PatientTask;
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
            'tasks.patient','tasks.remember' => function (BelongsToMany $many) {
                $many->where('patient_id', auth()->user()->patient->id ?? null);
            }
        ])->get());
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
     * Destroy checklist
     *
     *
     */
    public function destroy($id)
    {
        PatientTask::query()->where([
            'patient_id' => auth()->user()->patient()->first()->id,
            'task_id'    => $id,
        ])->delete();

        return \response(['Сохранено.']);
    }
}
