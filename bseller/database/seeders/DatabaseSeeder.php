<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\BidRule;
use Illuminate\Database\Seeder;
use App\Models\Shoe;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        BidRule::factory(5)->create();
        Shoe::factory(8)->create();
    }
}
