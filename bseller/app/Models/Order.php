<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    /**
     * Get the order id
     */
    public function getId(): int
    {
        return $this->attributes['id'];
    }

    /**
     * Set the order id
     */
    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    /**
     * Get the total price of the order
     */
    public function getTotalPrice(): int
    {
        return $this->attributes['total_price'];
    }

    /**
     * Set the total price of the order
     */
    public function setTotalPrice(int $price): void
    {
        $this->attributes['total_price'] = $price;
    }

    /**
     * Get the status of the order
     */
    public function getStatus(): string
    {
        return $this->attributes['status'];
    }

    /**
     * Set the status of the order
     */
    public function setStatus(string $status): void
    {
        $this->attributes['status'] = $status;
    }
    
}
