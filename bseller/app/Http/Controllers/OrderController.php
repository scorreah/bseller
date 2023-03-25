<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['orders'] = Auth::user()->getOrders();
        $viewData['title'] = 'Order - BSeller';

        return view('order.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $viewData['title'] = 'Show Orders - BSeller';
        $viewData['orders'] = Order::findOrFail($id);

        return view('order.show')->with('viewData', $viewData);
    }
}
