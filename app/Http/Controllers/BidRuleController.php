<?php

namespace App\Http\Controllers;

use App\Models\BidRule;
use Illuminate\View\View;

class BidRuleController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('bids.bid_page') . ' - Bseller';
        $viewData['bids'] = BidRule::all();

        return view('bid.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $viewData['title'] = __('bids.show_page') . ' - Bseller';
        $bid = BidRule::findOrFail($id);
        $viewData['bid'] = $bid;
        $viewData['min_price'] = $bid->getCurrentPrice() + 1;

        return view('bid.show')->with('viewData', $viewData);
    }
}
