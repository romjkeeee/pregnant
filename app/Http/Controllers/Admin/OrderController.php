<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\AddOrderRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    /**
     * @param Request $request
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View|mixed
     */

    public function index(Request $request)
    {
        return view('admin.orders.index', [
            'page_title' => 'Приказы',
            'search'     => $request->get('search'),
            'items' => Order::query()->where(function (Builder $lang) use ($request) {
                if ($request->get('search')) {
                    $lang->where(function (Builder $builder) use ($request) {
                        $builder->orWhere('title', 'LIKE', "%{$request->get('search')}%");
                    });
                }
            })->orderBy('id', 'desc')->paginate(20)
        ]);
    }

    /**
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View|mixed
     */

    public function create()
    {
        return view('admin.orders.create', ['page_title' => 'Добавление приказа']);
    }

    /**
     * @param AddOrderRequest $request
     * @return RedirectResponse
     */

    public function store(AddOrderRequest $request): RedirectResponse
    {
        Order::query()->create($request->validated());

        return redirect()->route('admin.orders.index')->with('success', 'Приказ успешно добавлен!');
    }

    /**
     * @param $id
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View|mixed
     */

    public function edit($id)
    {
        return view('admin.orders.edit', [
            'page_title' => 'Редактирование Приказа',
            'instance'   => Order::query()->findOrFail($id),
        ]);
    }

    /**
     * @param AddOrderRequest $request
     * @param $id
     * @return RedirectResponse
     */

    public function update(AddOrderRequest $request, $id): RedirectResponse
    {
        Order::query()->findOrFail($id)->update($request->validated());

        return back()->with('success', 'Сохранено!');
    }
}
