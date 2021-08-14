<?php

namespace Database\Factories;

use App\Models\SavingTransaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class SavingTransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SavingTransaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'transaction_type' =>$this->faker->word(),
            'transaction_amount' =>$this->faker->randomFloat(2,0,15000),
            'deposits',
        ];
    }
}
