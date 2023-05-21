<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminOrderController extends Controller
{
    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = __('orders.create') . ' - BSeller';

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

        session()->flash('status', __('orders.success_create'));

        return redirect()->route('admin.orderShow', ['id' => $order->id]);
    }

    public function list()
    {
        $viewData = [];
        $viewData['title'] = __('orders.list_order') . ' - BSeller';
        $viewData['orders'] = Order::all();

        return view('admin.orderList')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $viewData['title'] = __('orders.show') . ' - BSeller';
        $viewData['orders'] = Order::findOrFail($id);

        return view('admin.orderShow')->with('viewData', $viewData);
    }

    public function delete(Order $order): RedirectResponse
    {
        Order::destroy($order->id);

        // Flash success message to the session
        session()->flash('status', __('orders.success_delete'));

        $order->delete();

        return redirect()->route('admin.orderList');
    }
}
