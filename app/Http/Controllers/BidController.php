<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\BidRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BidController extends Controller
{
    public function store(Request $request, $id)
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

            session()->flash('status', __('bids.success'));

            return back();
        }

        return back()->withInput()->withErrors(['bid' => __('bids.noMoney')]);
    }
}
