<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Http\Requests\OrderGetRequest;
Use App\Http\Requests\OrderListRequest;

class OrderController extends Controller
{

    /**
     * @param Request $request
     * @return Order[]|\Illuminate\Database\Eloquent\Collection
     */

    public function list(OrderListRequest $request)
    {
        if ($request->search_id) {
            $data = Order::with('translate')->where([
                ['date', '>=', $request->from],
                ['date', '<=', $request->to],
                'id_order' => $request->search_id
            ])->get();
        } elseif ($request->search) {
            $data = Order::with('translate')->where([
                ['date', '>=', $request->from],
                ['date', '<=', $request->to],
                ['title', 'LIKE', "%{$request->get('search')}%"]
            ])->get();
        } else {
            $data = Order::with('translates')->where([
                ['date', '>=', $request->from],
                ['date', '<=', $request->to],
            ])->get();
        }

        return $data;
    }

    /**
     * @param OrderGetRequest $request
     * @return mixed
     */

    public function get(OrderGetRequest $request)
    {
        return Order::find($request->id);
    }
}
