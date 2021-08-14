<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoanDisburseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'remaining_amount' =>$this->faker->randomFloat(2,0,10000000),
            'disburse_amount' =>$this->faker->randomFloat(2,50,100000),
        ];
    }
}
