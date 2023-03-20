<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ShoeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'price' => $this->faker->numberBetween($min = 200, $max = 1000),
            'image' => $this->faker->randomElement($array = ['air_force.jpg', 'dunk_pandas.jpg', 'forum_low.jpg', 'new_550.jpg', 'supercourt.jpg']),
            'size' => $this->faker->numberBetween($min = 5, $max = 13),
            'brand' => $this->faker->randomElement($array = ['nike', 'adidas', 'new balance']),
            'model' => $this->faker->randomElement($array = ['dunk', 'air', '550', '650', 'continental', 'supercout', 'forum']),
        ];
    }
}
