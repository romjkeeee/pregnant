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
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return CheckListResource::collection(CheckList::query()->with([
            'tasks.patient' => function (BelongsToMany $many) {
                $many->where('patient_id', auth()->user()->patient->id ?? null);
            }
        ])->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SelectTaskRequest $request
     * @return ResponseFactory|Application|Response
     */
    public function store(SelectTaskRequest $request)
    {
        auth()->user()->patient()->first()->tasks()->attach($request->validated());

        return \response(['Сохранено.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
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
