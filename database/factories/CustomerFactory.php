<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' =>$this->faker->firstName(),
            'middle_name' =>$this->faker->lastName(),
            'last_name' =>$this->faker->lastName(),
            'customer_address' =>$this->faker->address(),
            'birth_date' =>$this->faker->date(),
            'account_balance' =>$this->faker->randomFloat(2,25,100),
            'phone_number' =>$this->faker->phoneNumber(),
            'account_number' =>$this->faker->randomNumber(8),
            'customer_photo' =>$this->faker->image(), 
            'customer_status'=>$this->faker->sentence(4,true),  
        ];
    }
}
