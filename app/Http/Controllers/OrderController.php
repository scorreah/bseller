<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Shoe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['orders'] = Auth::user()->getOrders();
        $viewData['title'] = __('orders.order') . ' - Bseller';

        return view('order.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $viewData['title'] = __('orders.show_orders') . ' - Bseller';
        $viewData['orders'] = Order::findOrFail($id);

        return view('order.show')->with('viewData', $viewData);
    }

    public function downloadPdf($id)
    {
        $viewData = [];
        $order = Order::findOrFail($id);
        $shoes = $order->getShoes();
        $amount = 0;
        foreach ( $shoes as $shoe ){
            $amount = $amount + $shoe->getPrice();
        }
        $viewData["amount"] = $amount;
        $viewData["order"] = $order;
        $viewData["title"] = "Bseller";
        $viewData["shoes"] = $shoes;
        $viewData["date"] = date("d-m-Y h:i:s");
        $name = 'pdf-order-'.$order->getId().'.pdf';
        $pdf = Pdf::loadView('layouts.pdf', compact('viewData'));

        return $pdf->download($name);
    }
}
