<?php

namespace App\Http\Controllers;

use App\Models\Shoe;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShoeController extends Controller
{
    public function index(Request $request): View
    {
        $viewData = [];
        $viewData['title'] = __('shoes.products') . ' - Bseller';

        // Retrieve a list of all the unique brands
        $viewData['brands'] = Shoe::pluck('brand')->unique();

        // Create a new query to retrieve shoes
        $shoes = Shoe::query();

        // filter by brand
        if ($request->has('brand') and $request->brand != null) {
            $shoes->where('brand', $request->brand);
        }

        // filter by is_bid
        if ($request->has('is_bid') and $request->is_bid != null) {
            $shoes->where('is_bid', $request->is_bid);
        }

        // search for model or brand
        if ($request->has('q') and $request->q != null) {
            $searchTerm = $request->q;
            $shoes->where(function ($query) use ($searchTerm) {
                $query->where('model', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('brand', 'LIKE', "%{$searchTerm}%");
            });
        }

        // Execute the resulting query
        $viewData['shoes'] = $shoes->get();

        return view('shoe.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $shoeInfo = Shoe::findOrFail($id);
        $viewData['title'] = __('shoes.products') . ' - Bseller';
        $viewData['shoe'] = $shoeInfo;

        return view('shoe.show')->with('viewData', $viewData);
    }
}
