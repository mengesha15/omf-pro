<?php

namespace Database\Factories;

use App\Models\LoanService;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoanServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LoanService::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'loan_service_name'=>$this->faker->sentence(3),
            'loan_service_description'=>$this->faker->sentence(9),
            'loan_service_interest_rate'=>$this->faker->randomFloat(2,8,17),
        ];
    }
}
