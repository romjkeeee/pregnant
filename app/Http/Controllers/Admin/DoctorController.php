<?php

namespace App\Http\Controllers\Admin;

use App\Doctor;
use App\Http\Requests\Admin\DoctorRequest;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DoctorController extends Controller
{
    /**
     * @param Request $request
     * @return array|Factory|Application|View|mixed
     */
    public function index(Request $request)
    {
        return view('admin.doctors.index', [
            'page_title' => 'Доктора',
            'search'     => $request->get('search'),
            'items'      => Doctor::query()->with(['user', 'clinics', 'specialisations', 'reviews'])->where(function (Builder $doctor) use ($request) {
                if ($request->get('search')) {
                    $doctor->whereHas('user', function (Builder $user) use ($request) {
                        $user->where(function (Builder $builder) use ($request) {
                            $builder->orWhere('name', 'LIKE', "%{$request->get('search')}%")
                                ->orWhere('phone', 'LIKE', "%{$request->get('search')}%");
                        });
                    });
                }
            })->orderBy('id', 'desc')->paginate(20)
        ]);
    }

    /**
     * @return array|Factory|Application|View|mixed
     */
    public function create()
    {
        return view('admin.doctors.create', ['page_title' => 'Добавление доктора']);
    }

    /**
     * @param DoctorRequest $request
     * @return RedirectResponse
     */
    public function store(DoctorRequest $request): RedirectResponse
    {
        $doctor = Doctor::query()->create($request->except(['clinics', 'specializations']));
        $doctor->clinics()->sync($request->get('clinics'));
        $doctor->specialisations()->sync($request->get('specializations'));

        return redirect()->route('admin.doctors.index')->with('success', 'Доктор успешно добавлен!');
    }

    /**
     * @param $id
     * @return array|Factory|Application|View|mixed
     */
    public function edit($id)
    {
        return view('admin.doctors.edit', [
            'page_title' => 'Редактирование доктора',
            'instance'   => Doctor::query()->with('clinics')->findOrFail($id),
        ]);
    }

    /**
     * @param DoctorRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(DoctorRequest $request, $id): RedirectResponse
    {
        ($doctor = Doctor::query()->findOrFail($id))->update($request->except(['clinics', 'specializations']));
        $doctor->clinics()->sync($request->get('clinics'));
        $doctor->specialisations()->sync($request->get('specializations'));

        return back()->with('success', 'Сохранено!');
    }


}
