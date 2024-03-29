<?php

namespace App\Http\Controllers\Admin;

use App\CheckList;
use App\Http\Controllers\Controller;
use App\Patient;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PatientCheckListController extends Controller
{
    /**
     * @var Patient $patient
     */
    private $patient;

    public function __construct()
    {
        if (\request()->route()) {
            $this->patient = Patient::query()
                ->whereHas('user')->with('user')
                ->findOrFail(request()->get('id'));
        }
    }

    /**
     * @param Request $request
     * @return array|Factory|Application|View|mixed
     */
    public function index(Request $request)
    {
        return view('admin.patients.check-list.index', [
            'page_title' => "Чек лист пациента {$this->patient->user->fullName}",
            'dontSearch' => false,
            'patient'    => $this->patient,
            'items'      => CheckList::query()->with([
                'tasks.patient' => function (BelongsToMany $many) use ($request) {
                    $many->where('patient_id', $request->get('id'));
                }
            ])->orderBy('id')->get(),
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $this->patient->tasks()->sync($request->get('task_id'));

        return back()->with('success', 'Сохранено!');
    }
}
