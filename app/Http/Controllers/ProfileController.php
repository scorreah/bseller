<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Profile - Bseller';

        return view('profile.index')->with('viewData', $viewData);
    }

    public function show(): View
    {
        $viewData = [];
        
        $name = Auth::user()->getName();
        $email = Auth::user()->getEmail();
        $balance = Auth::user()->getBalance();
        
        $viewData['name']= $name;
        $viewData['email']= $email;
        $viewData['balance']= $balance;


        return view('profile.show')->with('viewData', $viewData);

    }
}
