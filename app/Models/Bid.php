<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BidRule;


class Bid extends Model
{
    use HasFactory;

    /**
     * BID ATTRIBUTES
     * $this->attributes['id'] - int - contains the primary key (id) of the bid
     * $this->attributes['price'] - int - contains the price of the bid
     * $this->attributes['user_id'] - int - contains the id associated User model
     * $this->attributes['bid_rule_id'] - int - contains the id associate BidRule model
     * $this->attributes['created_at'] - DateTime - contains the day of the creation
     * $this->attributes['updated_at'] - DateTime - contains the day of the update
     * $this->order - User- contains the associated Order model
     * $this->bidRule - BidRule - contains the associated BidRule model
     */
    protected $fillable = ['price', 'user_id', 'bid_rule_id'];

    public static function validate(Request $request): void
    {
        $request->validate([
            'price' => 'required|integer|min:0',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function setUserId(int $user_id): void
    {
        $this->attributes['user_id'] = $user_id;
    }

    public function bidRule(): BelongsTo
    {
        return $this->belongsTo(BidRule::class);
    }

    public function getBidRule(): BidRule
    {
        return $this->bidRule;
    }

    public function getBidRuleId(): int
    {
        return $this->attributes['bid_rule_id'];
    }

    public function setBidRuleId(int $bid_rule_id): void
    {
        $this->attributes['bid_rule_id'] = $bid_rule_id;
    }
}
