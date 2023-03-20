<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Order extends Model
{
    use HasFactory;

    /**
     * Orders ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['total_price'] - int - contains the initial price
     * $this->attributes['status'] - string - contains the status of the order
     */
    protected $fillable = ['total_price', 'status'];

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
}
