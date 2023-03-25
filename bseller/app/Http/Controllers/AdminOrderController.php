<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AdminOrderController extends Controller
{
    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create - BSeller';

        return view('admin.orderCreate')->with('viewData', $viewData);
    }

    public function store(Request $request): RedirectResponse
    {
        Order::validate($request);

        $order = new Order;
        $userId = Auth::user()->getId();
        $order->setUserId($userId);
        $order->setTotalPrice($request->input('total_price'));
        $order->setStatus($request->input('status'));
        $order->save();

        session()->flash('status', 'Order created successfully');
        return redirect()->route('admin.orderShow', ['id' => $order->id]);
    }

    public function list()
    {
        $viewData = [];
        $viewData['title'] = 'List Orders - BSeller';
        $viewData['orders'] = Order::all();

        return view('admin.orderList')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $viewData['title'] = 'Show Orders - BSeller';
        $viewData['orders'] = Order::findOrFail($id);

        return view('admin.orderShow')->with('viewData', $viewData);
    }

    public function delete(Order $order): RedirectResponse
    {
        Order::destroy($order->id);

        // Flash success message to the session
        session()->flash('status', 'Order deleted successfully');

        $order->delete();

        return redirect()->route('admin.orderList');
    }
}
