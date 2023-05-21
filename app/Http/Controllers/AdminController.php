<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\User;
use App\Models\Shoe;

class AdminController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('admin.admin_dashboard') . ' - Bseller';

        // Count the number of users and shoes
        $viewData['numUsers'] = User::count();
        $viewData['numShoes'] = Shoe::count();

        return view('admin.dashboard')->with('viewData', $viewData);
    }
}
