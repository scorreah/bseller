<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use DateTime;
use App\Models\User;
use App\Models\Shoe;
use App\Models\Bid;

class BidRule extends Model
{
    use HasFactory;

    /**
     * BIDRULE ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['initial_price'] - int - contains the initial price of the bid rule
     * $this->attributes['current_price'] - int - contains the current price of the bid rule
     * $this->attributes['status'] - string - contains the current status of the bid rule
     * $this->attributes['start_date'] - dateTime - contains the starting date of the bid rule
     * $this->attributes['end_date'] - dateTime - contains the ending date of the bid rule
     * $this->user - User - contains the associated User model
     * $this->shoe - Shoe - contains the associated Shoe model
     * $this->bids - Bid[] - contains the associated Bid model
     */
    protected $fillable = ['initial_price', 'current_price', 'status', 'start_date', 'end_date', 'shoe_id', 'user_id'];

    public static function validate(Request $request): void
    {
        $request->validate([
            'initial_price' => 'required|integer|min:0',
            'current_price' => 'required|integer|gte:initial_price',
            'status' => 'required|string',
            'start_date' => 'required|date|after_or_equal:yesterday',
            'end_date' => 'required|date|after:start_date',
            'shoe_id' => 'required|exists:shoes,id',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getInitialPrice(): int
    {
        return $this->attributes['initial_price'];
    }

    public function setInitialPrice(int $price): void
    {
        $this->attributes['initial_price'] = $price;
    }

    public function getCurrentPrice(): int
    {
        return $this->attributes['current_price'];
    }

    public function setCurrentPrice(int $price): void
    {
        $this->attributes['current_price'] = $price;
    }

    public function getStatus(): string
    {
        return $this->attributes['status'];
    }

    public function setStatus(string $status): void
    {
        $this->attributes['status'] = $status;
    }

    public function getStartDate(): string
    {
        return $this->attributes['start_date'];
    }

    public function setStartDate(DateTime $date): void
    {
        $this->attributes['start_date'] = $date;
    }

    public function getEndDate(): string
    {
        return $this->attributes['end_date'];
    }

    public function setEndDate(DateTime $date): void
    {
        $this->attributes['end_date'] = $date;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function lastUser(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getLastUser(): User
    {
        return $this->lastUser;
    }

    public function getLastUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function setLastUserId(int $user_id): void
    {
        $this->attributes['user_id'] = $user_id;
    }

    public function shoe(): HasOne
    {
        return $this->hasOne(Shoe::class);
    }

    public function getShoe(): Shoe
    {
        return $this->shoe;
    }

    public function setShoe(Shoe $shoe): void
    {
        $this->shoe = $shoe;
    }

    public function getShoeId(): int
    {
        return $this->attributes['shoe_id'];
    }

    public function setShoeId(int $shoe_id): void
    {
        $this->attributes['shoe_id'] = $shoe_id;
    }

    public function bids(): HasMany
    {
        return this->hasMany(Bid::class);
    }

    public function getBids(): Collection
    {
        return $this->bids;
    }

    public function setBids(Collection $bids): void
    {
        $this->bids = $bids;
    }
}
