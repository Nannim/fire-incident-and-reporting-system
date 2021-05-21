<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Reports;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reports::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'level' => $this->faker->name(),
            'description' => $this->faker->address(),
            'autocomplete' => $this->faker->cityPrefix(),
            'longitude' => $this->faker->longitude($min = -180, $max = 180),
            'latitude' => $this->faker->latitude($min = -90, $max = 90),
            'time' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'user_id' => $this->faker->numberBetween($min = 1, $max = 50)
        ];
    }
}
