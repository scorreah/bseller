<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\BidRule;
use Illuminate\Http\Request;

class BidController extends Controller
{
    protected $fillable = ['id', 'user_id', 'price'];
    public function store(string $id, $user_id, $price)
    {
        $bidRule = BidRule::findOrFail($id);

        $bid = new Bid;
        $bid->user_id = $user_id;
        $bid->price = $price;

        $bidRule->bids()->save($bid);
 
        $bid->save();
        $bidRule->save();

        return redirect()->route('bid.show', ['id' => $bidRule ->$id]);
    }
}
