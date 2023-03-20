<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Shoe;
use App\Models\BidRule;
use App\Models\Order;
use App\Models\Bid;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /*** USER ATTRIBUTES
     * $this->attributes['id'] -int -contains the user primary key (id)
     * $this->attributes['name'] -string -contains the user name
     * $this->attributes['email'] -string -contains the user email
     * $this->attributes['email_verified_at'] -timestamp -contains the user email verification date
     * $this->attributes['password'] -string -contains the user password
     * $this->attributes['remember_token'] -string -contains the user password
     * $this->attributes['isAdmin'] -boolean -determines if the user is an admin
     * $this->attributes['balance'] -int -contains the user balance
     * $this->attributes['created_at'] -timestamp -contains the user creation date
     * $this->attributes['updated_at'] -timestamp -contains the user update date
    */

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'balance',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id)
    {
        $this->attributes['id'] = $id;
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name)
    {
        $this->attributes['name'] = $name;
    }

    public function getEmail(): string
    {
        return $this->attributes['email'];
    }

    public function setEmail(string $email)
    {
        $this->attributes['email'] = $email;
    }

    public function getPassword(): string
    {
        return $this->attributes['password'];
    }

    public function setPassword(string $password)
    {
        $this->attributes['password'] = $password;
    }

    public function getIsAdmin(): bool
    {
        return $this->attributes['isAdmin'];
    }

    public function setIsAdmin(bool $isAdmin)
    {
        $this->attributes['isAdmin'] = $isAdmin;
    }

    public function getBalance(): int
    {
        return $this->attributes['balance'];
    }

    public function setBalance(int $balance){
        $this->attributes['balance'] = $balance;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function winBids(): HasMany
    {
        return this->hasMany(BidRule::class);
    }

    public function getWinBids(): Collection
    {
        return $this->winBids;
    }

    public function setWinBids(Collection $winBids): void
    {
        $this->winBids = $winBids;
    }

    public function orders(): HasMany
    {
        return this->hasMany(Order::class);
    }

    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function setOrders(Collection $orders): void
    {
        $this->orders = $orders;
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
