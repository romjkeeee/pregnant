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
        return Order::where([
            ['date', '>=', $request->from],
            ['date', '<=', $request->to],
        ])->get();
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
