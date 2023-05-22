<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class ExternalApiController extends Controller
{
    public function show(): View
    {
        $items = Http::get('http://34.69.123.204/public/api/service/products');
        $items = $items->json();
        //dd($items);
        return view('api.external')->with('viewData', $items);
    }
}
