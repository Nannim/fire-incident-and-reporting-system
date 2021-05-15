<?php

namespace Database\Factories;

use App\Models\Response;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ResponseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Response::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail,
            'mobile' => $this->faker->unique(),
            'description' => $this->faker->paragraph(),
            'responsetime'=>$this->faker->unique(),
            'occupation'=>$this->faker->unique(),
            'remember_token' => Str::random(10),
            ];
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
//    protected static function factory()
//    {
//        return ResponseFactory::new();
//    }
}
