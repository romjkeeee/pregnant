<?php

namespace App\Http\Controllers\Admin;

use App\Doctor;
use App\Http\Requests\Admin\DoctorRequest;
use App\Http\Requests\Admin\SliderRequest;
use App\Slider;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class SliderController extends Controller
{
    /**
     * @param Request $request
     * @return array|Factory|Application|View|mixed
     */
    public function index(Request $request)
    {
        return view('admin.slider.index', [
            'page_title' => 'Слайдер',
            'search'     => $request->get('search'),
            'items'      => Slider::query()->orderBy('id', 'desc')->paginate(20)
        ]);
    }

    /**
     * @return array|Factory|Application|View|mixed
     */
    public function create()
    {
        return view('admin.slider.create', ['page_title' => 'Добавление картинки']);
    }

    /**
     * @param SliderRequest $request
     * @return RedirectResponse
     */
    public function store(SliderRequest $request): RedirectResponse
    {
        Slider::query()->create($request->validated());

        return redirect()->route('admin.slider.index')->with('success', 'Картинка успешно добавлена!');
    }

    /**
     * @param $id
     * @return array|Factory|Application|View|mixed
     */
    public function edit($id)
    {
        return view('admin.slider.edit', [
            'page_title' => 'Обновление картинки',
            'instance'   => Slider::query()->findOrFail($id),
        ]);
    }

    /**
     * @param SliderRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(SliderRequest $request, $id): RedirectResponse
    {
        (Slider::query()->findOrFail($id))->update($request->validated());

        return back()->with('success', 'Сохранено!');
    }
}
