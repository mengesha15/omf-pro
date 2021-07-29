<?php

namespace Database\Factories;

use App\Models\AccountNumber;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountNumberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AccountNumber::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'account_number'=>$this->faker->randomNumber(8),
        ];
    }
}
