<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BidRule;
use App\Models\Shoe;
use App\Models\Orders;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        BidRule::factory(5)->create();
        Shoe::factory(8)->create();
        Orders::factory(5)->create();

    }
}
