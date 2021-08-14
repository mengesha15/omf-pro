<?php

namespace Database\Factories;

use App\Models\RequestedLoan;
use Illuminate\Database\Eloquent\Factories\Factory;

class RequestedLoanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RequestedLoan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'requested_amount' =>$this->faker->randomFloat(2,25,10000000),
        ];
    }
}
