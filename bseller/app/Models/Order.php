<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\User;
use App\Models\Shoe;

class Order extends Model
{
    use HasFactory;

    /**
     * Orders ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['total_price'] - int - contains the initial price
     * $this->attributes['status'] - string - contains the status of the order
     * $this->user - User - contains the associated User model
     * $this->shoes - Shoe[] - contains the associated Shoe model
     */
    protected $fillable = ['total_price', 'status', 'user_id'];

    public static function validate(Request $request): void
    {
        $request->validate([
            'total_price' => 'required|integer',
            'status' => 'required|string',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getTotalPrice(): int
    {
        return $this->attributes['total_price'];
    }

    public function setTotalPrice(int $price): void
    {
        $this->attributes['total_price'] = $price;
    }

    public function getStatus(): string
    {
        return $this->attributes['status'];
    }

    public function setStatus(string $status): void
    {
        $this->attributes['status'] = $status;
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

    public function shoes(): HasMany
    {
        return $this->hasMany(Shoe::class);
    }

    public function getShoes(): Collection
    {
        return $this->shoes;
    }

    public function setShoes(Collection $shoes): void
    {
        $this->shoes = $shoes;
    }

}
