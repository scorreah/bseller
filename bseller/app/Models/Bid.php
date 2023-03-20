<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Bid extends Model
{
    use HasFactory;

    /**
     * BID ATTRIBUTES
     * $this->attributes['id'] - int - contains the primary key (id) of the bid
     * $this->attributes['price'] - int - contains the price of the bid
     */
    protected $fillable = ['price'];

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

    public function setUser(User $user)
    {
        $this->user = $user;
    }
}
