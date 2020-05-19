<?php

namespace App\Http\Controllers\API;

use App\CheckList;
use App\Http\Requests\SelectTaskRequest;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use App\Http\Controllers\Controller;
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
     * @return Response
     */
    public function index(): Response
    {
        return response([CheckList::query()->with('tasks')->get()]);
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
        auth()->user()->patient()->first()->tasks()->where('task_id', $id)->delete();

        return \response(['Сохранено.']);
    }
}
