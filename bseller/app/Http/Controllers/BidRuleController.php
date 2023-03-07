<?php

namespace App\Http\Controllers;

use App\Models\BidRule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BidRuleController extends Controller
{
    // Method for rendering index page
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Bid Page - BSeller';

        return view('bid.index')->with('viewData', $viewData);
    }

    // Method for rendering create page
    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create Bid - BSeller';

        return view('bid.create')->with('viewData', $viewData);
    }

    // Method for storing new BidRule
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

        // Save new BidRule to database
        $bidRule->save();

        // Flash success message to the session
        session()->flash('status', 'Bid Rule created successfully.');

        // Redirect to the new BidRule's detail page
        return redirect()->route('bid.show', ['id' => $bidRule->id]);
    }

    // Method for rendering bid list page
    public function list(): View
    {
        $viewData = [];
        $viewData['title'] = 'List Bids - BSeller';
        $viewData['bids'] = BidRule::all();

        return view('bid.list')->with('viewData', $viewData);
    }

    // Method for rendering bid detail page
    public function show(string $id): View
    {
        $viewData = [];
        $viewData['title'] = 'Show Bid - BSeller';
        $viewData['bid'] = BidRule::findOrFail($id);

        return view('bid.show')->with('viewData', $viewData);
    }

    // Method for deleting a bid
    public function delete(BidRule $bid): RedirectResponse
    {
        BidRule::destroy($bid->id);

        // Flash success message to the session
        session()->flash('status', 'Bid deleted successfully');

        return redirect()->route('bid.list');
    }
}
