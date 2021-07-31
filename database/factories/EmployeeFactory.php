<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

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
            'employee_gender'=>$this->faker->word(),
            'employee_address' =>$this->faker->address(),
            'birth_date' =>$this->faker->date(),
            'employee_salary' =>$this->faker->randomFloat(2,2500,15000),
            'phone_number' =>$this->faker->phoneNumber(),
            'employee_photo' =>$this->faker->image(),
        ];
    }
}
