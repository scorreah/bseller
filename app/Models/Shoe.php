<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\BidRule;

class Shoe extends Model
{
    use HasFactory;

    /**
     * SHOE ATTRIBUTES
     * $this->attributes['id'] - int - contains the shoe primary key (id)
     * $this->attributes['price'] - int - contains the shoe price
     * $this->attributes['image'] - string - contains the path to the shoe image
     * $this->attributes['size'] - float - contains the size of the shoe
     * $this->attributes['brand'] - string - contains the shoe brand
     * $this->attributes['model'] - string - contains the shoe model
     * $this->attributes['is_bid'] - boolean - indicates if the shoe is bidable
     * $this->attributes['created_at'] - DateTime - contains the day of the creation
     * $this->attributes['updated_at'] - DateTime - contains the day of the update
     * $this->attributes['order_id'] - int - contains the id associated Order model
     * $this->order - Order - contains the associated Order model
     * $this->user - User[] - contains the associated User model
     * $this->bidRule - BidRule - contains the associated BidRule model
     */
    protected $fillable = ['price', 'image', 'size', 'brand', 'model'];

    public static function validate(Request $request): array
    {
        $validatedData = $request->validate([
            'price' => 'required|numeric|min:0',
            'size' => 'required|numeric|min:4',
            'brand' => 'required|string',
            'model' => 'required|string',
            'image_shoe' => 'required|image',
        ]);

        return $validatedData;
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getSize(): float
    {
        return $this->attributes['size'];
    }

    public function setSize(float $size): void
    {
        $this->attributes['size'] = $size;
    }

    public function getBrand(): string
    {
        return $this->attributes['brand'];
    }

    public function setBrand(string $brand): void
    {
        $this->attributes['brand'] = $brand;
    }

    public function getModel(): string
    {
        return $this->attributes['model'];
    }

    public function setModel(string $model): void
    {
        $this->attributes['model'] = $model;
    }

    public function getIsBid(): bool
    {
        return $this->attributes['is_bid'];
    }

    public function setIsBid(bool $is_bid): void
    {
        $this->attributes['is_bid'] = $is_bid;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function bidRule(): BelongsTo
    {
        return $this->belongsTo(BidRule::class);
    }

    public function getBidRule(): BidRule
    {
        return $this->bidRule;
    }

    public function setBidRule(BidRule $bidRule)
    {
        $this->bidRule = $bidRule;
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function getOrderId(): int|null
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId(int $order_id): void
    {
        $this->attributes['order_id'] = $order_id;
    }

    public static function sumPrices($shoesInCart)
    {
        $total = 0;
        foreach ($shoesInCart as $shoe) {
            $total = $total + $shoe->getPrice();
        }
        return $total;
    }
}
