<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //assoziatives Array hier
            'title'=>$this->faker->sentence($nbWords=4, $variableNbWords=true),
            'band'=>$this->faker->sentence($nbWords=2, $variableNbWords=true)
        ];
    }
}
