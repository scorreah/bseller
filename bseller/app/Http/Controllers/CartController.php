<?php

namespace App\Http\Controllers;

use App\Models\Shoe; 
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller 
{
    public function index(Request $request) 
    {
        $total = 0; 
        $shoesInCart = [];

        $shoesInSession = $request->session()->get("shoes"); 
        if ($shoesInSession) { 
            $shoesInCart = Shoe::findMany(array_keys($shoesInSession)); 
            $total = Shoe::sumPrices($shoesInCart);
        }
        $viewData = []; 
        $viewData["title"] = "Cart - Online Store"; 
        $viewData["subtitle"] = "Shopping Cart"; 
        $viewData["total"] = $total; 
        $viewData["shoes"] = $shoesInCart; 
        return view('cart.index')->with("viewData", $viewData);
    }

    public function add(Request $request, $id)
    {
        $shoes = $request->session()->get("shoes");
        $shoe = Shoe::FindOrFail($id);

        if($shoe->getOrderId()!=null){
            return redirect()->route('shoe.index')->withInput()->withErrors(['Invalid' => 'This shoe doesnt be available']);
        }

        $shoes[$id] = $id; 
        $request->session()->put('shoes', $shoes); 
        return redirect()->route('cart.index');
    }

    public function delete(Request $request) 
    { 
        $request->session()->forget('shoes'); 
        return back(); 
    }

    public function purchase(Request $request)
    {
        $shoesInSession = $request->session()->get("shoes"); 
        if ($shoesInSession) { 
            $shoesInCart = Shoe::findMany(array_keys($shoesInSession)); 
            $total = Shoe::sumPrices($shoesInCart);
            $newBalance = Auth::user()->getBalance() - $total;
            if($newBalance<0){
                return redirect()->route('cart.index')->withInput()->withErrors(['Credits' => 'You dont have enough credits']);
            }

            $userId = Auth::user()->getId();
            $order = new Order();
            $order->setUserId($userId);
            $order->setTotalPrice($total);
            $order->setStatus('paid');
            $order->save();

            foreach($shoesInCart as $shoe){
                $shoe->setOrderId($order->getId());
                $shoe->save();
            }
            
            Auth::user()->setBalance($newBalance);
            Auth::user()->save();
            $request->session()->forget('shoes');
            session()->flash('status', 'Order created successfully');
            return redirect()->route('order.list'); 
        } else {
            return redirect()->route('cart.index')->withInput()->withErrors(['elements' => 'You dont have any shoe']);
        }
    }
}