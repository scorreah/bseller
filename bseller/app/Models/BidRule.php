<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
     */
    protected $fillable = ['initial_price', 'current_price', 'status', 'start_date', 'end_date'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId($id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getInitialPrice(): int
    {
        return $this->attributes['initial_price'];
    }

    public function setInitialPrice($price): void
    {
        $this->attributes['initial_price'] = $price;
    }

    public function getCurrentPrice(): int
    {
        return $this->attributes['current_price'];
    }

    public function setCurrentPrice($price): void
    {
        $this->attributes['current_price'] = $price;
    }

    public function getStatus(): string
    {
        return $this->attributes['status'];
    }

    public function setStatus($status): void
    {
        $this->attributes['status'] = $status;
    }

    public function getStartDate(): DateTime
    {
        return $this->attributes['start_date'];
    }

    public function setStartDate(DateTime $date): void
    {
        $this->attributes['start_date'] = $date;
    }

    public function getEndDate(): DateTime
    {
        return $this->attributes['end_date'];
    }

    public function setEndDate(DateTime $date): void
    {
        $this->attributes['end_date'] = $date;
    }
}
