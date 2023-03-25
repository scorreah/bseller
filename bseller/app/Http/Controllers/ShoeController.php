<?php

namespace App\Http\Controllers;

use App\Interfaces\ImageStorage;
use App\Models\Shoe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShoeController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products - Bseller';
        $viewData['shoes'] = Shoe::all();

        /*if ($filter) {
            $viewData['shoes']->where('type', $filter);
        }*/

        return view('shoe.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $shoeInfo = Shoe::findOrFail($id);
        $viewData['title'] = 'Products - Bseller';
        $viewData['shoe'] = $shoeInfo;

        return view('shoe.show')->with('viewData', $viewData);
    }

}
