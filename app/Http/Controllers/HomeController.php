<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('home.home_page') . ' - Bseller';

        return view('home.index')->with('viewData', $viewData);
    }
}
