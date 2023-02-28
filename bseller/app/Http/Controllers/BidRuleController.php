<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\BidRule;
use Illuminate\Http\RedirectResponse;

class BidRuleController extends Controller
{
    // Method for rendering index page
    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Bid Page - BSeller";

        return view('bid.index')->with("viewData", $viewData);
    }

    // Method for rendering create page
    public function create(): View
    {
        $viewData = [];
        $viewData["title"] = "Create Bid - BSeller";

        return view('bid.create')->with("viewData", $viewData);
    }

    // Method for storing new BidRule
    public function store(Request $request): RedirectResponse
    {
        // Validate data before store
        $validatedData = $request->validate([
            'initial_price' => 'required|integer|min:0',
            'current_price' => 'required|integer|gte:initial_price',
            'status' => 'required|string',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        // Create new BidRule instance with form data
        $bidRule = new BidRule;
        $bidRule->initial_price = $validatedData['initial_price'];
        $bidRule->current_price = $validatedData['current_price'];
        $bidRule->status = $validatedData['status'];
        $bidRule->start_date = $validatedData['start_date'];
        $bidRule->end_date = $validatedData['end_date'];

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
        $viewData["title"] = "List Bids - BSeller";
        $viewData["bids"] = BidRule::all();

        return view('bid.list')->with("viewData", $viewData);
    }

    // Method for rendering bid detail page
    public function show(string $id): View
    {
        $viewData = [];
        $viewData["title"] = "Show Bid - BSeller";
        $viewData["bid"] = BidRule::findOrFail($id);

        return view('bid.show')->with("viewData", $viewData);
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
