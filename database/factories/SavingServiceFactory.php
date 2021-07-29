<?php

namespace Database\Factories;

use App\Models\SavingService;
use Illuminate\Database\Eloquent\Factories\Factory;

class SavingServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SavingService::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'saving_service_name'=>$this->faker->sentence(3),
            'saving_service_description'=>$this->faker->sentence(9),
            'saving_service_interest_rate'=>$this->faker->randomFloat(2,8,17),
        ];
    }
}
