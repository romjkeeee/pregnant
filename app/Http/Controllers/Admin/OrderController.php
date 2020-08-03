<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.orders.index', [
            'page_title' => 'Приказы',
            'items' => Order::query()->orderBy('id', 'desc')->paginate(20)
        ]);
    }
}
