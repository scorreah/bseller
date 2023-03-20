<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Order - BSeller';

        return view('order.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create - BSeller';

        return view('order.create')->with('viewData', $viewData);
    }

    public function store(Request $request): RedirectResponse
    {
        // Validate data before store
        Order::validate($request);

        // Create new Order instance with form data
        $order = new Order;
        $order->setTotalPrice($request->input('total_price'));
        $order->setStatus($request->input('status'));

        // Save new Order to database
        $order->save();

        // Flash success message to the session
        session()->flash('status', 'Order created successfully');

        // Redirect to the new Order's detail page
        return redirect()->route('order.show', ['id' => $order->id]);
    }

    public function list()
    {
        $viewData = [];
        $viewData['title'] = 'List Orders - BSeller';
        $viewData['orders'] = Order::all();

        return view('order.list')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $viewData['title'] = 'Show Orders - BSeller';
        $viewData['orders'] = Order::findOrFail($id);

        return view('order.show')->with('viewData', $viewData);
    }

    public function delete(Order $order): RedirectResponse
    {
        Order::destroy($order->id);

        // Flash success message to the session
        session()->flash('status', 'Order deleted successfully');

        $order->delete();

        return redirect()->route('order.list');
    }
}
