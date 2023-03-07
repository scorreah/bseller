<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class OrdersController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Order - BSeller";

        return view('orders.index')->with("viewData", $viewData);
    }
    public function create(): View
    {
        $viewData = [];
        $viewData["title"] = "Create - BSeller";

        return view('orders.create')->with("viewData", $viewData);
    }
    public function store(Request $request): RedirectResponse
    {
        //Valida los datos antes de guardarlos
        $validateData = $request->validate([
            'total_price' => 'required|integer',
            'status' => 'required|string',
        ]);
        
        //Crea un una nueva instancia order con el form data
        $order = new Order;
        $order->setTotal_price = $validateData['total_price'];
        $order->setStatus = $validateData['status'];


        // Guarda en el database
        $order->save();

        //Mensaje de que se creo bien la orden
        session()->flash('status', 'Order created successfully');

        //Redirecciona a la nueva pagina de order
        return redirect()->route('orders.show', ['id' => $order->id]);

    }
    public function list()
    {
        $viewData = [];
        $viewData["title"] = "list Orders - BSeller";
        $viewData["orders"] = Order::all();

        return view('orders.list')->with('viewData', $viewData);
        
    }
    public function show(string $id): View
    {
        $viewData = [];
        $viewData["title"] = "show orders - BSeller";
        $viewData["orders"] = Order::findOrFail($id);

        return view('orders.show')->with('viewData', $viewData);
    }


    public function delete(Order $order): RedirectResponse
    {
        Order::destroy($order->id);

        //Mensaje de que se elimino la orden
        session()->flash('status', 'Order deleted successfully');

        $order->delete();

        return redirect()->route('orders.list');
    }

}
