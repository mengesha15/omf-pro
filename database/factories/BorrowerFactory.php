<?php

namespace Database\Factories;

use App\Models\Borrower;

use Illuminate\Database\Eloquent\Factories\Factory;

class BorrowerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Borrower::class;

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
            'employee_address' =>$this->faker->address(),
            'birth_date' =>$this->faker->date(),
            'phone_number' =>$this->faker->phoneNumber(),
            'borrowed_amount' =>$this->faker->randomFloat(2,25,100),
            'borrower_photo' =>$this->faker->image(),
            'borrower_status'=>$this->faker->sentence(4,true),

        ];
    }
}
