<?php

namespace App\Http\Controllers;

use App\Models\Shoe; 
use Illuminate\Http\Request;

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
        $shoes[$id] = $id; 
        $request->session()->put('shoes', $shoes); 

        return redirect()->route('cart.index');
    }

    public function delete(Request $request) 
    { 
        $request->session()->forget('shoes'); 
        return back(); 
    }
}