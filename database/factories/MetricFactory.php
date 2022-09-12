<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MetricFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'term'             => $this->faker->words(3, true),
            'notion'           => $this->faker->words(3, true),
            'impact'           => $this->faker->words(3, true),
            // 'synonymous'       => Metric::inRandomOrder()->limit(1)->first(),
            'source'           => $this->faker->words(3, true),
            'type'             => $this->faker->words(3, true),
            'format'           => $this->faker->words(3, true),
            'indicator_type'   => $this->faker->words(3, true),
            'how_to_calculate' => $this->faker->words(3, true),
            'how_to_analyze'   => $this->faker->words(3, true),
        ];
    }
}
