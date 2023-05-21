<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\BidRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BidController extends Controller
{
    public function store(Request $request, $id): View
    {
        $bidRule = BidRule::findOrFail($id);
        $bid = new Bid;
        Bid::validate($request);
        $userPrice = $request->input('price');

        if ($userPrice > $bidRule->getCurrentPrice()) {
            $bidRule->setCurrentPrice($userPrice);
            $userId = Auth::user()->getId();
            $bid->setUserId($userId);
            $bid->setPrice($userPrice);
            $bid->setBidRuleId($bidRule->getId());
            $bid->save();
            $bidRule->save();

            session()->flash('status', 'bid created successfully');

            return back();
        }

        return back()->withInput()->withErrors(['bid' => 'You cant make a bid, you dont got money']);
    }
}
