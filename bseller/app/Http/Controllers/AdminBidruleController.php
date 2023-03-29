<?php

namespace App\Http\Controllers;

use App\Models\BidRule;
use App\Models\Shoe;
use DateTime;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminBidRuleController extends Controller
{
    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create Bid - BSeller';
        $viewData['shoes'] = Shoe::where('is_bid', false)->get();

        return view('admin.bidCreate')->with('viewData', $viewData);
    }

    public function store(Request $request): RedirectResponse
    {
        // Validate data before store
        BidRule::validate($request);

        // Create new BidRule instance with form data
        $bidRule = new BidRule;
        $bidRule->setInitialPrice($request->input('initial_price'));
        $bidRule->setCurrentPrice($request->input('current_price'));
        $bidRule->setStatus($request->input('status'));
        $bidRule->setStartDate(new DateTime($request->input('start_date')));
        $bidRule->setEndDate(new DateTime($request->input('end_date')));

        // Get the selected shoe ID from the form data
        $shoeId = $request->input('shoe_id');

        // Set shoe to bid rule
        $bidRule->setShoeId($shoeId);

        // Save new BidRule to database
        $bidRule->save();

        $shoe = Shoe::findOrFail($shoeId);
        $shoe->setIsBid(TRUE);
        $shoe->save();

        // Flash success message to the session
        session()->flash('status', 'Bid Rule created successfully.');

        // Redirect to the new BidRule's detail page
        return redirect()->route('admin.bidShow', ['id' => $bidRule->id]);
    }

    public function list(): View
    {
        $viewData = [];
        $viewData['title'] = 'List Bids - BSeller';
        $viewData['bids'] = BidRule::all();

        return view('admin.bidList')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $viewData['title'] = 'Show Bid - BSeller';
        $bid = BidRule::findOrFail($id);
        $viewData['bid'] = $bid;
        $viewData['min_price'] = $bid->getCurrentPrice() + 1;

        return view('admin.bidShow')->with('viewData', $viewData);
    }

    public function delete(int $id): RedirectResponse
    {
        BidRule::destroy($id);

        // Flash success message to the session
        session()->flash('status', 'Bid deleted successfully');

        return redirect()->route('admin.bidList');
    }
}
