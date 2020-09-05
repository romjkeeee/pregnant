<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\TranslateRequest;
use App\Tech;
use App\Translate;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class TechController extends Controller
{
    /**
     * @param Request $request
     * @return array|Factory|Application|View|mixed
     */
    public function index(Request $request)
    {
        return view('admin.tech.index', [
            'page_title' => 'Запросы в тех пооддержку',
            'search'     => $request->get('search'),
            'items' => Tech::query()->where(function (Builder $builder) use ($request) {
                if ($request->get('search')) {
                    $builder->where('text', 'LIKE', "%{$request->get('search')}%");
                }
            })->orderBy('id')->paginate(20)
        ]);
    }

    /**
     * @param $id
     * @return array|Factory|Application|View|mixed
     */
    public function edit($id)
    {
        return view('admin.tech.edit', [
            'page_title' => 'Просмотр запроса в тех. поддержку',
            'instance'   => Tech::query()->findOrFail($id),
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */

    public function update(Request $request, $id): RedirectResponse
    {
        /** @var Translate $translate */
        $translate = Tech::query()->findOrFail($id)->update([
            'check' => $request->check
        ]);

        return back()->with('success', 'Сохранено!');
    }
}
