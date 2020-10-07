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
            'items' => Order::query()->when($request->get('search'), function (Builder $article) use ($request) {
                $article->whereHas('translates', function (Builder $builder) use ($request) {
                    $builder->where('name', 'LIKE', "%{$request->get('search')}%");
                });
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
        $order = Order::query()->create($request->validated());
        $order->syncTranslates($request->get('translate'));
        if ($request->file('file')){
            $order->file = env('APP_URL') . $request->file('file')->store('order');
            $order->update();
        }

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
            'instance'   => Order::query()->with('translates')->findOrFail($id),
        ]);
    }

    /**
     * @param AddOrderRequest $request
     * @param $id
     * @return RedirectResponse
     */

    public function update(AddOrderRequest $request, $id): RedirectResponse
    {
        $article = Order::query()->findOrFail($id);
        $article->update($request->validated());
        $article->syncTranslates($request->get('translate'));
        if ($request->file('file')){
            $article->file = env('APP_URL') . $request->file('file')->store('order');
            $article->update();
        }

        return back()->with('success', 'Сохранено!');
    }
}
