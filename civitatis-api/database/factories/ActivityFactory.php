<?php

namespace Database\Factories;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Activity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Random datetime this week 
        $startingDate = $this->faker->dateTimeBetween('this week', '+6 days');
        // Random datetime of the current week *after* `$startingDate`
        $endingDate   = $this->faker->dateTimeBetween($startingDate, strtotime('+6 days'));
        return [
            'title' => $this->faker->sentence(2),
            'description' => $this->faker->paragraph(),
            'start_date' => $startingDate,
            'end_date' => $endingDate,
            'price' => $this->faker->numberBetween(1,150),
        ];
    }
}
