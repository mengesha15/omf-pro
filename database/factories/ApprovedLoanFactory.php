<?php

namespace Database\Factories;

use App\Models\ApprovedLoan;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApprovedLoanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ApprovedLoan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'approved_amount' =>$this->faker->randomFloat(2,25,100),
        ];
    }
}
