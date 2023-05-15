<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LangController extends Controller
{
    public function locale(Request $request): RedirectResponse
    {
        app()->setLocale($request['locale']);
        session()->put('locale', $request['locale']);

        return redirect()->back();
    }
}
