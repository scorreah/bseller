<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Bid;
use App\Models\BidRule;
use App\Models\Order;
use App\Models\Shoe;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        BidRule::factory(5)->create();
        Shoe::factory(8)->create();
        Order::factory(5)->create();
        Bid::factory()->count(20)->create();
    }
}
