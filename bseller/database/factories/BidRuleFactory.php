<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BidRule>
 */
class BidRuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = Carbon::now()->addDays($this->faker->numberBetween(1, 10));
        $end = $start->copy()->addDays($this->faker->numberBetween(1, 10));
        $initial = $this->faker->numberBetween(10, 100);
        $current = $initial + $this->faker->numberBetween(10, 100);

        return [
            'initial_price' => $initial,
            'current_price' => $current,
            'status' => $this->faker->randomElement(['active', 'closed']),
            'start_date' => $start,
            'end_date' => $end,
        ];
    }
}
